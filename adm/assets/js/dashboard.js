//apresentar ou ocultar um menu
$(document).ready(function () {
    $('.sidebar-toggle').on('click', function () {
        $('.sidebar').toggleClass('toggled');
    });
});

//carregar aberto o sidebar
var active = $('.sidebar .active ');
if (active.length && active.parent('.collapse').length){
    var parent = active.parent('.collapse')
    parent.prev('a').attr('aria-expanded', true);
    parent.addClass('show');
}
