<div class="parallax-slide fullwidth-block small-slide" style="margin-bottom: 30px; margin-top: -25px;">
    <div class="swiper-container" data-autoplay="5000" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1">
        <div class="swiper-wrapper">
            <div class="swiper-slide no-shadow active" data-val="0" style="background-image: url(/img/fullwidth-1.jpg);">
                <div class="parallax-vertical-align">
                    <div class="parallax-article left-align">
                        <h2 class="subtitle">Check out this weekend</h2>
                        <h1 class="title">Big sale</h1>
                        <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</div>
                        <div class="info">
                            <a href="#" class="button style-8">shop now</a>
                            <a href="#" class="button style-8">features</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide no-shadow" data-val="1" style="background-image: url(/img/fullwidth-2.jpg);">
                <div class="parallax-vertical-align">
                    <div class="parallax-article left-align">
                        <h2 class="subtitle">Check out this weekend</h2>
                        <h1 class="title">Big sale</h1>
                        <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</div>
                        <div class="info">
                            <a href="#" class="button style-8">shop now</a>
                            <a href="#" class="button style-8">features</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pagination"></div>
    </div>
</div>

<div class="information-blocks">
    <div class="row">
        <div class="col-sm-4 information-entry">
            <div class="special-item-entry">
                <img src="/img/special-item-1.jpg" alt="" />
                <h3 class="title">Check out this weekend <span>Jackets</span></h3>
                <a class="button style-6" href="#">shop now</a>
            </div>
        </div>
        <div class="col-sm-4 information-entry">
            <div class="special-item-entry">
                <img src="/img/special-item-2.jpg" alt="" />
                <h3 class="title">Check out this weekend <span>Jackets</span></h3>
                <a class="button style-6" href="#">shop now</a>
            </div>
        </div>
        <div class="col-sm-4 information-entry">
            <div class="special-item-entry">
                <img src="/img/special-item-3.jpg" alt="" />
                <h3 class="title">Check out this weekend <span>Jackets</span></h3>
                <a class="button style-6" href="#">shop now</a>
            </div>
        </div>
    </div>
</div>


<h1>featured</h1>
<?= \frontend\widgets\Shop\FeaturedProductsWidget::widget(['limit' => 4])?>



