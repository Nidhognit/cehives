var $ = require('jquery');
var toastr = require('toastr');
toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

$(function () {
    debugger
    var $allMessage = $('.main-message-area');
    $allMessage.find('.alert-notice-message').each(function () {
        toastr.info(this.textContent);
    });
    $allMessage.find('.alert-error-message').each(function () {
        toastr.error(this.textContent);
    });
    $allMessage.find('.alert-success-message').each(function () {
        toastr.success(this.textContent);
    })
})