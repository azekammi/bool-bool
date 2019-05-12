function touchMoveOff(e){
    e.preventDefault()
}

function navMenuActive(){
    window.scrollTo(0, 0);
    var navMobile = document.getElementById("nav-mobile");
    TweenLite.to(navMobile, 0.5, {display: "block", width:"100%", ease:Power2.easeInOut});
    $("html").css("overflow-y", "hidden")
    $("#nav-mobile").css("position", "fixed")
    $("#nav-mobile").css("z-index", "999")

    // $("#main").css("position", "fixed")
    // $("#main").css("z-index", "0")

    window.addEventListener('touchmove', touchMoveOff, { passive: false });
}

function navMenuDisactive(){
    var navMobile = document.getElementById("nav-mobile");
    TweenLite.to(navMobile, 0.5, {display: "none", width:"0", ease:Power2.easeInOut});
    $("html").css("overflow-y", "auto")
    $("#nav-mobile").css("position", "unset")
    $("#nav-mobile").css("z-index", "auto")

    // $("#main").css("position", "unset")
    // $("#main").css("z-index", "auto")

    window.removeEventListener('touchmove', touchMoveOff, { passive: false });
}

function navMenuElements(){
    var navMobile = document.getElementById("nav-mobile");
    TweenLite.to(navMobile, 0.5, {display: "none", width:"0", ease:Power2.easeInOut, onComplete: function(){var href = $(this).attr("href"); window.location.hash = href;}});
    $("html").css("overflow-y", "auto")
}

$("#open-menu").on("click", navMenuActive)
$("#close-menu").on("click", navMenuDisactive)
$(".menu-elements").on("click", navMenuElements)

function newsEventsCarouselCreate() {
    var newsEventsCarousel = $('#news-events-carousel')

    $("#news-events-carousel-block .menu-prev-block").click(function(){
        newsEventsCarousel.trigger('prev.owl.carousel');
    })

    $("#news-events-carousel-block .menu-next-block").click(function(){
        newsEventsCarousel.trigger('next.owl.carousel');
    })

    function changeNewsEvents(e) {
        var activeCount = $(this).find(".active").length

        if(e.item.index === e.item.count - activeCount) $("#news-events-carousel-block .menu-next-block").addClass("menu-button-disabled-next")
        else $("#news-events-carousel-block .menu-next-block").removeClass("menu-button-disabled-next")

        if(e.item.index === 0) $("#news-events-carousel-block .menu-prev-block").addClass("menu-button-disabled-prev")
        else $("#news-events-carousel-block .menu-prev-block").removeClass("menu-button-disabled-prev")
    }

    newsEventsCarousel.on('translated.owl.carousel', changeNewsEvents)

    newsEventsCarousel.on('initialized.owl.carousel', changeNewsEvents);

    newsEventsCarousel.owlCarousel({
        loop: true,
        center: false,
        responsiveClass:true,
        responsive:{
            0:{
                loop: false,
                items:1,
                margin: 15,
                stagePadding: 15,
                touchDrag  : false,
                mouseDrag  : false
            },
            500:{
                loop: false,
                items:2,
                margin: 15,
                stagePadding: 15,
                touchDrag  : true,
                mouseDrag  : true
            },
            1000:{
                loop: false,
                items:3,
                margin: 28,
                touchDrag  : true,
                mouseDrag  : true
            }
        }
    })
}


//story
var storyCarousel = $('#story-events-carousel')

storyCarousel.owlCarousel({
    loop: true,
    center: true,
    //margin: "10%",
    responsiveClass:true,
    nav: true,
    smartSpeed: 600,
    // autoWidth:true,
    // animateOut: 'zoomOut',
    // animateIn: 'zoomIn',
    responsive:{
        0:{
            items:3,
            nav:false,
            touchDrag  : false,
            mouseDrag  : false
        },
        600:{
            items:3,
            nav:false,
            touchDrag  : false,
            mouseDrag  : false
        },
        1000:{
            items:3,
            nav:true,
            loop: true,
            touchDrag  : false,
            mouseDrag  : false
        }
    }
})

var storyCarouselMovingTo = 1
storyCarousel.on('translate.owl.carousel', function(e) {
    var elem = $(e.target)
    elem.find(".current-item").parent().css("z-index", 2)
    elem.find(".item").removeClass("current-item")

    if(storyCarouselMovingTo === 0) {
        if(elem.find(".center").hasClass("cloned")) $(elem.find(".owl-item").not(".cloned")[elem.find(".owl-item").not(".cloned").length-2]).find(".item").addClass("current-item")
        else $(elem.find(".center")[0]).prev().find(".item").addClass("current-item")
    }
    else {
        if(elem.find(".center").next().hasClass("cloned")) $(elem.find(".owl-item").not(".cloned")[0]).find(".item").addClass("current-item")
        else $(elem.find(".center")[0]).next().find(".item").addClass("current-item")
    }

    elem.find(".current-item").parent().css("z-index", 4)
})

