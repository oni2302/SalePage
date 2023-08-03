<?php
?>
<div class="top-banner">
    <div class="banner-wraper d-flex container-sm justify-content-center">
        <div class="left-banner col-3">
            <div class="left-banner-image banner-image">
                <img src="https://myshoes.vn/image/cache/catalog/2022/banner/slide-trai-20-300x500h.png" alt="">
            </div>
        </div>
        <div class="center-banner col-6">
            <div class="center-banner-image banner-image">
                <img src="https://myshoes.vn/image/cache/catalog/2023/banner/sieusale/summer-sale-slide-OK-1240x1000h.png" alt="">
            </div>
        </div>
        <div class="right-banner col-3">
            <div class="right-banner-image banner-image">
                <img src="https://myshoes.vn/image/cache/catalog/2022/banner/slide-trai-20-300x500h.png" alt="">
            </div>
        </div>
    </div>
</div>

<div class="perform-box">
    <div class="container d-flex per-wraper">
        <div class="per per-1">
            <h1>Tiêu chí 1</h1>
            <p>Cái gì đó...</p>
        </div>
        <div class="per per-2">
            <h1>Tiêu chí 2</h1>
            <p>Cái gì đó</p>
        </div>
        <div class="per per-3">
            <h1>Tiêu chí 3</h1>
            <p>Cái gì đó...</p>
        </div>
    </div>
</div>

<div class="container-fluid product-container">
    <div class="title-wrapper">
        <h3>SẢN PHẨM MỚI</h3>
        <div class="title-divider">
        </div>
        <div class="subtitle">
            #Oni Shop
        </div>
    </div>
    <div class="product-card-list flex-wrap">
        <?php
        foreach ($newProduct as $value) {
            extract($value);
            $discount = 0;
            if ($_isSale == true) {
                $discount = round(100 - ($_salePrice / $_price * 100), 0);
            }
            if (isset($_price)) {
                $_price = number_format($_price, 0, '', ',');
            }
            if (isset($_salePrice)) {
                $_salePrice = number_format($_salePrice, 0, '', ',');
            }
        ?>
            <div class="card-wrapper col-sm-2">
                <div class="card-item">
                    <div class="card-image no-select">
                        <div class="event-wrapper">
                            <div class="event-name <?php echo ($_isInEvent == false) ? 'hidden' : '' ?>">
                                <span>Event</span>
                            </div>
                        </div>
                        <div class="feature-wrapper">
                            <div class="feature-item bestseller on <?php echo ($_isBestseller == false) ? 'hidden' : '' ?>">
                                <span>bestseller</span>
                            </div>
                            <div class="feature-item new on">
                                <span>new</span>
                            </div>
                            <div class="feature-item discount on <?php echo ($_isSale == false) ? 'hidden' : '' ?>">
                                <span><?php echo $discount ?>%</span>
                            </div>
                        </div>
                        <a href="">
                            <img src="https://static.nike.com/a/images/q_auto:eco/t_product_v1/f_auto/dpr_1.3/w_467,c_limit/ad544063-e375-4eb9-9988-288ef73d974a/air-pegasus-89-shoes-B8z6X8.png" alt="">
                        </a>
                        <div class="card-brand">
                            <a href="">Nike</a>
                        </div>
                        <div class="selected-shape"></div>
                    </div>
                    <div class="card-info">
                        <div class="product-name">
                            <span>Nike Air Pegasus '89</span>
                        </div>
                        <div class="product-price <?php echo ($_isSale) ? 'sale' : '' ?>">
                            <span class="new-price"><?php echo ($_isSale) ? $_salePrice . '₫ ' : '' ?> </span>
                            <?php echo ($_isSale) ? '-' : '' ?>
                            <span class="price"><?php echo $_price ?><span>₫</span></span>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>


    </div>
</div>