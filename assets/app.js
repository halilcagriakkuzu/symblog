import './styles/global.scss';

require('bootstrap');

$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});