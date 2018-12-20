
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('bootstrap-confirmation2/dist/bootstrap-confirmation.js');

$('[data-toggle=confirmation]').confirmation({
  rootSelector: '[data-toggle=confirmation]',
}).on('click', function (e) {
    $(this).find('form').submit();
});
