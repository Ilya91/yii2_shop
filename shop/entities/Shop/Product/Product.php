<?php

namespace shop\entities\Shop\Product;

use shop\entities\EventTrait;
use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use shop\entities\AggregateRoot;
use shop\entities\behaviors\MetaBehavior;
use shop\entities\Meta;
use shop\entities\Shop\Brand;
use shop\entities\Shop\Category;
use shop\entities\Shop\Product\events\ProductAppearedInStock;
use shop\entities\Shop\Product\queries\ProductQuery;
use shop\entities\Shop\Tag;
use shop\entities\User\WishlistItem;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Exception;
use yii\web\UploadedFile;

/**
 * @property integer $id
 * @property integer $created_at
 * @property string $code
 * @property string $name
 * @property string $description
 * @property integer $category_id
 * @property integer $brand_id
 * @property integer $price_old
 * @property integer $price_new
 * @property integer $rating
 * @property integer $main_photo_id
 * @property integer $status
 * @property integer $weight
 * @property integer $quantity
 *
 * @property Meta $meta
 * @property Brand $brand
 * @property Category $category
 * @property CategoryAssignment[] $categoryAssignments
 * @property Category[] $categories
 * @property TagAssignment[] $tagAssignments
 * @property Tag[] $tags
 * @property RelatedAssignment[] $relatedAssignments
 * @property Modification[] $modifications
 * @property Value[] $values
 * @property Photo[] $photos
 * @property Photo $mainPhoto
 * @property Review[] $reviews
 */
class Product extends ActiveRecord implements AggregateRoot
{
    use EventTrait;

    const STATUS_DRAFT = 0;
    const STATUS_ACTIVE = 1;

    public $meta;

    public static function create($brandId, $categoryId, $code, $name, $description, $weight, $quantity, Meta $meta)
    {
        $product = new static();
        $product->brand_id = $brandId;
        $product->category_id = $categoryId;
        $product->code = $code;
        $product->name = $name;
        $product->description = $description;
        $product->weight = $weight;
        $product->quantity = $quantity;
        $product->meta = $meta;
        $product->status = self::STATUS_DRAFT;
        $product->created_at = time();
        return $product;
    }

    public function setPrice($new, $old)
    {
        $this->price_new = $new;
        $this->price_old = $old;
    }

    public function changeQuantity($quantity)
    {
        if ($this->modifications) {
            throw new \DomainException('Change modifications quantity.');
        }
        $this->setQuantity($quantity);
    }

    public function edit($brandId, $code, $name, $description, $weight, Meta $meta)
    {
        $this->brand_id = $brandId;
        $this->code = $code;
        $this->name = $name;
        $this->description = $description;
        $this->weight = $weight;
        $this->meta = $meta;
    }

    public function changeMainCategory($categoryId)
    {
        $this->category_id = $categoryId;
    }

    public function activate()
    {
        if ($this->isActive()) {
            throw new \DomainException('Product is already active.');
        }
        $this->status = self::STATUS_ACTIVE;
    }

    public function draft()
    {
        if ($this->isDraft()) {
            throw new \DomainException('Product is already draft.');
        }
        $this->status = self::STATUS_DRAFT;
    }

    public function isActive()
    {
        return $this->status == self::STATUS_ACTIVE;
    }


    public function isDraft()
    {
        return $this->status == self::STATUS_DRAFT;
    }

    public function isAvailable()
    {
        return $this->quantity > 0;
    }

    public function canChangeQuantity()
    {
        return !$this->modifications;
    }

    public function canBeCheckout($modificationId, $quantity)
    {
        if ($modificationId) {
            return $quantity <= $this->getModification($modificationId)->quantity;
        }
        return $quantity <= $this->quantity;
    }

    public function checkout($modificationId, $quantity)
    {
        if ($modificationId) {
            $modifications = $this->modifications;
            foreach ($modifications as $i => $modification) {
                if ($modification->isIdEqualTo($modificationId)) {
                    $modification->checkout($quantity);
                    $this->updateModifications($modifications);
                    return;
                }
            }
        }
        if ($quantity > $this->quantity) {
            throw new \DomainException('Only ' . $this->quantity . ' items are available.');
        }
        $this->setQuantity($this->quantity - 1);
    }

    private function setQuantity($quantity)
    {
        if ($this->quantity == 0 && $quantity > 0) {
            $this->recordEvent(new ProductAppearedInStock($this));
        }
        $this->quantity = $quantity;
    }

    public function getSeoTile()
    {
        return $this->meta->title ?: $this->name;
    }

    public function setValue($id, $value)
    {
        $values = $this->values;
        foreach ($values as $val) {
            if ($val->isForCharacteristic($id)) {
                $val->change($value);
                $this->values = $values;
                return;
            }
        }
        $values[] = Value::create($id, $value);
        $this->values = $values;
    }

