+function ($) {
    $(document).ready(function(){
        $(".ul.dropdown-menu [data-toggle=dropdown]").on('click', function(event) {
            event.preventDefault();
            event.stopPropagation();
            $(this).parent().siblings().removeClass('open');
            $(this).parent().toggleClass('open');
        });
    });
}(jQuery);

+function ($) {
    $(".dropdown ul").parent("li").addClass("parent");
    $(".dropdown ul li:first-child, .cusel span:first-child").addClass("first");
    $(".dropdown ul li:last-child, .cusel span:last-child").addClass("last");
}(jQuery);




+function ($) {
    $(".fdi-Carousel .item").each(function() {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(":first");
        }
        next.children(":first-child").clone().appendTo($(this));

        if (next.next().length > 0) {
            next.next().children(":first-child").clone().appendTo($(this));
        }
        else {
            $(this).siblings(":first").children(":first-child").clone().appendTo($(this));
        }
});
}(jQuery);