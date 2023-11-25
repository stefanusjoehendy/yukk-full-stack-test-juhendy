const bodySpinner = `<div class="overlay dark">
<i class="fas fa-3x fa-sync-alt fa-spin"></i>
</div>`;

export const loadingShow = (object) => {
    $(object).toggleClass('small-box');
    $(object).append(bodySpinner);
}

export const loadingHide = (object) => {
    $(object).toggleClass('small-box');
    $( ".overlay" ).remove();
}

export const setButtonLoading = (object ,lock = true) => {
    if (lock){
        $(object).attr('disabled', true);
        $(object).html($(object).attr('data-text-loading'));
    } else {
        $(object).attr('disabled', false);
        $(object).html($(object).attr('data-text-normal'));
    }
}