<?php extract($_info);
if (isset($_price)) {
    $_price = number_format($_price, 0, '', ',');
}
if (isset($_salePrice)) {
    $_salePrice = number_format($_salePrice, 0, '', ',');
}
?>
<script>
    var id = <?php echo $_id ?>
</script>
<div class="product-container container-sm mt-4">
    <div class="product-wrapper d-flex w-100">
        <div class="product-left">
            <div id="slide" class="owl-carousel">
                <div class="item">
                    <img src="<?php echo _WEB . '/public/assets/images/products/nike-air-force-1-07-trang/1.jpg' ?>" alt="1">
                </div>
                <div class="item">
                    <img src="<?php echo _WEB . '/public/assets/images/products/nike-air-force-1-07-trang/2.jpg' ?>" alt="2">
                </div>
                <div class="item">
                    <img src="<?php echo _WEB . '/public/assets/images/products/nike-air-force-1-07-trang/3.jpg' ?>" alt="3">
                </div>
                <div class="item">
                    <img src="<?php echo _WEB . '/public/assets/images/products/nike-air-force-1-07-trang/4.jpg' ?>" alt="4">
                </div>
                <div class="item">
                    <img src="<?php echo _WEB . '/public/assets/images/products/nike-air-force-1-07-trang/5.jpg' ?>" alt="5">
                </div>
                <div class="item">
                    <img src="<?php echo _WEB . '/public/assets/images/products/nike-air-force-1-07-trang/6.jpg' ?>" alt="6">
                </div>
            </div>
        </div>
        <div class="product-right">
            <div class="product-name-wrapper">
                <div class="product-name">
                    <h3><?php echo $_nameVN ?></h3>
                </div>
            </div>
            <div class="feedback-wrapper d-flex gap-2">
                <div class="star-wrapper d-flex gap-1">
                    <div class="star">
                        <i class="fa-solid fa-star color-yellow"></i>
                    </div>
                    <div class="star">
                        <i class="fa-solid fa-star color-yellow"></i>
                    </div>
                    <div class="star">
                        <i class="fa-solid fa-star color-yellow"></i>
                    </div>
                    <div class="star">
                        <i class="fa-solid fa-star color-yellow"></i>
                    </div>
                    <div class="star">
                        <i class="fa-solid fa-star color-gray"></i>
                    </div>
                </div>
                <div class="feedback">
                    0 đánh giá
                </div>

            </div>
            <div class="product-stored d-flex gap-2 align-items-center border-bottom border-gray">
                <div class="price-wrapper">
                    <div class="product-price <?php echo ($_isSale) ? 'sale' : '' ?>">
                        <span class="new-price"><?php echo ($_isSale) ? $_salePrice . '₫ ' : '' ?> </span>
                        <?php echo ($_isSale) ? '-' : '' ?>
                        <span class="price"><?php echo $_price ?><span>₫</span></span>
                    </div>
                </div>
                <div class="store-check-wrapper border-start border-gray border-1 px-2 d-flex flex-column">
                    <div class="store-check border-0 d-flex gap-1">
                        <div class="avaiable text-success">
                            <i class="fa-solid fa-check "></i>
                        </div>
                        <div class="unavaiable text-danger">
                            <i class="fa-solid fa-x"></i>
                        </div>
                        <p>Kho hàng: </p>
                        <div class="avaiable text-success">
                            <p>CÒN HÀNG</p>
                        </div>
                        <div class="unavaiable text-danger">
                            <p>HẾT HÀNG</p>
                        </div>

                    </div>

                    <div class="product-id px-2">
                        <p>Mã sản phẩm: <?php echo $_id ?></p>
                    </div>
                </div>
                <div class="brand-wrapper">
                    <img src="<?php echo _WEB . '/public/assets/images/brand/nike.svg' ?>" alt="1" width="80px">
                </div>
            </div>
            <div class="size-wrapper d-flex flex-column gap-2">
                <p>Chọn size</p>
                <div class="size-select d-flex ps-1 gap-2" id="size-box">
                </div>
                <div class="size-guide">
                    <a href=""><i class="fa-solid fa-lightbulb color-yellow"></i> Hướng dẫn chọn size giày</a>
                </div>
            </div>
            <div class="shopping-wrapper mt-3">
                <div class="shopping d-flex align-items-center">
                    <div class="quantity d-flex">
                        <label for="product-quantity" class="d-none">Số lượng</label>
                        <input type="text" name="quantity" id="product-quantity" value="1">
                        <input type="hidden" name="_id" id="_id" value="<?php echo $_id ?>">
                        <span class="d-flex flex-column justify-content-center align-items-center h-100 stepper">
                            <i class="fa fa-angle-up pt-1"></i>
                            <i class="fa fa-angle-down pt-1"></i>
                        </span>
                    </div>
                    <div class="add-cart d-flex align-items-center px-5">
                        <span><i class="fa-solid fa-cart-plus"></i> THÊM VÀO GIỎ</span>
                    </div>
                    <div class="buy d-flex align-items-center px-5">
                        <span><i class="fa-solid fa-money-bill"></i> MUA HÀNG</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var size_box = document.querySelector("#size-box");
    $.ajax({
        url: web + "/fetch/" + id + "/size",
        cache: false,
        success: function(result) {
            const sizes = JSON.parse(result);
            sizes.forEach(element => {
                let child = `<div class="radio">
            <label>
                <input class="radio-input size" type="radio" name="size" value=` + element._id + `>
                <span class="radio-square">` + element._value + `</span>
            </label>
        </div>`;
                size_box.innerHTML += child;
            });
        },
    })

    let form_wrapper = document.querySelectorAll('.form-wrapper');
    form_wrapper.forEach(element => {
        element.onclick = function() {
            console.log('asdf');
        }
    });
    let close_pop_up = document.querySelectorAll('.close-pop-up');

    close_pop_up.forEach(element => {
        element.onclick = function() {
            element.parentElement.classList.toggle('hidden');
        }
    })

    let add_cart = document.querySelector('.add-cart');
    add_cart.onclick = function() {
        let size = document.querySelector('input.size:checked').value;
        if (size != null) {
            let quantity = add_cart.parentElement.querySelector('#product-quantity').value;
            let id = add_cart.parentElement.querySelector('#_id').value;

            $.post(web + "/add-cart", {
                    id: id,
                    size: size,
                    quantity: quantity
                },
                function(data, status) {
                    if (status = 'success') {
                        document.querySelector('.add-cart-notification').classList.toggle('show');
                        setTimeout(function() {
                            document.querySelector('.add-cart-notification').classList.toggle('show');
                        }, 1000);
                    }
                }
            );

        }
    }
</script>