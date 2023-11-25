import {isNull} from 'util';
export const formatStringDateDisplay        = 'DD-MMM-YYYY';
export const formatStringDateMonthDisplay   = 'MMM-YYYY';
export const formatStringDateTimeDisplay    = 'DD-MMM-YYYY HH:mm:ss';
export const formatStringTimeDisplay        = 'HH:mm:ss';

const formatStringDateSlashApiRequest       = 'YYYY/MM/DD';
const formatStringDateApiRequest            = 'YYYY-MM-DD';
const formatStringDateTimeApiRequest        = 'YYYY-MM-DD HH:mm:ss';

const formatDateDefault = ['DD-MMM-YYYY', 'YYYY-MM-DDTHH:mm:ss'];

export const formatDateForDisplay = (dateInput) => {
    return moment(dateInput, formatDateDefault).format(formatStringDateDisplay);
}

export const formatDateMonthForDisplay = (dateInput) => {
    return moment(dateInput, formatDateDefault).format(formatStringDateMonthDisplay);
}

export const formatDateSlashForApiRequest = (dateInput) => {
    if(dateInput == '' || isNull(dateInput))
    {
        dateInput = '01-Jan-1970';
    }
    return moment(dateInput, formatDateDefault).format(formatStringDateSlashApiRequest);
}

export const formatDateForApiRequest = (dateInput) => {
    
    if(dateInput == '' || isNull(dateInput))
    {
        dateInput = '01-Jan-1970';
    }
    return moment(dateInput, formatDateDefault).format(formatStringDateApiRequest);
}

export const formatDateTimeForApiRequest = (dateInput) => {
    if(dateInput == '' || isNull(dateInput))
    {
        dateInput = '01-Jan-1970';
    }
    return moment(dateInput, formatDateDefault).format(formatStringDateTimeApiRequest);
}

export const formatDateTimeForDisplay = (dateInput) => {
    return moment(dateInput, formatDateDefault).format(formatStringDateTimeDisplay);
}

export const formatTimeForDisplay = (dateInput) => {
    return moment(dateInput, formatDateDefault).format(formatStringTimeDisplay);
}

export const setObjectDate = (object, valueDate = null) => {

    $(object).datepicker({
        format: 'dd-M-yyyy',
        autoclose: true,
        orientation: "bottom auto"
    })
    if (isNull(valueDate)){
        $(object).datepicker("setDate",  new Date());
    } else if (valueDate == ''){
        $(object).datepicker("setDate",  null);
    } else {
        $(object).datepicker("setDate",  formatDateForDisplay(valueDate));
    }
}