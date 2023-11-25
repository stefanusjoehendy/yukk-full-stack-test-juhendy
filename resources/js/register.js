import '../css/login.scss';
import axios from 'axios';

$(document).ready(function(){
    initValidation();
    btnRegisterOnClick();
    txtPasswordOnEnter();
    txtLinkOnClick();
})

export const initValidation = () => {
    $('#form_register').validate({
        rules: {
            username: {
                required: true,
            },
            fullname: {
                required: true,
            },
            password: {
                required: true,
            },
            confirm_password: {
                required: true,
                equalTo: "#mainpassword"
            },
            email: {
                required: true,
                email: true
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

export const btnRegisterOnClick = () => {
    $('#register').on('click', async function(){

        if ( $('#form_register').valid() ){

            let data = {
                username                    : $('#username').val(),
                name                        : $('#fullname').val(),
                password                    : $('#mainpassword').val(),
                password_confirmation       : $('#confirm_password').val(),
                email                       : $('#email').val(),
            };
            
            axios.post(`/api/registerusers`, {
                data
            })
            .then(function(response){
                const url = '/transaction';
                window.location = url;
            })
            .catch(function(error){
                $(".alert-box").html(error.response.data.message);
                $(".alert-box").attr('hidden', false);
                $('#mainpassword').val("");
                $('#confirm_password').val("");
            });
        }
    })
}

export const txtPasswordOnEnter = () => {
    $(`#mainpassword, #confirm_password`).on("keypress", function(e) {
        if (e.keyCode == 13) {
            $('#register').trigger( "click" );
        }
    });
}

export const txtLinkOnClick = () => {
    $('.link').on('click', function(){
        const url = '/login';
        window.location = url;
    });
}