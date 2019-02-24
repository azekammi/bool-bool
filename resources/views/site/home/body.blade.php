<div id="nav-mobile">
    <div id="nav-mobile-block">
        <div id="close-block">
            <a id="close-menu" href="javascript:void(0)"><i class="fa fa-times" aria-hidden="true"></i></a>

            <ul class="list-unstyled change-lang-section">
                <li class="{{ Lang::getLocale() == "az" ? "active" : ""}}"><a href="{{ Lang::getLocale() == "az" ? "javascript:void(0)" : route("home")}}">AZ</a></li>
                <li class="{{ Lang::getLocale() == "ru" ? "active" : ""}}"><a href="{{ Lang::getLocale() == "ru" ? "javascript:void(0)" : route("home", ['lang' => "ru"])}}">RU</a></li>
                <li class="{{ Lang::getLocale() == "en" ? "active" : ""}}"><a href="{{ Lang::getLocale() == "en" ? "javascript:void(0)" : route("home", ['lang' => "en"])}}">EN</a></li>
            </ul>
        </div>
        <div id="mobile-nav-logo">
            <img src="/assets/site/images/Vector.png" />
        </div>
        <ul id="nav-mobile-menu" class="list-unstyled">
            <li><a href="#section-story" class="menu-elements">{{Lang::get("site.static_menu.about_us")}}</a></li>
            <li><a href="#section-menu" class="menu-elements">{{Lang::get("site.static_menu.menu")}}</a></li>
            <li><a href="#section-news-events" class="menu-elements">{{Lang::get("site.static_menu.instagram_feed")}}</a></li>
            <li><a href="#section-moments" class="menu-elements">{{Lang::get("site.static_menu.photos")}}</a></li>
            <li><a href="#section-contacts" class="menu-elements">{{Lang::get("site.static_menu.contacts")}}</a></li>
        </ul>
    </div>
</div>