<div class="information-blocks">
    <div class="tabs-container">
        <div class="swiper-tabs tabs-switch">
            <div class="title">Products</div>
            <div class="list">
                <a class="block-title tab-switcher active">Featured Products</a>
                <a class="block-title tab-switcher">Popular Products</a>
                <a class="block-title tab-switcher">New Arrivals</a>
                <div class="clear"></div>
            </div>
        </div>
        <div>
            <div class="tabs-entry">
                <div class="products-swiper">
                    <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="2" data-int-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="5" data-add-slides="5">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="paddings-container">
                                    <div class="product-slide-entry shift-image">
                                        <div class="product-image">
                                            <img src="/img/product-minimal-1.jpg" alt="" />
                                            <img src="/img/product-minimal-11.jpg" alt="" />
                                            <a class="top-line-a left"><i class="fa fa-retweet"></i></a>
                                            <a class="top-line-a right"><i class="fa fa-heart"></i></a>
                                            <div class="bottom-line">
                                                <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            </div>
                                        </div>
                                        <a class="tag" href="#">Men clothing</a>
                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                        <div class="rating-box">
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                        </div>
                                        <div class="price">
                                            <div class="prev">$199,99</div>
                                            <div class="current">$119,99</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="paddings-container">
                                    <div class="product-slide-entry shift-image">
                                        <div class="product-image">
                                            <img src="/img/product-minimal-2.jpg" alt="" />
                                            <img src="/img/product-minimal-12.jpg" alt="" />
                                            <a class="top-line-a right open-product"><i class="fa fa-expand"></i> <span>Quick View</span></a>
                                            <div class="bottom-line">
                                                <div class="right-align">
                                                    <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                    <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                </div>
                                                <div class="left-align">
                                                    <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="tag" href="#">Men clothing</a>
                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                        <div class="rating-box">
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                        </div>
                                        <div class="price">
                                            <div class="prev">$199,99</div>
                                            <div class="current">$119,99</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="paddings-container">
                                    <div class="product-slide-entry shift-image">
                                        <div class="product-image">
                                            <img src="/img/product-minimal-3.jpg" alt="" />
                                            <img src="/img/product-minimal-11.jpg" alt="" />
                                            <div class="bottom-line left-attached">
                                                <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                <a class="bottom-line-a square open-product"><i class="fa fa-expand"></i></a>
                                            </div>
                                        </div>
                                        <a class="tag" href="#">Men clothing</a>
                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                        <div class="rating-box">
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                        </div>
                                        <div class="price">
                                            <div class="prev">$199,99</div>
                                            <div class="current">$119,99</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="paddings-container">
                                    <div class="product-slide-entry shift-image">
                                        <div class="product-image">
                                            <img src="/img/product-minimal-4.jpg" alt="" />
                                            <img src="/img/product-minimal-12.jpg" alt="" />
                                            <a class="top-line-a right open-product"><i class="fa fa-expand"></i> <span>Quick View</span></a>
                                            <div class="bottom-line">
                                                <div class="right-align">
                                                    <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                    <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                </div>
                                                <div class="left-align">
                                                    <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="tag" href="#">Men clothing</a>
                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                        <div class="rating-box">
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                        </div>
                                        <div class="price">
                                            <div class="prev">$199,99</div>
                                            <div class="current">$119,99</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="paddings-container">
                                    <div class="product-slide-entry shift-image">
                                        <div class="product-image">
                                            <img src="/img/product-minimal-5.jpg" alt="" />
                                            <img src="/img/product-minimal-11.jpg" alt="" />
                                            <a class="top-line-a right open-product"><i class="fa fa-expand"></i> <span>Quick View</span></a>
                                            <div class="bottom-line">
                                                <div class="right-align">
                                                    <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                    <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                </div>
                                                <div class="left-align">
                                                    <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="tag" href="#">Men clothing</a>
                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                        <div class="rating-box">
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                        </div>
                                        <div class="price">
                                            <div class="prev">$199,99</div>
                                            <div class="current">$119,99</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pagination"></div>
                    </div>
                </div>
            </div>
            <div class="tabs-entry">
                <div class="products-swiper">
                    <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="2" data-int-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="5" data-add-slides="5">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="paddings-container">
                                    <div class="product-slide-entry shift-image">
                                        <div class="product-image">
                                            <img src="/img/product-minimal-6.jpg" alt="" />
                                            <img src="/img/product-minimal-12.jpg" alt="" />
                                            <a class="top-line-a left"><i class="fa fa-retweet"></i></a>
                                            <a class="top-line-a right"><i class="fa fa-heart"></i></a>
                                            <div class="bottom-line">
                                                <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            </div>
                                        </div>
                                        <a class="tag" href="#">Men clothing</a>
                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                        <div class="rating-box">
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                        </div>
                                        <div class="price">
                                            <div class="prev">$199,99</div>
                                            <div class="current">$119,99</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="paddings-container">
                                    <div class="product-slide-entry shift-image">
                                        <div class="product-image">
                                            <img src="/img/product-minimal-7.jpg" alt="" />
                                            <img src="/img/product-minimal-11.jpg" alt="" />
                                            <a class="top-line-a right open-product"><i class="fa fa-expand"></i> <span>Quick View</span></a>
                                            <div class="bottom-line">
                                                <div class="right-align">
                                                    <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                    <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                </div>
                                                <div class="left-align">
                                                    <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="tag" href="#">Men clothing</a>
                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                        <div class="rating-box">
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                        </div>
                                        <div class="price">
                                            <div class="prev">$199,99</div>
                                            <div class="current">$119,99</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="paddings-container">
                                    <div class="product-slide-entry shift-image">
                                        <div class="product-image">
                                            <img src="/img/product-minimal-8.jpg" alt="" />
                                            <img src="/img/product-minimal-12.jpg" alt="" />
                                            <div class="bottom-line left-attached">
                                                <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                <a class="bottom-line-a square open-product"><i class="fa fa-expand"></i></a>
                                            </div>
                                        </div>
                                        <a class="tag" href="#">Men clothing</a>
                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                        <div class="rating-box">
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                        </div>
                                        <div class="price">
                                            <div class="prev">$199,99</div>
                                            <div class="current">$119,99</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="paddings-container">
                                    <div class="product-slide-entry shift-image">
                                        <div class="product-image">
                                            <img src="/img/product-minimal-9.jpg" alt="" />
                                            <img src="/img/product-minimal-11.jpg" alt="" />
                                            <a class="top-line-a right open-product"><i class="fa fa-expand"></i> <span>Quick View</span></a>
                                            <div class="bottom-line">
                                                <div class="right-align">
                                                    <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                    <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                </div>
                                                <div class="left-align">
                                                    <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="tag" href="#">Men clothing</a>
                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                        <div class="rating-box">
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                        </div>
                                        <div class="price">
                                            <div class="prev">$199,99</div>
                                            <div class="current">$119,99</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="paddings-container">
                                    <div class="product-slide-entry shift-image">
                                        <div class="product-image">
                                            <img src="/img/product-minimal-10.jpg" alt="" />
                                            <img src="/img/product-minimal-12.jpg" alt="" />
                                            <a class="top-line-a right open-product"><i class="fa fa-expand"></i> <span>Quick View</span></a>
                                            <div class="bottom-line">
                                                <div class="right-align">
                                                    <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                    <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                </div>
                                                <div class="left-align">
                                                    <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="tag" href="#">Men clothing</a>
                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                        <div class="rating-box">
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                        </div>
                                        <div class="price">
                                            <div class="prev">$199,99</div>
                                            <div class="current">$119,99</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pagination"></div>
                    </div>
                </div>
            </div>
            <div class="tabs-entry">
                <div class="products-swiper">
                    <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="2" data-int-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="5" data-add-slides="5">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="paddings-container">
                                    <div class="product-slide-entry shift-image">
                                        <div class="product-image">
                                            <img src="/img/product-minimal-1.jpg" alt="" />
                                            <img src="/img/product-minimal-11.jpg" alt="" />
                                            <a class="top-line-a left"><i class="fa fa-retweet"></i></a>
                                            <a class="top-line-a right"><i class="fa fa-heart"></i></a>
                                            <div class="bottom-line">
                                                <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            </div>
                                        </div>
                                        <a class="tag" href="#">Men clothing</a>
                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                        <div class="rating-box">
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                        </div>
                                        <div class="price">
                                            <div class="prev">$199,99</div>
                                            <div class="current">$119,99</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="paddings-container">
                                    <div class="product-slide-entry shift-image">
                                        <div class="product-image">
                                            <img src="/img/product-minimal-3.jpg" alt="" />
                                            <img src="/img/product-minimal-11.jpg" alt="" />
                                            <a class="top-line-a right open-product"><i class="fa fa-expand"></i> <span>Quick View</span></a>
                                            <div class="bottom-line">
                                                <div class="right-align">
                                                    <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                    <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                </div>
                                                <div class="left-align">
                                                    <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="tag" href="#">Men clothing</a>
                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                        <div class="rating-box">
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                        </div>
                                        <div class="price">
                                            <div class="prev">$199,99</div>
                                            <div class="current">$119,99</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="paddings-container">
                                    <div class="product-slide-entry shift-image">
                                        <div class="product-image">
                                            <img src="/img/product-minimal-5.jpg" alt="" />
                                            <img src="/img/product-minimal-11.jpg" alt="" />
                                            <div class="bottom-line left-attached">
                                                <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                <a class="bottom-line-a square open-product"><i class="fa fa-expand"></i></a>
                                            </div>
                                        </div>
                                        <a class="tag" href="#">Men clothing</a>
                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                        <div class="rating-box">
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                        </div>
                                        <div class="price">
                                            <div class="prev">$199,99</div>
                                            <div class="current">$119,99</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="paddings-container">
                                    <div class="product-slide-entry shift-image">
                                        <div class="product-image">
                                            <img src="/img/product-minimal-7.jpg" alt="" />
                                            <img src="/img/product-minimal-11.jpg" alt="" />
                                            <a class="top-line-a right open-product"><i class="fa fa-expand"></i> <span>Quick View</span></a>
                                            <div class="bottom-line">
                                                <div class="right-align">
                                                    <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                    <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                </div>
                                                <div class="left-align">
                                                    <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="tag" href="#">Men clothing</a>
                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                        <div class="rating-box">
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                        </div>
                                        <div class="price">
                                            <div class="prev">$199,99</div>
                                            <div class="current">$119,99</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="paddings-container">
                                    <div class="product-slide-entry shift-image">
                                        <div class="product-image">
                                            <img src="/img/product-minimal-9.jpg" alt="" />
                                            <img src="/img/product-minimal-11.jpg" alt="" />
                                            <a class="top-line-a right open-product"><i class="fa fa-expand"></i> <span>Quick View</span></a>
                                            <div class="bottom-line">
                                                <div class="right-align">
                                                    <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                    <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                </div>
                                                <div class="left-align">
                                                    <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="tag" href="#">Men clothing</a>
                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                        <div class="rating-box">
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                        </div>
                                        <div class="price">
                                            <div class="prev">$199,99</div>
                                            <div class="current">$119,99</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="information-blocks">
    <div class="row">
        <div class="information-entry col-md-6">
            <div class="image-text-widget" style="background-image: url(img/image-text-widget-1.jpg);">
                <div class="hot-mark red">hot</div>
                <h3 class="title">Woman category</h3>
                <div class="article-container style-1">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisc elit, sed do eiusmod tempor incididunt ut labore consectetur.</p>
                    <ul>
                        <li><a href="#">Evening dresses</a></li>
                        <li><a href="#">Jackets and coats</a></li>
                        <li><a href="#">Tops and Sweatshirts</a></li>
                        <li><a href="#">Blouses and shirts</a></li>
                        <li><a href="#">Trousers and Shorts</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="information-entry col-md-6">
            <div class="image-text-widget" style="background-image: url(img/image-text-widget-2.jpg);">
                <div class="hot-mark red">hot</div>
                <h3 class="title">Man category</h3>
                <div class="article-container style-1">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisc elit, sed do eiusmod tempor incididunt ut labore consectetur.</p>
                    <ul>
                        <li><a href="#">Evening dresses</a></li>
                        <li><a href="#">Jackets and coats</a></li>
                        <li><a href="#">Tops and Sweatshirts</a></li>
                        <li><a href="#">Blouses and shirts</a></li>
                        <li><a href="#">Trousers and Shorts</a></li>
                    </ul>
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
                <a href="#" class="image"><img alt="" src="img/product-image-inline-1.jpg"></a>
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
                <a href="#" class="image"><img alt="" src="img/product-image-inline-2.jpg"></a>
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
                <a href="#" class="image"><img alt="" src="img/product-image-inline-3.jpg"></a>
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
                <a href="#" class="image"><img alt="" src="img/product-image-inline-1.jpg"></a>
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
                <a href="#" class="image"><img alt="" src="img/product-image-inline-2.jpg"></a>
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
                <a href="#" class="image"><img alt="" src="img/product-image-inline-3.jpg"></a>
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
                <a href="#" class="image"><img alt="" src="img/product-image-inline-1.jpg"></a>
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
                <a href="#" class="image"><img alt="" src="img/product-image-inline-2.jpg"></a>
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
                <a href="#" class="image"><img alt="" src="img/product-image-inline-3.jpg"></a>
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