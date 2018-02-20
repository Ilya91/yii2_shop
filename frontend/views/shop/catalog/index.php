<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */
/* @var $category shop\entities\Shop\Category */

use shop\entities\Shop\Category;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Breadcrumbs;
use frontend\assets\MetisMenuAsset;

MetisMenuAsset::register($this);

$this->title = 'Catalog';
$this->params['breadcrumbs'][] = ['label' => 'Shop', 'url'=> ['/shop/catalog']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .custom-ul li{
        margin-left: 20px;
    }
</style>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

<div class="breadcrumb-box">
	<?= Breadcrumbs::widget([
		'itemTemplate' => "<li>'>'<i>{link}</i></li>\n",
		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
	]) ?>
</div>
<div class="information-blocks">
    <div class="row">
        <div class="col-md-9 col-md-push-3 col-sm-8 col-sm-push-4">
	        <?= $this->render('_list', [
		        'dataProvider' => $dataProvider
	        ]) ?>

            <div class="row shop-grid grid-view">

            </div>
            <div class="page-selector">
                <div class="description">Showing: 1-3 of 16</div>
                <div class="pages-box">
                    <a href="#" class="square-button active">1</a>
                    <a href="#" class="square-button">2</a>
                    <a href="#" class="square-button">3</a>
                    <div class="divider">...</div>
                    <a href="#" class="square-button"><i class="fa fa-angle-right"></i></a>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="col-md-3 col-md-pull-9 col-sm-4 col-sm-pull-8 blog-sidebar">
            <div class="information-blocks categories-border-wrapper">
                <div class="block-title size-3">Categories</div>




                <!-- menu -->
                <div id="MainMenu">
                    <div class="list-group panel">
                        <a href="#" class="list-group-item " data-parent="#MainMenu">Item 1</a>
                        <a href="#" class="list-group-item " data-parent="#MainMenu">Item 2</a>
                        <a href="#demo3" class="list-group-item " data-toggle="collapse" data-parent="#MainMenu">Item 3 <i class="fa fa-caret-down"></i></a>
                        <div class="collapse" id="demo3">
                            <a href="#SubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu1">Subitem 1 <i class="fa fa-caret-down"></i></a>
                            <div class="collapse list-group-submenu" id="SubMenu1">
                                <a href="#" class="list-group-item" data-parent="#SubMenu1">Subitem 1 a</a>
                                <a href="#" class="list-group-item" data-parent="#SubMenu1">Subitem 2 b</a>
                                <a href="#SubSubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubSubMenu1">Subitem 3 c <i class="fa fa-caret-down"></i></a>
                                <div class="collapse list-group-submenu list-group-submenu-1" id="SubSubMenu1">
                                    <a href="#" class="list-group-item" data-parent="#SubSubMenu1">Sub sub item 1</a>
                                    <a href="#" class="list-group-item" data-parent="#SubSubMenu1">Sub sub item 2</a>
                                </div>
                                <a href="#" class="list-group-item" data-parent="#SubMenu1">Subitem 4 d</a>
                            </div>
                            <a href="javascript:;" class="list-group-item">Subitem 2</a>
                            <a href="javascript:;" class="list-group-item">Subitem 3</a>
                        </div>
                        <a href="#demo4" class="list-group-item " data-toggle="collapse" data-parent="#MainMenu">Item 4  <i class="fa fa-caret-down"></i></a>
                        <div class="collapse" id="demo4">
                            <a href="" class="list-group-item">Subitem 1</a>
                            <a href="" class="list-group-item">Subitem 2</a>
                            <a href="" class="list-group-item">Subitem 3</a>
                        </div>
                    </div>
                </div>









                <div class="accordeon">
                    <ul class="custom-ul metismenu" id="menu">
	                <?php
	                $categories = Category::find()->all();
	                $depth = 0;

	                foreach($categories as $n => $category)
	                {
		                if($category->depth == $depth)
			                echo Html::endTag('li')."\n";
		                else if($category->depth > $depth)
			                echo Html::beginTag('ul')."\n";
		                else
		                {
			                echo Html::endTag('li')."\n";

			                for($i=$depth-$category->depth;$i;$i--)
			                {
				                echo Html::endTag('ul')."\n";
				                echo Html::endTag('li')."\n";
			                }
		                }

		                echo Html::beginTag('li');
		                echo Html::encode($category->title);
		                $depth = $category->depth;
	                }

	                for($i=$depth;$i;$i--)
	                {
		                echo Html::endTag('li')."\n";
		                echo Html::endTag('ul')."\n";
	                }
	                ?>

                            </ul>
                </div>
            </div>

            <div class="information-blocks categories-border-wrapper">
                <div class="block-title size-3">Categories</div>
                <div class="accordeon">
                    <div class="accordeon-title">Bags &amp; Accessories</div>
                    <div class="accordeon-entry">
                        <div class="article-container style-1">
                            <ul>
                                <li><a href="#">Bags &amp; Accessories</a></li>
                                <li><a href="#">Man's Products</a></li>
                                <li><a href="#">Woman's Products</a></li>
                                <li><a href="#">Top Brands</a></li>
                                <li><a href="#">Special Offer</a></li>
                                <li><a href="#">Leather's Products</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="accordeon-title">Man's Products</div>
                    <div class="accordeon-entry">
                        <div class="article-container style-1">
                            <ul>
                                <li><a href="#">Bags &amp; Accessories</a></li>
                                <li><a href="#">Man's Products</a></li>
                                <li><a href="#">Woman's Products</a></li>
                                <li><a href="#">Top Brands</a></li>
                                <li><a href="#">Special Offer</a></li>
                                <li><a href="#">Leather's Products</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="accordeon-title">Woman's Products</div>
                    <div class="accordeon-entry">
                        <div class="article-container style-1">
                            <ul>
                                <li><a href="#">Bags &amp; Accessories</a></li>
                                <li><a href="#">Man's Products</a></li>
                                <li><a href="#">Woman's Products</a></li>
                                <li><a href="#">Top Brands</a></li>
                                <li><a href="#">Special Offer</a></li>
                                <li><a href="#">Leather's Products</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="accordeon-title">Top Brands</div>
                    <div class="accordeon-entry">
                        <div class="article-container style-1">
                            <ul>
                                <li><a href="#">Bags &amp; Accessories</a></li>
                                <li><a href="#">Man's Products</a></li>
                                <li><a href="#">Woman's Products</a></li>
                                <li><a href="#">Top Brands</a></li>
                                <li><a href="#">Special Offer</a></li>
                                <li><a href="#">Leather's Products</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="accordeon-title">Special Offer</div>
                    <div class="accordeon-entry">
                        <div class="article-container style-1">
                            <ul>
                                <li><a href="#">Bags &amp; Accessories</a></li>
                                <li><a href="#">Man's Products</a></li>
                                <li><a href="#">Woman's Products</a></li>
                                <li><a href="#">Top Brands</a></li>
                                <li><a href="#">Special Offer</a></li>
                                <li><a href="#">Leather's Products</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="accordeon-title">Leather's Products</div>
                    <div class="accordeon-entry">
                        <div class="article-container style-1">
                            <ul>
                                <li><a href="#">Bags &amp; Accessories</a></li>
                                <li><a href="#">Man's Products</a></li>
                                <li><a href="#">Woman's Products</a></li>
                                <li><a href="#">Top Brands</a></li>
                                <li><a href="#">Special Offer</a></li>
                                <li><a href="#">Leather's Products</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="information-blocks">
                <div class="block-title size-2">Sort by sizes</div>
                <div class="range-wrapper">
                    <div id="prices-range"></div>
                    <div class="range-price">
                        Price:
                        <div class="min-price"><b>&pound;<span>0</span></b></div>
                        <b>-</b>
                        <div class="max-price"><b>&pound;<span>200</span></b></div>
                    </div>
                    <a class="button style-14">filter</a>
                </div>
            </div>

            <div class="information-blocks">
                <div class="block-title size-2">Sort by sizes</div>
                <div class="size-selector">
                    <div class="entry active">xs</div>
                    <div class="entry">s</div>
                    <div class="entry">m</div>
                    <div class="entry">l</div>
                    <div class="entry">xl</div>
                    <div class="spacer"></div>
                </div>
            </div>

            <div class="information-blocks">
                <div class="block-title size-2">Sort by brands</div>
                <div class="row">
                    <div class="col-xs-6">
                        <label class="checkbox-entry">
                            <input type="checkbox" /> <span class="check"></span> Armani
                        </label>
                        <label class="checkbox-entry">
                            <input type="checkbox" /> <span class="check"></span> Bershka Co
                        </label>
                        <label class="checkbox-entry">
                            <input type="checkbox" /> <span class="check"></span> Nelly.com
                        </label>
                        <label class="checkbox-entry">
                            <input type="checkbox" /> <span class="check"></span> Zigzag Inc
                        </label>
                    </div>
                    <div class="col-xs-6">
                        <label class="checkbox-entry">
                            <input type="checkbox" /> <span class="check"></span> Armani
                        </label>
                        <label class="checkbox-entry">
                            <input type="checkbox" /> <span class="check"></span> Bershka Co
                        </label>
                        <label class="checkbox-entry">
                            <input type="checkbox" /> <span class="check"></span> Nelly.com
                        </label>
                        <label class="checkbox-entry">
                            <input type="checkbox" /> <span class="check"></span> Zigzag Inc
                        </label>
                    </div>
                </div>
            </div>

            <div class="information-blocks">
                <div class="block-title size-2">Sort by colours</div>
                <div class="color-selector detail-info-entry">
                    <div style="background-color: #cf5d5d;" class="entry active"></div>
                    <div style="background-color: #c9459f;" class="entry"></div>
                    <div style="background-color: #689dd4;" class="entry"></div>
                    <div style="background-color: #68d4aa;" class="entry"></div>
                    <div style="background-color: #a8d468;" class="entry"></div>
                    <div style="background-color: #d4c368;" class="entry"></div>
                    <div style="background-color: #c2c2c2;" class="entry"></div>
                    <div style="background-color: #000000;" class="entry"></div>
                    <div style="background-color: #f0f0f0;" class="entry"></div>
                    <div class="spacer"></div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="information-blocks">
    <div class="row">
        <div class="col-sm-4 information-entry">
            <h3 class="block-title inline-product-column-title">Featured products</h3>
            <div class="inline-product-entry">
                <a href="#" class="image"><img alt="" src="/img/product-image-inline-1.jpg"></a>
                <div class="content">
                    <div class="cell-view">
                        <a href="#" class="title">Ladies Pullover Batwing Sleeve Zigzag</a>
                        <div class="price">
                            <div class="prev">$199,99</div>
                            <div class="current">$119,99</div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="inline-product-entry">
                <a href="#" class="image"><img alt="" src="/img/product-image-inline-2.jpg"></a>
                <div class="content">
                    <div class="cell-view">
                        <a href="#" class="title">Ladies Pullover Batwing Sleeve Zigzag</a>
                        <div class="price">
                            <div class="prev">$199,99</div>
                            <div class="current">$119,99</div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="inline-product-entry">
                <a href="#" class="image"><img alt="" src="/img/product-image-inline-3.jpg"></a>
                <div class="content">
                    <div class="cell-view">
                        <a href="#" class="title">Ladies Pullover Batwing Sleeve Zigzag</a>
                        <div class="price">
                            <div class="prev">$199,99</div>
                            <div class="current">$119,99</div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="col-sm-4 information-entry">
            <h3 class="block-title inline-product-column-title">Featured products</h3>
            <div class="inline-product-entry">
                <a href="#" class="image"><img alt="" src="/img/product-image-inline-1.jpg"></a>
                <div class="content">
                    <div class="cell-view">
                        <a href="#" class="title">Ladies Pullover Batwing Sleeve Zigzag</a>
                        <div class="price">
                            <div class="prev">$199,99</div>
                            <div class="current">$119,99</div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="inline-product-entry">
                <a href="#" class="image"><img alt="" src="/img/product-image-inline-2.jpg"></a>
                <div class="content">
                    <div class="cell-view">
                        <a href="#" class="title">Ladies Pullover Batwing Sleeve Zigzag</a>
                        <div class="price">
                            <div class="prev">$199,99</div>
                            <div class="current">$119,99</div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="inline-product-entry">
                <a href="#" class="image"><img alt="" src="/img/product-image-inline-3.jpg"></a>
                <div class="content">
                    <div class="cell-view">
                        <a href="#" class="title">Ladies Pullover Batwing Sleeve Zigzag</a>
                        <div class="price">
                            <div class="prev">$199,99</div>
                            <div class="current">$119,99</div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="col-sm-4 information-entry">
            <h3 class="block-title inline-product-column-title">Featured products</h3>
            <div class="inline-product-entry">
                <a href="#" class="image"><img alt="" src="/img/product-image-inline-1.jpg"></a>
                <div class="content">
                    <div class="cell-view">
                        <a href="#" class="title">Ladies Pullover Batwing Sleeve Zigzag</a>
                        <div class="price">
                            <div class="prev">$199,99</div>
                            <div class="current">$119,99</div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="inline-product-entry">
                <a href="#" class="image"><img alt="" src="/img/product-image-inline-2.jpg"></a>
                <div class="content">
                    <div class="cell-view">
                        <a href="#" class="title">Ladies Pullover Batwing Sleeve Zigzag</a>
                        <div class="price">
                            <div class="prev">$199,99</div>
                            <div class="current">$119,99</div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="inline-product-entry">
                <a href="#" class="image"><img alt="" src="/img/product-image-inline-3.jpg"></a>
                <div class="content">
                    <div class="cell-view">
                        <a href="#" class="title">Ladies Pullover Batwing Sleeve Zigzag</a>
                        <div class="price">
                            <div class="prev">$199,99</div>
                            <div class="current">$119,99</div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
<?/*= $this->render('_subcategories', [
    'category' => $category
]) */?>