$("#story-prev").click(function(){
    storyCarouselMovingTo = 0;
    storyCarousel.trigger('prev.owl.carousel');
})

$("#story-next").click(function(){
    storyCarouselMovingTo = 1;
    storyCarousel.trigger('next.owl.carousel');
})

$("#menu-block, #pin-block a:first-child, #nav-mobile-menu, #header-contacts, #header-footer, #to-section-map, #contacts-pin").on("click", "a", function (event) {
    //отменяем стандартную обработку нажатия по ссылке
    event.preventDefault();

    //забираем идентификатор бока с атрибута href
    var id  = $(this).attr('href'),

        //узнаем высоту от начала страницы до блока на который ссылается якорь
        top = $(id).offset().top;

    //анимируем переход на расстояние - top за 1500 мс
    $('body,html').animate({scrollTop: top}, 1500);
});

function headerBodyElementsView(){
    var vhCenterTextTop = (parseInt($("#header-body").css("height"), 10) - parseInt($("#vh-center-text").css("height"), 10)) / 2

    var logoTop = (vhCenterTextTop - parseInt($("#logo").css("height"), 10)) / 2

    var reservationButtonTop = vhCenterTextTop + parseInt($("#vh-center-text").css("height"), 10) + (parseInt($("#header-body").css("height"), 10) - vhCenterTextTop - parseInt($("#vh-center-text").css("height"), 10) - parseInt($("#header-body .reservation-button").css("height"), 10)) / 2

    $("#vh-center-text").css("top", vhCenterTextTop+"px")
    $("#logo").css("top", logoTop+"px")
    $("#header-body .reservation-button").css("top", reservationButtonTop+"px")
}

function fixedMenu(){
    var aTop = $('#head').height();

    if($(this).scrollTop()>=aTop){
        $('#head').addClass("fixed-head")
        //$("#header-body").css("height", "calc(100vh - 50px)")
        $("#header-body").css("top", "53px")
    }
    else{
        $('#head').removeClass("fixed-head")
        //$("#header-body").css("height", "calc(100vh - 100px)")
        $("#header-body").css("top", "0")
    }
}

function indicatorOfOutline(){

    $('#menu-block .menu li').removeClass("active")

    var id = "";

    if($("#section-story").length && $(this).scrollTop() >= $("#section-story").offset().top) id = "#section-story"
    if($("#section-menu").length && $(this).scrollTop() >= $("#section-menu").offset().top) id = "#section-menu"
    if($("#section-news-events").length && $(this).scrollTop() >= $("#section-news-events").offset().top) id = "#section-news-events"
    if($("#section-moments").length && $(this).scrollTop() >= $("#section-moments").offset().top) id = "#section-moments"
    if($("#section-contacts").length && $(this).scrollTop() >= $("#section-contacts").offset().top) id = "#section-contacts"

    $('#menu-block .menu a').each(function(index, element) {
        if($(element).attr("href") == id){
            $(element).parent().addClass("active")
        }
    })
}

function instaImagesHeight(){

    $("#news-events-carousel .item img").show()

    var width = $("#news-events-carousel .owl-item").width()
    var heights = []
    $("#news-events-carousel .item").each(function(index, item){
        heights.push($(item).height())
    })
    var minHeight = Math.min.apply(Math, heights)

    if(width > minHeight) {
        $("#news-events-carousel .item").height(width)
    }
    else {
        $("#news-events-carousel .item").width(minHeight)
    }

    $("#news-events-carousel .item img").hide()
}

function foodMenuHeight(){
    var heights = []
    $("#block-menu-body-body .tab-content").find(".tab-pane").each(function(index, item){
        heights.push($(item).height())
    })

    $("#block-menu-body-body .tab-content").find(".tab-pane").height(Math.max.apply(Math, heights))
    $("#block-menu-body-body .tab-content").find(".tab-pane .owl-carousel").height(Math.max.apply(Math, heights) - 120)
    $("#block-menu-body-body .tab-content").find(".tab-pane .menu-nav-button-block").height(Math.max.apply(Math, heights))
}

$( window ).resize(function(){
    console.log("resize")
    headerBodyElementsView()

    // $('#news-events-carousel').trigger('destroy.owl.carousel')
    // newsEventsCarouselCreate()

    var width = $("#news-events-carousel .owl-item").width()
    $("#news-events-carousel .item").width(width)
    $("#news-events-carousel .item").height(width)


    // $('#news-events-carousel').trigger('refresh.owl.carousel')
    // instaImagesHeight()

})

$(window).scroll(function(){
    fixedMenu()
    indicatorOfOutline()
    //headerBodyElementsView()
});

// $(document).ready(function () {
// })

$(window).on("load", function(){

    newsEventsCarouselCreate()

    headerBodyElementsView()
    fixedMenu()
    indicatorOfOutline()
    instaImagesHeight()
    foodMenuHeight()

    $('.grid').masonry({
        // set itemSelector so .grid-sizer is not used in layout
        itemSelector: '.grid-item',
        // use element for option
        columnWidth: 1,
        percentPosition: true
        //gutter: 30
    })

})