<div id="main">
    <div id="header">
        <div id="head">
            <div id="pin-and-address" class="float-left">
                <div id="pin-block" class="float-left main-padding head-borders">
                    <div id="to-section-map">
                        <a href="#section-map">
                            <img src="/assets/site/images/pin.png" />
                        </a>
                    </div>
                    <a id="open-menu" href="javascript:void(0)"><i class="fas fa-bars"></i></a>
                </div>
                <div id="address-block" class="float-left main-padding head-borders">{{$settings->address}}</div>
            </div>
            <div id="menu-block" class="float-left">
                <ul class="menu list-unstyled">
                    <li><a href="#section-story">{{Lang::get("site.static_menu.about_us")}}</a></li>
                    <li><a href="#section-menu">{{Lang::get("site.static_menu.menu")}}</a></li>
                    <li><a href="#section-news-events">{{Lang::get("site.static_menu.instagram_feed")}}</a></li>
                    <li><a href="#section-moments">{{Lang::get("site.static_menu.photos")}}</a></li>
                    <li><a href="#section-contacts">{{Lang::get("site.static_menu.contacts")}}</a></li>
                </ul>
            </div>
            <div id="header-contacts" class="float-left">
                <ul class="menu list-unstyled">
                    <li><a href="#section-contacts">{{Lang::get("site.static_menu.contacts")}}</a></li>
                </ul>
            </div>
            <div id="social-and-phone" class="float-right">
                <ul class="list-unstyled float-left">
                    <li id="facebook-block" class="float-left main-padding head-borders"><a href="{{$settings->facebook_link}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li id="instagram-block" class="float-left main-padding head-borders"><a href="{{"https://www.instagram.com/$settings->instagram_page_name/"}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    <li id="whatsapp-block" class="float-left main-padding head-borders"><a href="{{$settings->whatsapp_link}}" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                    <li id="phone-icon" class="float-left main-padding head-borders"><a href="tel:={{$settings->phone}}"><i class="fas fa-phone"></i></a></li>
                </ul>
                <div id="phone-block" class="float-right main-padding">
                    <a href="tel:{{$settings->phone}}">{{$settings->phone}}</a>
                </div>
            </div>
        </div>
        <div id="header-body">
            <ul class="list-unstyled change-lang-section">
                <li class="{{ Lang::getLocale() == "az" ? "active" : ""}}"><a href="{{ Lang::getLocale() == "az" ? "javascript:void(0)" : route("home")}}">AZ</a></li>
                <li class="{{ Lang::getLocale() == "ru" ? "active" : ""}}"><a href="{{ Lang::getLocale() == "ru" ? "javascript:void(0)" : route("home", ['lang' => "ru"])}}">RU</a></li>
                <li class="{{ Lang::getLocale() == "en" ? "active" : ""}}"><a href="{{ Lang::getLocale() == "en" ? "javascript:void(0)" : route("home", ['lang' => "en"])}}">EN</a></li>
            </ul>
            <div id="logo"><img src="/assets/site/images/bool-bool-dog.png"></div>
            <div id="vh-center-text">
                <h1>{{$header->heading}}</h1>
                <p>{{$header->description}}</p>
            </div>
            <div class="reservation-button">
                <div class="reservation-button-normal"></div>
                <div class="reservation-button-rotated"></div>
                <a href="{{$settings->whatsapp_link}}" target="_blank">{{$header->button_text}}</a>
            </div>
        </div>
        <div id="header-footer">
            <div class="header-footer-mobile-block">
                <span>{{Lang::get("site.swipe_down")}}</span>
            </div>
            <div class="float-left header-footer-first-block">
                <a href="#section-story">{{Lang::get("site.scroll")}}</a>
                <a href="#section-story">Swipe</a>
            </div>
            <div class="float-left header-footer-second-block">
                <a href="#section-story">{{Lang::get("site.down")}}</a>
            </div>
        </div>
    </div>

    <div id="section-story">
        <div id="block-story">
            <div id="section-top">
                <div class="francisco-beauty">
                    <span>{{$ourStoryMain->heading}}</span>
                    <h2>{{$ourStoryMain->heading}}</h2>
                </div>
                <p>{{$ourStoryMain->text}}</p>
            </div>
            <div id="story-events-carousel-block" class="">
                <div id="story-events-carousel" class="owl-carousel">
                    @forelse($ourStoryImages as $key => $ourStoryImage)
                        <div class="item {{$key == 0 ? "current-item" : ""}}"><img src="/assets/site/images/{{$ourStoryImage->image_name}}" /></div>
                    @empty
                    @endforelse
                </div>
                <a id="story-prev" href="javascript:void(0)" class="story-nav-button-block">
                    <img src="/assets/site/images/arrow_left.png">
                </a>
                <a id="story-next" href="javascript:void(0)" class="story-nav-button-block">
                    <img src="/assets/site/images/arrow_right.png">
                </a>
            </div>
        </div>
    </div>

    <div id="section-book">
        <div id="block-book">
            <div class="francisco-beauty">
                <span>{{$bookATable->heading}}</span>
                <h2>{{$bookATable->heading}}</h2>
            </div>
            {!! $bookATable->description !!}
            <div class="reservation-button">
                <div class="reservation-button-normal"></div>
                <div class="reservation-button-rotated"></div>
                <a href="{{$settings->whatsapp_link}}" target="_blank">{{$header->button_text}}</a>
            </div>
        </div>
    </div>

    <div id="section-menu">
        <div id="block-menu">
            <div class="francisco-beauty">
                <span>{{$menuMain->heading}}</span>
                <h2>{{$menuMain->heading}}</h2>
            </div>
        </div>
        <div id="block-menu-body">
            <div id="block-menu-body-header">
                <ul id="block-menu-body-header-menu" class="list-unstyled" role="tablist">
                    @forelse($menuCategories as $key => $menuCategory)
                        <li><a id="category-{{$menuCategory->id}}-tab" data-toggle="tab" href="#category-{{$menuCategory->id}}" role="tab" aria-controls="category-{{$menuCategory->id}}" aria-selected="{{$key == 0 ? "true" : "false" }}">{{$menuCategory->name}}</a></li>
                    @empty
                    @endforelse
                </ul>
            </div>
            <div id="block-menu-body-body">
                <div class="tab-content" id="myTabContent">
                    @forelse($menuCategories as $key => $menuCategory)
                        <div class="tab-pane fade active" id="category-{{$menuCategory->id}}" role="tabpanel" aria-labelledby="category-{{$menuCategory->id}}-tab">
                            <div id="menu-carousel-block-category-{{$menuCategory->id}}" class="menu-carousel-block">
                                <div id="menu-carousel-category-{{$menuCategory->id}}" class="menu-carousel owl-carousel">
                                    @for($i=0; $i<count($menuCategory->dishes)/4; $i++)
                                        <div class="item">
                                            <ul class="list-unstyled">
                                                @for($j=$i*4; $j< $i*4 + 4; $j++)
                                                    @if(isset($menuCategory->dishes[$j]))
                                                        <li>
                                                            <div class="food-name-price-block">
                                                                <span class="food-name float-left">{{$menuCategory->dishes[$j]->name}}</span>
                                                                <span class="food-price float-right"><b>{{number_format($menuCategory->dishes[$j]->price/100, 2, ',', '')}}</b> <span class="menu-currency">AZN</span></span>
                                                            </div>
                                                            <div style="clear: both ">
                                                                <span class="food-ingredients">{{$menuCategory->dishes[$j]->description}}</span>
                                                            </div>
                                                        </li>
                                                    @endif
                                                @endfor
                                            </ul>
                                        </div>
                                    @endfor
                                </div>
                                <div id="menu-prev-category-{{$menuCategory->id}}" class="menu-prev-block menu-nav-button-block">
                                    <a href="javascript:void(0)" class="menu-prev">
                                        <img src="/assets/site/images/arrow_left.png">
                                        <img src="/assets/site/images/arrow_left_disabled.png">
                                    </a>
                                </div>
                                <div id="menu-next-category-{{$menuCategory->id}}" class="menu-next-block menu-nav-button-block">
                                    <a href="javascript:void(0)" class="menu-next">
                                        <img src="/assets/site/images/arrow_right.png">
                                        <img src="/assets/site/images/arrow_right_disabled.png">
                                    </a>
                                </div>
                                <div class="menu-pagination">
                                    <ul class="list-unstyled">
                                        <li>
                                            <span id="menu-pagination-from-category-{{$menuCategory->id}}" class="menu-pagination-from">01 </span>
                                            <span>-</span>
                                            <span id="menu-pagination-to-category-{{$menuCategory->id}}" class="menu-pagination-to"> 08</span>
                                        </li>
                                        <li class="pagination-line"></li>
                                        <li>
                                            <span id="menu-pagination-total-category-{{$menuCategory->id}}" class="menu-pagination-total">15</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    @if(!empty($instagramImages))
        <div id="section-news-events">
            <div id="block-new-events">
                <div class="francisco-beauty">
                    <span>{{$instagramFeed->heading}}</span>
                    <h2>{{$instagramFeed->heading}}</h2>
                </div>
                <div id="news-events-carousel" class="owl-carousel">
                    @forelse($instagramImages as $key => $instagramImage)
                        <div class="item" style="background-image: url({{$instagramImage->node->display_url}})">
                            @if($key == count($instagramImages)-1)
                                <div id="view-instagram">
                                    <a href="{{"https://www.instagram.com/$settings->instagram_page_name/"}}" target="_blank">
                                        <div id="view-instagram-back"></div>
                                        <div id="view-instagram-block">
                                            <div><img src="/assets/site/images/instagram_feed.png" /></div>
                                            <div><h4>{{Lang::get("site.more_instagram")}}</h4></div>
                                            <div>{{Lang::get("site.view")}}</div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                            {{--                        <img src="{{$instagramImage->node->display_url}}" style="" />--}}
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    @endif()

    <div id="section-moments">
        <div id="block-moments">
            <div class="francisco-beauty">
                <span>{{$momentsMain->heading}}</span>
                <h2>{{$momentsMain->heading}}</h2>
            </div>
            <div class="grid">
                @forelse($momentsImages as $momentsImage)
                    <div class="grid-item">
                        <div class="grid-item-element">
                            <img src="/assets/site/images/{{$momentsImage->image_name}}" />
                            <img src="/assets/site/images/{{$momentsImage->image_name}}" />
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>

    <div id="section-contacts">
        <div id="block-contacts">
            <div class="francisco-beauty">
                <span>{{$contacts->heading}}</span>
                <h2>{{$contacts->heading}}</h2>
            </div>
            <div id="block-contacts-body" class="row">
                <div class="col-md-2">
                    <img src="/assets/site/images/logo.svg" />
                </div>
                <div id="contacts-texts" class="col-md-6">
                    {!! $contacts->description !!}
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-3">
                        <div class="row contacts-top-data contacts-top-data-links">
                            <div class="col-md-12"><a href="{{$settings->whatsapp_link}}" target="_blank"><i class="fab fa-whatsapp" style="color: #1EBEA5;"></i></a></div>
                        </div>
                        <div id="contacts-pin" class="row contacts-bottom-data">
                            <div class="col-md-12"><a href="#section-map"><i class="fas fa-map-marker-alt" style="color: #DC493C;"></i></a></div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-xs-5">
                        <div id="contacts-bottom-data-phone" class="row contacts-top-data">
                            <span><a href="tel:{{$settings->phone}}">{{$settings->phone}}</a></span>
                        </div>
                        <div id="contacts-bottom-data-address" class="row contacts-bottom-data">
                            <span>{{$settings->address}}</span>
                        </div>
                    </div>
                    <div class="col-lg-offset-1 col-lg-2 col-xs-offset-1 col-xs-3">
                        <div class="row contacts-top-data contacts-top-data-links">
                            <div class="col-md-12"><a href="{{$settings->facebook_link}}" target="_blank"><i class="fab fa-facebook-f" style="color: #4267B2;"></i></a></div>
                        </div>
                        <div class="row contacts-bottom-data">
                            <div class="col-md-12 linear-text-color"><a href="{{"https://www.instagram.com/$settings->instagram_page_name/"}}" target="_blank"><i class="fab fa-instagram"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="section-map">
        <div id="map"></div>
    </div>

    <div id="section-footer">
        <div id="block-footer">
            <div id="block-booldog">
                <img src="/assets/site/images/Vector.png" />
            </div>
            <div id="block-copyright" class="float-left">{{Lang::get("site.footer.copyright")}}</div>
            <div id="block-made-by" class="float-right">{{Lang::get("site.footer.made_by")}}</div>
        </div>
    </div>

</div>

<script>
    // This example uses SVG path notation to add a vector-based symbol
    // as the icon for a marker. The resulting icon is a star-shaped symbol
    // with a pale yellow fill and a thick yellow border.

    function initMap() {

        var image = {
            url: "/assets/site/images/Subtract.png",
            origin: new google.maps.Point(0, -15)
        }

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: {{$settings->map_zoom}},
            center: {lat: {{$settings->map_latitude}}, lng: {{$settings->map_longitude}}},
            styles: [
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#e9e9e9"
                        },
                        {
                            "lightness": 17
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#f5f5f5"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 17
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 29
                        },
                        {
                            "weight": 0.2
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 18
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#f5f5f5"
                        },
                        {
                            "lightness": 21
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#dedede"
                        },
                        {
                            "lightness": 21
                        }
                    ]
                },
                {
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "saturation": 36
                        },
                        {
                            "color": "#333333"
                        },
                        {
                            "lightness": 40
                        }
                    ]
                },
                {
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#f2f2f2"
                        },
                        {
                            "lightness": 19
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#fefefe"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#fefefe"
                        },
                        {
                            "lightness": 17
                        },
                        {
                            "weight": 1.2
                        }
                    ]
                }
            ]
        });

        var marker = new google.maps.Marker({
            position: map.getCenter(),
            map: map,
            icon: image
        });
    }
