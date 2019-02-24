function navMenuActive(){
    window.scrollTo(0, 0);
    var navMobile = document.getElementById("nav-mobile");
    TweenLite.to(navMobile, 0.5, {display: "block", width:"100%", ease:Power2.easeInOut});
    $("html").css("overflow-y", "hidden")
}

function navMenuDisactive(){
    var navMobile = document.getElementById("nav-mobile");
    TweenLite.to(navMobile, 0.5, {display: "none", width:"0", ease:Power2.easeInOut});
    $("html").css("overflow-y", "auto")
}

function navMenuElements(){
    var navMobile = document.getElementById("nav-mobile");
    TweenLite.to(navMobile, 0.5, {display: "none", width:"0", ease:Power2.easeInOut, onComplete: function(){var href = $(this).attr("href"); window.location.hash = href;}});
    $("html").css("overflow-y", "auto")
}

$("#open-menu").on("click", navMenuActive)
$("#close-menu").on("click", navMenuDisactive)
$(".menu-elements").on("click", navMenuElements)

$('.grid').masonry({
    // set itemSelector so .grid-sizer is not used in layout
    itemSelector: '.grid-item',
    // use element for option
    columnWidth: 1,
    percentPosition: true
    //gutter: 30
})

$('#news-events-carousel').owlCarousel({
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

//storyCarousel.trigger('translate.owl.carousel');

//menu carousel
// var menuCarouselFood = $('#menu-carousel-food')
//
// function changeMenuPaginationFood(e) {
//     var countPerItem = 4
//     var count = e.item.count
//     var index = e.item.index
//     var activeCount = $(this).find(".active").length
//
//     var from = index*countPerItem + 1
//     var to = from + activeCount*countPerItem - 1
//     from = from > 0 && from < 10 ? '0'+from : from;
//     to = to > 0 && to < 10 ? '0'+to : to;
//     $("#menu-pagination-from-food").text(from + " ")
//     $("#menu-pagination-to-food").text(" " + to)
//     $("#menu-pagination-total-food").text(count * countPerItem)
//
//     if(e.item.index === e.item.count - activeCount) $("#menu-next-food").addClass("menu-button-disabled-next")
//     else $("#menu-next-food").removeClass("menu-button-disabled-next")
//
//     if(e.item.index === 0) $("#menu-prev-food").addClass("menu-button-disabled-prev")
//     else $("#menu-prev-food").removeClass("menu-button-disabled-prev")
// }
//
// menuCarouselFood.on('translated.owl.carousel', changeMenuPaginationFood)
//
// menuCarouselFood.on('initialized.owl.carousel', changeMenuPaginationFood);
//
// menuCarouselFood.owlCarousel({
//     loop: false,
//     //center: true,
//     stagePadding: 150,
//     responsiveClass:true,
//     responsive:{
//         0:{
//             items:1,
//             margin: 25,
//             stagePadding: 50,
//             nav:false
//         },
//         600:{
//             items:1,
//             margin: 50,
//             stagePadding: 100,
//             nav:false
//         },
//         1000:{
//             items:2,
//             margin: 100,
//             stagePadding: 150,
//             loop: false
//         }
//     }
// })
//
// $("#menu-next-food").click(function(){
//     menuCarouselFood.trigger('next.owl.carousel');
// })
//
// $("#menu-prev-food").click(function(){
//     menuCarouselFood.trigger('prev.owl.carousel');
// })
//
// //
// var menuCarouselWithoutAlcohol = $('#menu-carousel-without_alcohol')
//
// function changeMenuPaginationWithoutAlcohol(e) {
//     var countPerItem = 4
//     var count = e.item.count
//     var index = e.item.index
//     var activeCount = $(this).find(".active").length
//
//     var from = index*countPerItem + 1
//     var to = from + activeCount*countPerItem - 1
//     from = from > 0 && from < 10 ? '0'+from : from;
//     console.log(to)
//     to = to > 0 && to < 10 ? '0'+to : to;
//     $("#menu-pagination-from-without_alcohol").text(from + " ")
//     $("#menu-pagination-to-without_alcohol").text(" " + to)
//     $("#menu-pagination-total-without_alcohol").text(count * countPerItem)
//
//     if(e.item.index === e.item.count - activeCount) $("#menu-next-without_alcohol").addClass("menu-button-disabled-next")
//     else $("#menu-next-without_alcohol").removeClass("menu-button-disabled-next")
//
//     if(e.item.index === 0) $("#menu-prev-without_alcohol").addClass("menu-button-disabled-prev")
//     else $("#menu-prev-without_alcohol").removeClass("menu-button-disabled-prev")
// }
//
// menuCarouselWithoutAlcohol.on('translated.owl.carousel', changeMenuPaginationWithoutAlcohol)
//
// menuCarouselWithoutAlcohol.on('initialized.owl.carousel', changeMenuPaginationWithoutAlcohol);
//
// menuCarouselWithoutAlcohol.owlCarousel({
//     loop: false,
//     //center: true,
//     stagePadding: 150,
//     responsiveClass:true,
//     responsive:{
//         0:{
//             items:1,
//             margin: 25,
//             stagePadding: 50,
//             nav:false
//         },
//         600:{
//             items:1,
//             margin: 50,
//             stagePadding: 100,
//             nav:false
//         },
//         1000:{
//             items:2,
//             margin: 100,
//             stagePadding: 150,
//             loop: false
//         }
//     }
// })
//
// $("#menu-next-without_alcohol").click(function(){
//     menuCarouselWithoutAlcohol.trigger('next.owl.carousel');
// })
//
// $("#menu-prev-without_alcohol").click(function(){
//     menuCarouselWithoutAlcohol.trigger('prev.owl.carousel');
// })
//
// //
// var menuCarouselWithAlcohol = $('#menu-carousel-with_alcohol')
//
// function changeMenuPaginationWithAlcohol(e) {
//     var countPerItem = 4
//     var count = e.item.count
//     var index = e.item.index
//     var activeCount = $(this).find(".active").length
//
//     var from = index*countPerItem + 1
//     var to = from + activeCount*countPerItem - 1
//     from = from > 0 && from < 10 ? '0'+from : from;
//     console.log(to)
//     to = to > 0 && to < 10 ? '0'+to : to;
//     $("#menu-pagination-from-with_alcohol").text(from + " ")
//     $("#menu-pagination-to-with_alcohol").text(" " + to)
//     $("#menu-pagination-total-with_alcohol").text(count * countPerItem)
//
//     if(e.item.index === e.item.count - activeCount) $("#menu-next-with_alcohol").addClass("menu-button-disabled-next")
//     else $("#menu-next-with_alcohol").removeClass("menu-button-disabled-next")
//
//     if(e.item.index === 0) $("#menu-prev-with_alcohol").addClass("menu-button-disabled-prev")
//     else $("#menu-prev-with_alcohol").removeClass("menu-button-disabled-prev")
// }
//
// menuCarouselWithAlcohol.on('translated.owl.carousel', changeMenuPaginationWithAlcohol)
//
// menuCarouselWithAlcohol.on('initialized.owl.carousel', changeMenuPaginationWithAlcohol);
//
// menuCarouselWithAlcohol.owlCarousel({
//     loop: false,
//     //center: true,
//     stagePadding: 150,
//     responsiveClass:true,
//     responsive:{
//         0:{
//             items:1,
//             margin: 25,
//             stagePadding: 50,
//             nav:false
//         },
//         600:{
//             items:1,
//             margin: 50,
//             stagePadding: 100,
//             nav:false
//         },
//         1000:{
//             items:2,
//             margin: 100,
//             stagePadding: 150,
//             loop: false
//         }
//     }
// })
//
// $("#menu-next-with_alcohol").click(function(){
//     menuCarouselWithAlcohol.trigger('next.owl.carousel');
// })
//
// $("#menu-prev-with_alcohol").click(function(){
//     menuCarouselWithAlcohol.trigger('prev.owl.carousel');
// })
//
// //
// var menuCarouselShisha = $('#menu-carousel-shisha')
//
// function changeMenuPaginationShisha(e) {
//     var countPerItem = 4
//     var count = e.item.count
//     var index = e.item.index
//     var activeCount = $(this).find(".active").length
//
//     var from = index*countPerItem + 1
//     var to = from + activeCount*countPerItem - 1
//     from = from > 0 && from < 10 ? '0'+from : from;
//     console.log(to)
//     to = to > 0 && to < 10 ? '0'+to : to;
//     $("#menu-pagination-from-shisha").text(from + " ")
//     $("#menu-pagination-to-shisha").text(" " + to)
//     $("#menu-pagination-total-shisha").text(count * countPerItem)
//
//     if(e.item.index === e.item.count - activeCount) $("#menu-next-shisha").addClass("menu-button-disabled-next")
//     else $("#menu-next-shisha").removeClass("menu-button-disabled-next")
//
//     if(e.item.index === 0) $("#menu-prev-shisha").addClass("menu-button-disabled-prev")
//     else $("#menu-prev-shisha").removeClass("menu-button-disabled-prev")
// }
//
// menuCarouselShisha.on('translated.owl.carousel', changeMenuPaginationShisha)
//
// menuCarouselShisha.on('initialized.owl.carousel', changeMenuPaginationShisha);
//
// menuCarouselShisha.owlCarousel({
//     loop: false,
//     //center: true,
//     stagePadding: 150,
//     responsiveClass:true,
//     responsive:{
//         0:{
//             items:1,
//             margin: 25,
//             stagePadding: 50,
//             nav:false
//         },
//         600:{
//             items:1,
//             margin: 50,
//             stagePadding: 100,
//             nav:false
//         },
//         1000:{
//             items:2,
//             margin: 100,
//             stagePadding: 150,
//             loop: false
//         }
//     }
// })
//
// $("#menu-next-shisha").click(function(){
//     menuCarouselShisha.trigger('next.owl.carousel');
// })
//
// $("#menu-prev-shisha").click(function(){
//     menuCarouselShisha.trigger('prev.owl.carousel');
// })

//
//$("#food-tab").tab('show')
//
/*
*
*
 */

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
        $("#header-body").css("height", "calc(100vh - 50px)")
        $("#header-body").css("top", "53px")
    }
    else{
        $('#head').removeClass("fixed-head")
        $("#header-body").css("height", "calc(100vh - 100px)")
        $("#header-body").css("top", "0")
    }
}

function indicatorOfOutline(){

    $('#menu-block .menu li').removeClass("active")

    var id = "";

    if($(this).scrollTop() >= $("#section-story").offset().top) id = "#section-story"
    if($(this).scrollTop() >= $("#section-menu").offset().top) id = "#section-menu"
    if($(this).scrollTop() >= $("#section-news-events").offset().top) id = "#section-news-events"
    if($(this).scrollTop() >= $("#section-moments").offset().top) id = "#section-moments"
    if($(this).scrollTop() >= $("#section-contacts").offset().top) id = "#section-contacts"

    $('#menu-block .menu a').each(function(index, element) {
        if($(element).attr("href") == id){
            $(element).parent().addClass("active")
        }
    })
}

$( window ).resize(function(){
    headerBodyElementsView()
})

$(window).scroll(function(){
    fixedMenu()
    indicatorOfOutline()
});

$(document).ready(function () {
    headerBodyElementsView()
    fixedMenu()
    indicatorOfOutline()
})