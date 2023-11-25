import './base';

import '../css/app.scss';

import _ from 'lodash';
window._ = _;

import $ from 'jquery';
window.jQuery = window.$ = $;

import moment from 'moment';
window.moment = moment;
import 'admin-lte/plugins/moment/moment-with-locales.js';

import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

import 'admin-lte/node_modules/bootstrap/dist/js/bootstrap.js';

import popper from 'popper.js';
window.Popper = popper;


import adminlte from 'admin-lte';
window.adminlte = adminlte;

import select2 from 'select2';
select2();

import 'bootstrap-datepicker';
import 'bootstrap-daterangepicker';


// moment().format();

import 'moment/min/moment.min.js';

import 'jquery-validation';

import 'inputmask/dist/jquery.inputmask';

import.meta.glob([
    '../assets/**',
]);

$('[data-toggle="tooltip"]').tooltip();

import bsCustomFileInput from 'admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js';
bsCustomFileInput.init();

import 'datatables.net';
import 'datatables.net-bs4';