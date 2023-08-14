<?php
$cart_check = false;
$discount = 0;
if (isset($_SESSION['cart'])) {
    if (!empty($_SESSION['cart'])) {
        $cart_check = true;
    }
    if(isset($_SESSION['voucher'])){
        $voucher = $_SESSION['voucher'];
        $discount = $voucher['discount'];
        unset($_SESSION['voucher']);
    }
}
if (!$cart_check) { ?>
    <div class="container-sm d-flex justify-content-center align-items-center h-25">
        <h3>GIỎ HÀNG TRỐNG</h3>
    </div>
<?php } else {
?>
    <div class="cart-page-wrapper container-sm d-flex justify-content-between mt-2 flex-wrap">
        <div class="cart-page">
            <h4 style="font-weight: 600;color:var(--sub-color);text-align:center;">GIỎ HÀNG</h4>
            <table class="table table align-middle table-responsive p-1 border border-1 border-gray">
                <thead>
                    <tr>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    $price = 0;
                    foreach ($_SESSION['cart'] as $key => $value) {
                        extract($value);
                        if ($_isSale) {
                            $_price = $_salePrice;
                        }
                        $price = $_price * $quantity;
                        $total+=$price;
                    ?>
                        <tr class="">
                            <td scope="row">
                                <img width="100px" height="100px" src="<?php echo _WEB . '/public/assets/images/products/nike-air-force-1-07-trang/1.jpg' ?>" alt="1">
                            </td>
                            <td><?php echo $_nameVN ?></td>
                            <td>
                                <div class="quantity-wrapper d-flex align-items-center">
                                    <div class="quantity d-flex">
                                        <label for="product-quantity" class="d-none">Số lượng</label>
                                        <input type="text" name="quantity" id="product-quantity" value="<?php echo $quantity ?>">
                                        <input type="hidden" name="_id" id="_id" value="<?php echo $_id ?>">
                                        <span class="d-flex flex-column justify-content-center align-items-center h-100 stepper">
                                            <i class="fa fa-angle-up pt-1"></i>
                                            <i class="fa fa-angle-down pt-1"></i>
                                        </span>
                                    </div>
                                    <div class="cart-update tool d-flex justify-content-center align-items-center h-100">
                                        <i class="fa-solid fa-rotate-right"></i>
                                    </div>
                                    <div class="cart-delete tool d-flex justify-content-center align-items-center h-100">
                                        <i class="fa-solid fa-trash"></i>
                                    </div>
                                </div>

                            </td>
                            <td><?php echo number_format($_price, 0, '', ','); ?><span>₫</span></td>
                            <td><?php echo number_format($_price * $quantity, 0, '', ','); ?><span>₫</span></td>
                        </tr>
                        <?php }?>
                </tbody>
            </table>
        </div>
        <div class="check-out-page">
            <h4 style="font-weight: 600;color:var(--sub-color);text-align:center;">THANH TOÁN</h4>
            <div class="check-out border border-1 border-gray p-3">
                <div class="voucher-field">
                    <p class="border-bottom border-1 border-gray mx-2">Sử dụng mã giảm giá</p>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="basic-addon1">$</span>
                        <input type="text" class="form-control" placeholder="Mã giảm giá" aria-label="voucher" aria-describedby="basic-addon1">
                        <button class="btn btn-outline-success" type="button" id="button-addon2">Áp dụng</button>
                    </div>
                    <div class="check-out-info border border-1 border-gray p-2">
                        <div class="price">
                            <span>Thành tiền: </span> <span><?php echo number_format($total, 0, '', ',')?><span>₫</span></span>
                        </div>
                        <div class="discount">
                            <span>Giảm giá: </span><span><?php echo number_format($total*$discount, 0, '', ',') ?><span>₫</span></span>
                        </div>
                        <div class="total">
                            <span>Tổng cộng: </span><span><?php echo number_format($total-($total*$discount), 0, '', ',')?><span>₫</span></span>
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2 mt-2">
                    <a href="<?php echo _WEB.'/tao-hoa-don' ?>" class="btn btn-danger" type="button">Thanh toán</a>
                </div>
            </div>

        </div>
    </div>
<?php 
                } ?>