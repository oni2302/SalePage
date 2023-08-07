<div class="sign-up-from-wrapper d-flex justity-content-center align-items-center">
    <div class="sign-up-form d-flex justity-content-center align-items-center">
        <form action="<?php echo _WEB.'/dang-ki'?>" method="post">
            <label for="email">
                <input type="text" name="email" id="email">
            </label>
            <div class="otp-vertication d-flex">
                <label for="otp">
                    <input type="text" name="otp" id="otp">
                </label>
                <label for="otp-send">
                    <button type="button"class="send-otp">Gửi mã</button>
                </label>
            </div>
            <label for="password">
                <input type="password" name="password" id="password">
            </label>
            <label for="re-password">
                <input type="password" name="re-password" id="re-password">
            </label>
            <label for="sign-up">
                <button type="submit">Đăng ký</button>
            </label>
        </form>
    </div>
</div>