var NiceCollapse = {
    Event: {
        OnClickMenu: function () {
            $(document).on('click', '.nice-menu a', function () {
                var $niceMenu = $('.nice-menu');
                var isVisible = $niceMenu.find('.panel-collapse .panel-body').is(":visible");
                var $chevron = $(this).find('.chevron');
                $niceMenu.find('.fa-chevron-down').removeClass('fa-chevron-down').addClass('fa-chevron-right');
                if (isVisible) {
                    $chevron.removeClass('fa-chevron-right').addClass('fa-chevron-down');
                }
            });
        }
    }
};

$(document).ready(function () {
    NiceCollapse.Event.OnClickMenu();
});