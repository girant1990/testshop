import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import 'bootstrap/dist/js/bootstrap.js';
import $ from 'jquery/dist/jquery.js';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
window.$ = window.jQuery = $;

Alpine.start();
