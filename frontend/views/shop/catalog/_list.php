<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>
<!--<div class="row">
    <div class="col-md-2 col-sm-6 hidden-xs">
        <div class="btn-group btn-group-sm">
            <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
            <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="form-group">
            <a href="/index.php?route=product/compare" id="compare-total" class="btn btn-link">Product Compare (0)</a>
        </div>
    </div>
    <div class="col-md-4 col-xs-6">
        <div class="form-group input-group input-group-sm">
            <label class="input-group-addon" for="input-sort">Sort By:</label>
            <select id="input-sort" class="form-control" onchange="location = this.value;">
                <?php
/*                $values = [
                    '' => 'Default',
                    'name' => 'Name (A - Z)',
                    '-name' => 'Name (Z - A)',
                    'price' => 'Price (Low &gt; High)',
                    '-price' => 'Price (High &gt; Low)',
                    '-rating' => 'Rating (Highest)',
                    'rating' => 'Rating (Lowest)',
                ];
                $current = Yii::$app->request->get('sort');
                */?>
                <?php /*foreach ($values as $value => $label): */?>
                    <option value="<?/*= Html::encode(Url::current(['sort' => $value ?: null])) */?>" <?php /*if ($current == $value): */?>selected="selected"<?php /*endif; */?>><?/*= $label */?></option>
                <?php /*endforeach; */?>
            </select>
        </div>
    </div>
    <div class="col-md-3 col-xs-6">
        <div class="form-group input-group input-group-sm">
            <label class="input-group-addon" for="input-limit">Show:</label>
            <select id="input-limit" class="form-control" onchange="location = this.value;">
                <?php
/*                $values = [15, 25, 50, 75, 100];
                $current = $dataProvider->getPagination()->getPageSize();
                */?>
                <?php /*foreach ($values as $value): */?>
                    <option value="<?/*= Html::encode(Url::current(['per-page' => $value])) */?>" <?php /*if ($current == $value): */?>selected="selected"<?php /*endif; */?>><?/*= $value */?></option>
                <?php /*endforeach; */?>
            </select>
        </div>
    </div>
</div>-->
<div class="page-selector">
    <div class="pages-box hidden-xs">
        <a href="#" class="square-button active">1</a>
        <a href="#" class="square-button">2</a>
        <a href="#" class="square-button">3</a>
        <div class="divider">...</div>
        <a href="#" class="square-button"><i class="fa fa-angle-right"></i></a>
    </div>
    <div class="shop-grid-controls">
        <div class="entry">
            <div class="inline-text">Sorty by</div>
            <div class="simple-drop-down">
                <select>
                    <option>Position</option>
                    <option>Price</option>
                    <option>Category</option>
                    <option>Rating</option>
                    <option>Color</option>
                </select>
            </div>
            <div class="sort-button"></div>
        </div>
        <div class="entry">
            <div class="view-button active grid"><i class="fa fa-th"></i></div>
            <div class="view-button list"><i class="fa fa-list"></i></div>
        </div>
        <div class="entry">
            <div class="inline-text">Show</div>
            <div class="simple-drop-down" style="width: 75px;">
                <select>
                    <option>12</option>
                    <option>20</option>
                    <option>30</option>
                    <option>40</option>
                    <option>all</option>
                </select>
            </div>
            <div class="inline-text">per page</div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<div class="row shop-grid grid-view">
    <?php foreach ($dataProvider->getModels() as $product): ?>
        <?= $this->render('_product', [
            'product' => $product
        ]) ?>
    <?php endforeach; ?>
</div>

<div class="row">
    <div class="col-sm-6 text-left">
        <?= LinkPager::widget([
            'pagination' => $dataProvider->getPagination(),
        ]) ?>
    </div>
    <div class="col-sm-6 text-right">Showing <?= $dataProvider->getCount() ?> of <?= $dataProvider->getTotalCount() ?></div>
</div>