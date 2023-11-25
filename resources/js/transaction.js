import AutoNumeric from 'autonumeric';
import Swal from 'sweetalert2';
import { formatDateForApiRequest } from './lib/DateFormatter';
import { loadingHide, loadingShow, setButtonLoading } from './lib/LoadingState';
import { isNullOrUndefined } from 'util';

let dataAttch;

$(document).ready(function(){
    initAmountNumeric();
    initTransType();
    initInputDate();
    initValidationTransaction();
    eventBtnSearchAttcOnChange();
    eventBtnSubmitOnClick();
});

export const initAmountNumeric = () => {
    initNumeric('#trans_amt');
    AutoNumeric.set('#trans_amt', 0);
}

export const initNumeric = (objectId) => {
    new AutoNumeric(objectId, {
        modifyValueOnWheel : false,
        selectOnFocus : false,
        decimalPlaces: 0
    });
    $(objectId).on('change', function(e){
        if(AutoNumeric.getNumber(objectId) < 0){
            AutoNumeric.set(objectId, 0);
        }
    });
    $(objectId).on("drop", function() {
        $(this).trigger('change')
    });
}

export const initTransType = () => {
    const transType = `<option value="TRIN">TOP UP</option>
    <option value="TROT">PAYMENT</option>
    `;

    $('#trans_type').append(transType);

    $('#trans_type').select2({
        minimumInputLength : 0,
        dropdownAutoWidth : true,
        closeOnSelect: true,
        width: '100%'
    });
}

export const initInputDate = () => {
        
    $('#trans_date').datepicker({
        format: 'dd-M-yyyy',
        orientation: "bottom auto",
        autoclose: true,
        startDate: new Date(),
    }).datepicker("setDate", new Date());
}

export const initValidationTransaction = () => {
    $('#form_trans').validate({
        rules: {
            trans_type: {
                required: true,
            },
            trans_date: {
                required: true,
            },
            trans_amt: {
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

export const handleGenerateData = () => {
    let data= {};
    data = {
        "trans_code"        : $('#trans_type').val(),
        "trans_date"        : formatDateForApiRequest( $('#trans_date').val()),
        "description"       : $('#trans_desc').val(),
        "nominal"           : AutoNumeric.getNumber('#trans_amt'),
        "file_attachement"  : $('#file_attch').val(),
        "user_id"           : 0,
        "ref_id"            : '',
        "current"           : 0,
        "balance"           : 0,
    }
    
    return data;
}

export const eventBtnSubmitOnClick = () => {
    $('#btn_submit').on('click', function(){
        let resultAttch = true;

        if ($('#form_trans').valid()){

            if (checkInput()) {
                return false;
            }

            setButtonLoading('#btn_submit', true);
            loadingShow('.card-body');

            let data = handleGenerateData();

            axios.post(`/api/transaction`, {
                data
            })
            .then(async function(response){
                if (!isNullOrUndefined(dataAttch)){
                    resultAttch = await attachmentFile(response.data.results,'#trans_attch', '#file_attch');
                }
                if (resultAttch){
                    loadingHide('.card-body')
                    setButtonLoading('#btn_submit', false);
                    blankInput();
                    Swal.fire({
                        title   : 'Success',
                        html    : `Ref - ID :  ${response.data.results}`,
                        icon    : 'success'
                    });
                }
            })
            .catch(function(error){
                loadingHide('.card-body')
                setButtonLoading('#btn_submit', false);
                Swal.fire({
                    title   : 'Failed!',
                    html    : error.response.data.message,
                    icon    : 'warning'
                });
            });
        }
    })
}

export const checkInput = () => {
    let errorStatus = false;

    let inputAmount= AutoNumeric.getNumber('#trans_amt');

    if ( inputAmount < 1){
        $('#trans_amt').focus();
        Swal.fire({
            title   : 'Failed!',
            html    : 'Please input Amount bigger than 0(zero)',
            icon    : 'warning'
        });
        errorStatus = true;
    }

    if ( $('#trans_type').val() == "TRIN" && $('#trans_attch').val() == ''){
        Swal.fire({
            title   : 'Failed!',
            html    : 'For top up transaction required upload attachment',
            icon    : 'warning'
        });
        errorStatus = true;
    }
    
    return errorStatus;
}

export const eventBtnSearchAttcOnChange = () => {
    $('#trans_attch').on('change', function(e){
        dataAttch = e.originalEvent.srcElement.files[0];
        
        if ( dataAttch.size > 2000000){
            let message = 'Please upload file less than 2MB. Thanks!!'
            Swal.fire(
                'Failed!',
                message,
                'warning'
            );
            $(this).val('');
        }
        else{
            $('#file_attch').val(dataAttch.name);
        }
    })
}

export const attachmentFile = async (refid, obj_btnsearch, obj_txtattchment) => {
    var tempValid =true;
    let formData = new FormData(); 
    let fileAttch = document.querySelector(obj_btnsearch);
    
    formData.append("fileattch", fileAttch.files[0]);
    formData.append("upload_name", fileAttch.files[0].name);
    formData.append("refid", refid);     
    
    await axios.post(`/api/attachmenttransaction`, formData)
    .catch(function(error) {
        tempValid = false;
        const message = 'Error in upload file Attachment';
        Swal.fire(
            'Upload file failed, data Already saved ',
            message,
            'warning'
        );
    });
    return tempValid;
}

export const blankInput = () => {
    $('#trans_desc').val('');
    $('#trans_date').datepicker("setDate", new Date());
    AutoNumeric.set('#trans_amt', 0);
    $('.custom-file-label').html(null);
    $('#file_attch').val('');
    $('#trans_attch').val('');
    dataAttch = null;
}