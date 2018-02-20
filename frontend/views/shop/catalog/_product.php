<?php

/* @var $this yii\web\View */
/* @var $product shop\entities\Shop\Product\Product */

use shop\helpers\PriceHelper;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;

$url = Url::to(['product', 'id' =>$product->id]);

?>
<div class="col-md-3 col-sm-4 shop-grid-item">
    <div class="product-slide-entry shift-image">
        <div class="product-image">
	        <?php if ($product->mainPhoto): ?>
                <img src="<?= Html::encode($product->mainPhoto->getThumbFileUrl('file', 'catalog_list')) ?>" alt="" />
	        <?php endif; ?>
	        <?php if ($product->mainPhoto): ?>
                <img src="<?= Html::encode($product->mainPhoto->getThumbFileUrl('file', 'catalog_list')) ?>" alt="" />
	        <?php endif; ?>
            <div class="bottom-line left-attached">
                <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                <a class="bottom-line-a square"><i class="fa fa-expand"></i></a>
            </div>
        </div>
        <a class="tag" href="#">Men clothing</a>
        <a class="title" href="<?= Html::encode($url) ?>"><?= Html::encode($product->name) ?></a>
        <div class="rating-box">
            <div class="star"><i class="fa fa-star"></i></div>
            <div class="star"><i class="fa fa-star"></i></div>
            <div class="star"><i class="fa fa-star"></i></div>
            <div class="star"><i class="fa fa-star"></i></div>
            <div class="star"><i class="fa fa-star"></i></div>
            <div class="reviews-number">25 reviews</div>
        </div>
        <div class="article-container style-1">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="price">
            <div class="prev">$199,99</div>
            <div class="current">$119,99</div>
        </div>
        <div class="list-buttons">
            <a class="button style-10">Add to cart</a>
            <a class="button style-11"><i class="fa fa-heart"></i> Add to Wishlist</a>
        </div>
    </div>
    <div class="clear"></div>
</div>

