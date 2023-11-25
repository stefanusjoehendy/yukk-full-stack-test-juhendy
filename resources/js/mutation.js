import { formatDateForDisplay } from "./lib/DateFormatter";
import AutoNumeric from 'autonumeric';

$(document).ready(function(){
    initTransType();
    getLastTransaction();
    datatableMutaion();
    handleEventButtonSubmit();
    handleEventTextFilter();
});

export const initTransType = () => {
    const transType = `<option value="ALL">ALL</option>
    <option value="TRIN">TOP UP</option>
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

export const getLastTransaction = () => {
    initNumeric('#total_saldo');
    axios.get(`/api/transaction`)
    .then(async function(response){
        AutoNumeric.set('#total_saldo', response.data);
        // $('#total_saldo').html(response.data);
    })
    .catch(function(error){
        Swal.fire({
            title   : 'Failed!',
            html    : error.response.data.message,
            icon    : 'warning'
        });
    });
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

export const datatableMutaion = () => {
    $('#datatable_ajax_mutation').DataTable({
        dom: `<'row'<'col-sm-12 col-md-6'l>>
                    <'row'<'col-sm-12'tr>>
                    <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>`,
        processing: true,
        serverSide: true,
        // aaSorting:[[0, 'asc']],
        ajax: {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            async: true,
            url: `/api/listmutation`,
            type: "POST",
            data: function (json) {
                json.criteria = {
                    "trans_code"     : $('#trans_type').val(),
                    "description"   : $('#trans_desc').val(),
                };
            }
        },
        columns: [
            {
                data: "ref_id"
            },
            {
                data: "trans_date",
                render : function (data, type, full, meta) {
                    return formatDateForDisplay(data);
                }
            },            
            {
                data: "trans_name",
            },
            {
                data: "description",
                render: function (data, type, full, meta) {
                    var $cutoff = 30;
                    if (data !== null) {
                        return type === "display" && data.length > $cutoff
                            ? data.substr(0, $cutoff) + "…"
                            : data;
                    } else {
                        return "";
                    }
                }
            },
            {
                data: "nominal",
                render: $.fn.dataTable.render.number(',', '.', 2)
            },
            {
                data: "balance",
                render: $.fn.dataTable.render.number(',', '.', 2)
            },
        ],
        "columnDefs": [
            { targets: [4], className: "text-right" },
            { targets: [5], className: "text-right" },
        ],
    });
}

export const handleEventButtonSubmit = () => {
    $('#btn_filter').click(function (e) {
        e.preventDefault();
        $('#datatable_ajax_mutation').DataTable().ajax.reload();
    });
}

export const handleEventTextFilter = () => {
    $('#trans_desc').on("keypress", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            $('#datatable_ajax_mutation').DataTable().ajax.reload();
        }
    });
}