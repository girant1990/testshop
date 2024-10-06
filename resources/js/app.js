import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import 'bootstrap/dist/js/bootstrap.js';
import './utils'
import $ from 'jquery';
import Alpine from 'alpinejs';
import {TDataTable} from "./utils";

window.Alpine = Alpine;
window.$ = window.jQuery = $;
window.tdataTable = new TDataTable();

$(document).ready(function() {
    // Show success toast if it exists
    let successToast = $('#successToast')[0];
    if (successToast) {
        $('#successToast').toast('show');
    }

    // Show error toast if it exists
    let errorToast = $('#errorToast')[0];
    if (errorToast) {
        $('#errorToast').toast('show');
    }
});


Alpine.start();
