import { AutoScroll } from '@splidejs/splide-extension-auto-scroll';
import AutoNumeric from 'autonumeric';
import ionRangeSlider from 'ion-rangeslider';
import Swal from 'sweetalert2';
import { formatDateForApiRequest } from './lib/DateFormatter';
import { loadingHide, loadingShow, setButtonLoading } from './lib/LoadingState';

import 'admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.js';

export default class sales_enquiry {
    txtSalesType            = '#sales_type'
    txtEnquiryTitle         = '#enquiry_title'
    inputEnquiryDate        = '#enquiry_eventdate'
    inputEnquiryTime        = '#enquiry_eventtime'
    txtBudget               = '#enquiry_budget';
    sliderBudget            = '#enquiry_sliderbudget';
    txtPax                  = '#enquiry_pax';
    txtEventCode            = '#enquiry_eventcode';
    txtFullName             = "#enquiry_fullname";
    txtEmail                = "#enquiry_email";
    txtPhone                = '#enquiry_phone';
    btnSubmitEnquiry        = '#btn_enquiry_wedding';
    txtRequest              = '#enquiry_request';
    formSales               = '#form_sales';
    ckbTerms                = '#termcondition';
    modalEnquiry            = '#modal_enquiry_wedding';

    classModalContent       = '.modal-content';

    constructor(params){
        this.initBudgetNumeric();
        this.initCmbSalesType();
        this.initCmbTitle();
        this.initInputDate();
        this.initSliderBudget();
        this.txtBudgetOnchange();
        this.txtEventType(params.event);
        this.initValidationEnquiryWedding();
        this.btnSubmitOnClick();
        this.initPhoneFormat();
        this.txtPhoneOnInput();
    }

    initCmbSalesType = () => {
        const hotelName = `<option value="GATHERING">GATHERING</option>
        <option value="BIRTHDAY">BIRTHDAY</option>
        <option value="OTHERS">OTHERS</option>
        `;
    
        $(this.txtSalesType).append(hotelName);
    
        $(this.txtSalesType).select2({
            minimumInputLength : 0,
            dropdownAutoWidth : true,
            closeOnSelect: true,
            width: '100%'
        });
    }
    
    initCmbTitle = () => {
        const _title = `<option value="Mr">Mr</option>
        <option value="Mrs">Mrs</option>
        `;
    
        $(this.txtEnquiryTitle).append(_title);
    
        $(this.txtEnquiryTitle).select2({
            minimumInputLength : 0,
            dropdownAutoWidth : true,
            closeOnSelect: true,
            width: '100%'
        });
    }
    
    initInputDate = () => {
        
        $(this.inputEnquiryDate).datepicker({
            format: 'dd-M-yyyy',
            orientation: "bottom auto",
            autoclose: true,
            startDate: new Date(),
        }).datepicker("setDate", new Date());
        
        $(this.inputEnquiryTime).datetimepicker({
            format:'HH:mm',
        });
        $(this.inputEnquiryTime).datetimepicker('date', moment(new Date()).format('HH:mm') );
    }
    
    initBudgetNumeric = () => {
        this.initNumeric(this.txtBudget);
        this.initNumeric(this.txtPax);
        AutoNumeric.set(this.txtPax, 0);
    }
    