</script>

<script src="{{asset('assets/site/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/site/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/site/js/masonry.pkgd.min.js')}}"></script>
<script src="{{asset('assets/site/owlcarousel/js/owl.carousel.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenLite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/plugins/CSSPlugin.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6gnyokeyiWFW_sgpLl0M9ijf0ToQ-Dn0&callback=initMap"></script>
<script src="{{asset('assets/site/js/main.js')}}"></script>

<script>
    @forelse($menuCategories as $key => $menuCategory)
        //menu carousel
        var menuCarousel{{$menuCategory->id}} = $('#menu-carousel-category-{{$menuCategory->id}}')

        function changeMenuPagination{{$menuCategory->id}}(e) {
            var countPerItem = 4
            var count = e.item.count
            var index = e.item.index
            var activeCount = $(this).find(".active").length

            var total = {{count($menuCategory->dishes)}};
            var from = index*countPerItem + 1
            var to = (from + activeCount*countPerItem - 1) > total ? total : from + activeCount*countPerItem - 1

            from = from > 0 && from < 10 ? '0'+from : from;
            to = to > 0 && to < 10 ? '0'+to : to;
            total = total > 0 && total < 10 ? '0'+total : total;
            $("#menu-pagination-from-category-{{$menuCategory->id}}").text(from + " ")
            $("#menu-pagination-to-category-{{$menuCategory->id}}").text(" " + to)
            $("#menu-pagination-total-category-{{$menuCategory->id}}").text(total)

            if(e.item.index === e.item.count - activeCount) $("#menu-next-category-{{$menuCategory->id}}").addClass("menu-button-disabled-next")
            else $("#menu-next-category-{{$menuCategory->id}}").removeClass("menu-button-disabled-next")

            console.log(e.item.index === 0)
            if(e.item.index === 0) $("#menu-prev-category-{{$menuCategory->id}}").addClass("menu-button-disabled-prev")
            else $("#menu-prev-category-{{$menuCategory->id}}").removeClass("menu-button-disabled-prev")
        }

        menuCarousel{{$menuCategory->id}}.on('translated.owl.carousel', changeMenuPagination{{$menuCategory->id}})

        menuCarousel{{$menuCategory->id}}.on('initialized.owl.carousel', changeMenuPagination{{$menuCategory->id}});

        menuCarousel{{$menuCategory->id}}.owlCarousel({
            loop: false,
            //center: true,
            stagePadding: 150,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    margin: 25,
                    stagePadding: 50,
                    nav:false
                },
                600:{
                    items:1,
                    margin: 50,
                    stagePadding: 100,
                    nav:false
                },
                1000:{
                    items:2,
                    margin: 100,
                    stagePadding: 150,
                    loop: false
                }
            }
        })

        $("#menu-next-category-{{$menuCategory->id}}").click(function(){
            menuCarousel{{$menuCategory->id}}.trigger('next.owl.carousel');
        })

        $("#menu-prev-category-{{$menuCategory->id}}").click(function(){
            menuCarousel{{$menuCategory->id}}.trigger('prev.owl.carousel');
        })


    @empty
    @endforelse

    $("#category-{{$menuCategories[0]->id}}-tab").tab('show')

</script>