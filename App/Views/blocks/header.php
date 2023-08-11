<?php if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
} 
$_isLogin = false;
$user = null;
if(isset($_SESSION['user'])){
    $_isLogin = true;
    $user = $_SESSION['user'];
}
?>
<div class="header container-fluid">
    <div class="header-container">
        <div class="top-header">
            <div class="logo">
                <div class="logo-image">
                    <a href="<?php echo _WEB ?>"><img src="<?php echo _WEB; ?>/public/assets/images/logo.png" alt="logo"></a>
                    <span>ONI Shop</span>
                </div>
            </div>
            <div class="search-bar">
                <input type="text">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="account-function">
                <div class="user">
                    <div class="icon">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <div class="account">
                        <span>Đăng nhập</span>/<span onclick="showSignUpPopUp()">Đăng kí</span>
                        <div class="account-pop-up hidden">
                            <div class="close-pop-up" onclick="showSignUpPopUp()"><i class="fa-solid fa-x"></i></div>
                            <div class=" form-wrapper sign-up-form-wrapper shadow-sm d-flex justity-content-center align-items-center">
                                <div class="sign-up-form d-flex justity-content-center align-items-center">
                                    <h3>ĐĂNG KÍ</h3>
                                    <form method="post">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email">
                                        <label for="otp">OTP</label>
                                        <div class="otp-vertication d-flex">
                                            <input type="text" name="otp" id="otp">
                                            <button type="button" class="send-otp" data=1>Gửi mã</button>
                                        </div>
                                        <label for="password">Mật khẩu</label>
                                        <input type="password" name="password" id="password">
                                        <label for="re-password">Nhập lại mật khẩu</label>
                                        <input type="password" name="re-password" id="re-password">
                                        <label for="sign-up"></label>
                                        <div class="message" style="font-size: 0.55rem;margin:auto;"></div>
                                        <button class="sign-up-submit submit" type="button">Đăng ký</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cart-wrapper">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <div class="add-cart-notification d-flex justity-content-center align-items-center bg-success">
                        <p>Đã thêm giỏ hàng</p>
                    </div>
                    <div class="cart d-flex flex-column  shadow-sm">
                        <h6>Giỏ hàng</h6>
                        <?php
                        if (isset($_SESSION['cart']))
                            foreach ($cart as $key => $value) {
                        ?>
                            <div class="product d-flex gap-2 align-items-center justify-content-between">
                                <div class="image">
                                    <img src="<?php echo _WEB . '/public/assets/images/products/nike-air-force-1-07-trang/1.jpg' ?>" alt="">
                                </div>
                                <div class="title">
                                    <p><?php echo $value['_nameVN']?></p>
                                </div>
                                <div class="quantity">
                                    <p><?php echo 'SL:'.$value['quantity'] ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="nav-bar">
    <ul class="menu-list contaisewdner-sm">
        <li>Giày Nike</li>
        <li>Giày Adidas</li>
        <li>Giày Puma</li>
        <li>Giày New Balance</li>
        <li>Giày Asics</li>
        <li>Sale</li>
        <li>Liên hệ</li>
    </ul>
</div>