    public function getValue($id)
    {
        $values = $this->values;
        foreach ($values as $val) {
            if ($val->isForCharacteristic($id)) {
                return $val;
            }
        }
        return Value::blank($id);
    }

    // Modification

    public function getModification($id)
    {
        foreach ($this->modifications as $modification) {
            if ($modification->isIdEqualTo($id)) {
                return $modification;
            }
        }
        throw new \DomainException('Modification is not found.');
    }

    public function getModificationPrice($id)
    {
        foreach ($this->modifications as $modification) {
            if ($modification->isIdEqualTo($id)) {
                return $modification->price ?: $this->price_new;
            }
        }
        throw new \DomainException('Modification is not found.');
    }

    public function addModification($code, $name, $price, $quantity)
    {
        $modifications = $this->modifications;
        foreach ($modifications as $modification) {
            if ($modification->isCodeEqualTo($code)) {
                throw new \DomainException('Modification already exists.');
            }
        }
        $modifications[] = Modification::create($code, $name, $price, $quantity);
        $this->updateModifications($modifications);
    }

    public function editModification($id, $code, $name, $price, $quantity)
    {
        $modifications = $this->modifications;
        foreach ($modifications as $i => $modification) {
            if ($modification->isIdEqualTo($id)) {
                $modification->edit($code, $name, $price, $quantity);
                $this->updateModifications($modifications);
                return;
            }
        }
        throw new \DomainException('Modification is not found.');
    }

    public function removeModification($id)
    {
        $modifications = $this->modifications;
        foreach ($modifications as $i => $modification) {
            if ($modification->isIdEqualTo($id)) {
                unset($modifications[$i]);
                $this->updateModifications($modifications);
                return;
            }
        }
        throw new \DomainException('Modification is not found.');
    }

    private function updateModifications(array $modifications)
    {
        $this->modifications = $modifications;
        $this->setQuantity(array_sum(array_map(function (Modification $modification) {
            return $modification->quantity;
        }, $this->modifications)));
    }

    // Categories

    public function assignCategory($id)
    {
        $assignments = $this->categoryAssignments;
        foreach ($assignments as $assignment) {
            if ($assignment->isForCategory($id)) {
                return;
            }
        }
        $assignments[] = CategoryAssignment::create($id);
        $this->categoryAssignments = $assignments;
    }

    public function revokeCategory($id)
    {
        $assignments = $this->categoryAssignments;
        foreach ($assignments as $i => $assignment) {
            if ($assignment->isForCategory($id)) {
                unset($assignments[$i]);
                $this->categoryAssignments = $assignments;
                return;
            }
        }
        throw new \DomainException('Assignment is not found.');
    }

    public function revokeCategories()
    {
        $this->categoryAssignments = [];
    }

    // Tags

    public function assignTag($id)
    {
        $assignments = $this->tagAssignments;
        foreach ($assignments as $assignment) {
            if ($assignment->isForTag($id)) {
                return;
            }
        }
        $assignments[] = TagAssignment::create($id);
        $this->tagAssignments = $assignments;
    }

    public function revokeTag($id)
    {
        $assignments = $this->tagAssignments;
        foreach ($assignments as $i => $assignment) {
            if ($assignment->isForTag($id)) {
                unset($assignments[$i]);
                $this->tagAssignments = $assignments;
                return;
            }
        }
        throw new \DomainException('Assignment is not found.');
    }

    public function revokeTags()
    {
        $this->tagAssignments = [];
    }

    // Photos

    public function addPhoto(UploadedFile $file)
    {
        $photos = $this->photos;
        $photos[] = Photo::create($file);
        $this->updatePhotos($photos);
    }

    public function removePhoto($id)
    {
        $photos = $this->photos;
        foreach ($photos as $i => $photo) {
            if ($photo->isIdEqualTo($id)) {
                unset($photos[$i]);
                $this->updatePhotos($photos);
                return;
            }
        }
        throw new \DomainException('Photo is not found.');
    }

    public function removePhotos()
    {
        $this->updatePhotos([]);
    }

    public function movePhotoUp($id)
    {
        $photos = $this->photos;
        foreach ($photos as $i => $photo) {
            if ($photo->isIdEqualTo($id)) {
                if ($prev = $photos[$i - 1] != null) { /// ??????????
                    $photos[$i - 1] = $photo;
                    $photos[$i] = $prev;
                    $this->updatePhotos($photos);
                }
                return;
            }
        }
        throw new \DomainException('Photo is not found.');
    }

    public function movePhotoDown($id)
    {
        $photos = $this->photos;
        foreach ($photos as $i => $photo) {
            if ($photo->isIdEqualTo($id)) {
                if ($next = $photos[$i + 1] != null) { //?????????????
                    $photos[$i] = $next;
                    $photos[$i + 1] = $photo;
                    $this->updatePhotos($photos);
                }
                return;
            }
        }
        throw new \DomainException('Photo is not found.');
    }

