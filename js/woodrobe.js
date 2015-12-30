jQuery(document).ready(function($){

//░░░░░░░░░░░░░░░░░░░░░░░░
//
//     DIRECTORY
//
//     _LoginToggle
//
//░░░░░░░░░░░░░░░░░░░░░░░░

//▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀
// _LoginToggle
//▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄

if ($('.woocommerce-account #customer_login')[0]){
    $('.wdrobe-toggle .register-hint > div').click(function(){
        $('.woocommerce-account #customer_login').addClass('shift-to-register');
    });

    $('.wdrobe-toggle .login-hint > div').click(function(){
        $('.woocommerce-account #customer_login').removeClass('shift-to-register');
    });

    $('.woocommerce-account #customer_login .form-row-wide input').on('change keyup', function(){
        if($(this).val().length > 0){
            $(this).parent().addClass('completed');
        }else{
            $(this).parent().removeClass('completed');
        }
    });
}

});