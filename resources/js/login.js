import '../css/login.scss';
import axios from 'axios';

$(document).ready(function(){
    initValidation();
    btnSignInOnClick();
    txtPasswordOnEnter();
    txtLinkOnClick();
})

export const initValidation = () => {
    $('#form_login').validate({
        rules: {
            username: {
                required: true,
            },
            password: {
                required: true,
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
}

export const btnSignInOnClick = () => {
    $('#signin').on('click', async function(){

        if ( $('#form_login').valid() ){
            
            axios.post(`/api/login`, {
                username        : $('#username').val(),
                password        : $('#password').val()
            })
            .then(function(response){
                const url = '/transaction';
                window.location = url;
            })
            .catch(function(error){
                $(".alert-box").html(error.response.data.message);
                $(".alert-box").attr('hidden', false);
                $('#password').val("");
            });
        }
    })
}

export const txtPasswordOnEnter = () => {
    $("#password").on("keypress", function(e) {
        if (e.keyCode == 13) {
            $('#signin').trigger( "click" );
        }
    });
}

export const txtLinkOnClick = () => {
    $('.link').on('click', function(){
        const url = '/register';
        window.location = url;
    });
}