    private function updatePhotos(array $photos)
    {
        foreach ($photos as $i => $photo) {
            $photo->setSort($i);
        }
        $this->photos = $photos;
        $this->populateRelation('mainPhoto', reset($photos));
    }

    // Related products

    public function assignRelatedProduct($id)
    {
        $assignments = $this->relatedAssignments;
        foreach ($assignments as $assignment) {
            if ($assignment->isForProduct($id)) {
                return;
            }
        }
        $assignments[] = CategoryAssignment::create($id);
        $this->relatedAssignments = $assignments;
    }

    public function revokeRelatedProduct($id)
    {
        $assignments = $this->relatedAssignments;
        foreach ($assignments as $i => $assignment) {
            if ($assignment->isForProduct($id)) {
                unset($assignments[$i]);
                $this->relatedAssignments = $assignments;
                return;
            }
        }
        throw new \DomainException('Assignment is not found.');
    }

    // Reviews

    public function addReview($userId, $vote, $text)
    {
        $reviews = $this->reviews;
        $reviews[] = Review::create($userId, $vote, $text);
        $this->updateReviews($reviews);
    }

    public function editReview($id, $vote, $text)
    {
        $this->doWithReview($id, function (Review $review) use ($vote, $text) {
            $review->edit($vote, $text);
        });
    }

    public function activateReview($id)
    {
        $this->doWithReview($id, function (Review $review) {
            $review->activate();
        });
    }

    public function draftReview($id)
    {
        $this->doWithReview($id, function (Review $review) {
            $review->draft();
        });
    }

    private function doWithReview($id, callable $callback)
    {
        $reviews = $this->reviews;
        foreach ($reviews as $review) {
            if ($review->isIdEqualTo($id)) {
                $callback($review);
                $this->updateReviews($reviews);
                return;
            }
        }
        throw new \DomainException('Review is not found.');
    }

    public function removeReview($id)
    {
        $reviews = $this->reviews;
        foreach ($reviews as $i => $review) {
            if ($review->isIdEqualTo($id)) {
                unset($reviews[$i]);
                $this->updateReviews($reviews);
                return;
            }
        }
        throw new \DomainException('Review is not found.');
    }

    private function updateReviews(array $reviews)
    {
        $amount = 0;
        $total = 0;

        foreach ($reviews as $review) {
            if ($review->isActive()) {
                $amount++;
                $total += $review->getRating();
            }
        }

        $this->reviews = $reviews;
        $this->rating = $amount ? $total / $amount : null;
    }

    ##########################

    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function getCategoryAssignments()
    {
        return $this->hasMany(CategoryAssignment::class, ['product_id' => 'id']);
    }

    public function getCategories()
    {
        return $this->hasMany(Category::class, ['id' => 'category_id'])->via('categoryAssignments');
    }

    public function getTagAssignments()
    {
        return $this->hasMany(TagAssignment::class, ['product_id' => 'id']);
    }

    public function getTags()
    {
        return $this->hasMany(Tag::class, ['id' => 'tag_id'])->via('tagAssignments');
    }

    public function getModifications()
    {
        return $this->hasMany(Modification::class, ['product_id' => 'id']);
    }

    public function getValues()
    {
        return $this->hasMany(Value::class, ['product_id' => 'id']);
    }

    public function getPhotos()
    {
        return $this->hasMany(Photo::class, ['product_id' => 'id'])->orderBy('sort');
    }

    public function getMainPhoto()
    {
        return $this->hasOne(Photo::class, ['id' => 'main_photo_id']);
    }

    public function getRelatedAssignments()
    {
        return $this->hasMany(RelatedAssignment::class, ['product_id' => 'id']);
    }

    public function getRelateds()
    {
        return $this->hasMany(Product::class, ['id' => 'related_id'])->via('relatedAssignments');
    }

    public function getReviews()
    {
        return $this->hasMany(Review::class, ['product_id' => 'id']);
    }

    public function getWishlistItems()
    {
        return $this->hasMany(WishlistItem::class, ['product_id' => 'id']);
    }

    ##########################

    public static function tableName()
    {
        return '{{%shop_products}}';
    }

    public function behaviors()
    {
        return [
            MetaBehavior::className(),
            [
                'class' => SaveRelationsBehavior::className(),
                'relations' => ['categoryAssignments', 'tagAssignments', 'relatedAssignments', 'modifications', 'values', 'photos', 'reviews'],
            ],
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            foreach ($this->photos as $photo) {
                $photo->delete();
            }
            return true;
        }
        return false;
    }

    public function afterSave($insert, $changedAttributes)
    {
        $related = $this->getRelatedRecords();
        parent::afterSave($insert, $changedAttributes);
        if (array_key_exists('mainPhoto', $related)) {
            $this->updateAttributes(['main_photo_id' => $related['mainPhoto'] ? $related['mainPhoto']->id : null]);
        }
    }

    public static function find()
    {
        return new ProductQuery(static::class);
    }
}