    initNumeric = (objectId) => {
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
    
    initSliderBudget = () => {
        const _this = this;
        $(this.sliderBudget).ionRangeSlider({
            skin    : "big",
            min     : 0,
            max     : 1000000000,
            type    : 'single',
            step    : 1000000,
            prettify: false,
            hasGrid : true,
            from    : 0,
            onStart: function(data) {
                AutoNumeric.set(_this.txtBudget, data.from);
            },
            onChange: function(data) {
                AutoNumeric.set(_this.txtBudget, data.from);
            }
        })
    }
    
    txtBudgetOnchange = () => {
        const _this = this;
        $(this.txtBudget).on("input", function() {
            var val = AutoNumeric.getNumber(_this.txtBudget);
    
            if (val < 0) {
                val = 0;
            } else if (val > 1000000000) {
                val = 1000000000;
            }
        
            $(_this.sliderBudget).data("ionRangeSlider").update({
                from: val
            });
        });
    }
    
    txtEventType = (event) => {
        $(this.txtEventCode).val(event);
    }
    
    initValidationEnquiryWedding = () => {
        $(this.formSales).validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 5
                },
                terms: {
                    required: true
                },
                sales_type: {
                    required: true,
                },
                enquiry_eventdate: {
                    required: true,
                },
                enquiry_eventcode: {
                    required: true
                },
                enquiry_title: {
                    required: true
                },
                enquiry_fullname: {
                    required: true
                },
                enquiry_email: {
                    required: true,
                    email: true
                },
                enquiry_phone: {
                    required: true,
                    number: true,
                    minlength:10,
                    maxlength:12
                },
                termcondition: {
                    required: true
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
    
    btnSubmitOnClick = () => {
        const _this = this;
        $(this.btnSubmitEnquiry).on('click', function(){
            
            let data = _this.handleGenerateData();
            
            if ( $(_this.formSales).valid() ){
    
                let checkAmount = _this.checkAmountInput();
                if (!checkAmount){
                    return false;
                }

                setButtonLoading(_this.btnSubmitEnquiry, true);
                loadingShow(_this.classModalContent);
    
                axios.post(`/api/enquiry`, {
                    data
                })
                .then(function(response){
                    loadingHide(_this.classModalContent)
                    setButtonLoading(_this.btnSubmitEnquiry, false);
                    $(_this.modalEnquiry).modal('hide');
                    _this.setBlankValue();
                    Swal.fire({
                        title   : 'Success',
                        html    : 'Thank You for Your Enquiry, We Will Contact You Soon.',
                        icon    : 'success'
                    });
                })
                .catch(function(error){
                    loadingHide(_this.classModalContent)
                    setButtonLoading(_this.btnSubmitEnquiry, false);
                    Swal.fire({
                        title   : 'Failed!',
                        html    : 'error',
                        icon    : 'warning'
                    });
                });
            }
            else{
                loadingHide(_this.classModalContent)
                setButtonLoading(_this.btnSubmitEnquiry, false);
                Swal.fire({
                    title   : 'Failed!',
                    html    : 'error',
                    icon    : 'warning'
                });
            }
        })
    }
    
    initPhoneFormat = () => {
        $(this.txtPhone).inputmask({
            "mask": "999999[999999]",
            placeholder: ""
        });
    }
    
    txtPhoneOnInput = () => {
        $(this.txtPhone).on('input', function(){
            if ( $(this).val().substr(0,1) == "0" ) {
                $(this).val("");
            }
        })
    }
    
    handleGenerateData = () => {
        let data= {};
        data = {
            "sales_type"        : $(this.txtSalesType).val(),
            "event_date"        : formatDateForApiRequest( $(this.inputEnquiryDate).val()),
            "event_time"        : $(this.inputEnquiryTime).datetimepicker('viewDate')._i,
            "event_code"        : $(this.txtEventCode).val(),
            "title"             : $(this.txtEnquiryTitle).val(),
            "name"              : $(this.txtFullName).val(),
            "email"             : $(this.txtEmail).val(),
            "phone"             : '62' + $(this.txtPhone).val(),
            "budget"            : AutoNumeric.getNumber(this.txtBudget),
            "total_pax"         : AutoNumeric.getNumber(this.txtPax),
            "special_request"   : $(this.txtRequest).val()
        }
        
        return data;
    }
    
    checkAmountInput = () => {
        let inputPax= AutoNumeric.getNumber(this.txtPax);
        let inputBudget= AutoNumeric.getNumber(this.txtBudget);
        let hasil = true;
        if (inputPax <= 0 ){
            $(this.txtPax).focus();
            Swal.fire({
                title   : 'Failed!',
                html    : 'Please input pax bigger than 0(zero)',
                icon    : 'warning'
            });
            hasil = false
        }
        if (inputBudget <= 0 ){
            $(this.txtBudget).focus();
            Swal.fire({
                title   : 'Failed!',
                html    : 'Please input budget bigger than 0(zero)',
                icon    : 'warning'
            });
            hasil = false
        }
        return hasil;
    }

    setBlankValue = () => {
        $(this.inputEnquiryDate).datepicker("setDate", new Date());
        $(this.inputEnquiryTime).datetimepicker('date', moment(new Date()).format('HH:mm') );
        $(this.txtFullName).val('');
        $(this.txtEmail).val('');
        $(this.txtPhone).val('');
        AutoNumeric.set(this.txtBudget, 0);
        AutoNumeric.set(this.txtPax, 0);
        $(this.txtRequest).val('');
        $(this.ckbTerms).prop('checked', 0);
        $(this.sliderBudget).data("ionRangeSlider").update({
            from: 0
        });
    }
}