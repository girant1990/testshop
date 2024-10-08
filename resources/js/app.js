import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import 'bootstrap/dist/js/bootstrap.js';
import $ from 'jquery';
import Alpine from 'alpinejs';
import {TDataTable} from "./utils";
import Echo from "laravel-echo";
import Pusher from "pusher-js";
import Cookie from './js.cookie.min'



window.Alpine = Alpine;
window.$ = window.jQuery = $;
window.Cookie = Cookie;
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'testshopkey',
    forceTLS: false,
    cluster: 'mt1',
    wsHost: '127.0.0.1',
    wsPort: 6001,
    disableStats: false,
})
window.Pusher = Pusher;
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
