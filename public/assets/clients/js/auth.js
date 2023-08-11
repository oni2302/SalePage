let send_otp = document.querySelectorAll('.send-otp');
send_otp.forEach(element => {
    element.onclick = function () {
        let otp_type = element.getAttribute('data');
        let email = element.parentElement.parentElement.querySelector('#email').value;
        $.get(web + "/otp-dang-ki/" + email, function (data, status) {
            if (status == 'success') {
                element.innerHTML = "Đã gửi";
                element.disabled = true;
            }
        });
    }
});
function showSignUpPopUp(){
    let account_pop_up = document.querySelector('.account-pop-up');
    account_pop_up.classList.toggle('hidden');
}
let sign_up_btn = document.querySelectorAll('.sign-up-submit');
sign_up_btn.forEach(element => {
    element.onclick = function () {
        element.disabled = true;
        let _email = element.parentElement.querySelector('#email').value;
        let _otp = element.parentElement.querySelector('#otp').value;
        let _password = element.parentElement.querySelector('#password').value;
        let _rePassword = element.parentElement.querySelector('#re-password').value;
        $.post(web + "/dang-ki",
            {
                email: _email,
                otp: _otp,
                password: _password,
                rePassword: _rePassword
            },
            function (data, status) {
                element.disabled = false;
                if (status = 'success') {
                    if (data != 1) {
                        element.parentElement.querySelector('.message').innerHTML = data;
                    }
                    else {
                        element.parentElement.querySelector('.message').innerHTML = "Đăng kí thành công";
                        window.location.href = web;
                    }
                }
            }
        );
    }
})
