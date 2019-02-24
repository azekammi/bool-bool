<div class="header__desktop">
    <div class="header__top">
        <div class="container">
            @if(!Session::has("user"))
                <div class="not-authorized">
                    <div class="auth">

                        <a class="enter-link" href="{{route("login")}}">{{Lang::get("site.login")}}</a>
                        /
                        <a href="{{route("signup")}}">{{Lang::get("site.signup")}}</a>

                        <div class="lang-bar">
                            <a class="lang__ru" href="{{$currentPath."?lang=ru"}}"></a>
                            <a class="lang__az" href="{{$currentPath."?lang=az"}}"></a>
                        </div>

                    </div>
                </div>
            @else
                <div class="authorized">
                    <div class="auth">
                        <a class="enter-link" href="{{route("balanceAdd")}}">{{number_format($profileData->balance/100, 2, ',', '')}} AZN</a>
                        /
                        <a href="javascript:void(0)">{{number_format($profileData->balance_reserved/100, 2, ',', '')}} AZN</a>
                    </div>

                    <div class="header__profile--desktop">

                        <div class="profile__notification">

                            <div class="notification__ico"></div>

                            <div class="notification__count">{{$notificationsData["count"]}}</div>

                        </div>

                        <a href="{{route("profile")}}" class="profile__user">
                            <img src="{{asset('assets/site/img/'.($profileData->profile_pic ? $profileData->profile_pic : Config::get("my_config.default_profile_pic")))}}" alt="profile pic">

                            <span class="profile__name">
                                {{($profileData->first_name.$profileData->last_name ? $profileData->first_name." ".$profileData->last_name : $profileData->username)}}
                            </span>
                        </a>

                        <div class="notification__items">
                            <ul>
                                @if(isset($notificationsData[0]))
                                    <li class="notification-antiquity">
                                        Новое
                                    </li>
                                    @foreach($notificationsData[0] as $notificationData)
                                        <li class="item">
                                            {!! Lang::get("site.notifications_texts.".$notificationData->type, $notificationData->parameters) !!}
                                        </li>
                                    @endforeach
                                @endif

                                @if(isset($notificationsData[1]))
                                    <li class="notification-antiquity">
                                        Старое
                                    </li>
                                    @foreach($notificationsData[1] as $notificationData)
                                        <li class="item">
                                            {!! Lang::get("site.notifications_texts.".$notificationData->type, $notificationData->parameters) !!}
                                        </li>
                                    @endforeach
                                @endif
                            </ul>

                            <a href="{{route("notificationsList")}}" class="notification__link">{{Lang::get("site.all")}}</a>
                        </div>
                    </div>

                    <div class="lang-bar">
                        <a class="lang__ru" href="{{$currentPath."?lang=ru"}}"></a>
                        <a class="lang__az" href="{{$currentPath."?lang=az"}}"></a>
                    </div>


                </div>
            @endif
        </div>
    </div>

    <div class="header__bottom">
        <div class="container">
            <a href="{{route("home")}}" class="logo"></a>
            <div class="header__menu">
                <ul>
                    <li><a href="{{route("home")}}">{{Lang::get("site.home.name")}}</a></li>
                    <li><a href="{{route("catalog")}}">{{Lang::get("site.advertising_platforms")}}</a></li>
                    <li><a href="{{route("contact")}}">{{Lang::get("site.contacts")}}</a></li>
                    <li><a href="{{route("howItWorks")}}">{{Lang::get("site.how_it_works_title")}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="header__mobile">
    <div class="floating__menu">
        <div class="burger-ico"></div>

        <a href="{{route("home")}}" rel="Home" class="logo"></a>
        @if(!Session::has("user"))
            <div class="not-authorized">
                <a href="{{route("login")}}">
                    <div class="auth-ico"></div>
                </a>
            </div>
        @else
            <div class="authorized">
                <div class="profile__notification">
                    <div class="notification__ico"></div>

                    <div class="notification__count">{{$notificationsData["count"]}}</div>
                </div>

                <div class="notification__items">
                    <ul>
                        @if(isset($notificationsData[0]))
                            <li class="notification-antiquity">
                                Новое
                            </li>
                            @foreach($notificationsData[0] as $notificationData)
                                <li class="item">
                                    {!! Lang::get("site.notifications_texts.".$notificationData->type, $notificationData->parameters) !!}
                                </li>
                            @endforeach
                        @endif

                        @if(isset($notificationsData[1]))
                            <li class="notification-antiquity">
                                Старое
                            </li>
                            @foreach($notificationsData[1] as $notificationData)
                                <li class="item">
                                    {!! Lang::get("site.notifications_texts.".$notificationData->type, $notificationData->parameters) !!}
                                </li>
                            @endforeach
                        @endif
                    </ul>

                    <a href="{{route("notificationsList")}}" class="notification__link">{{Lang::get("site.all")}}</a>
                </div>
            </div>
        @endif
        <div class="lang-bar">
            <a class="lang__ru" href="{{$currentPath."?lang=ru"}}"></a>
            <a class="lang__az" href="{{$currentPath."?lang=az"}}"></a>
        </div>
    </div>

    <div class="header__menu--mobile">
        <div class="wrapper">
            <div class="close-ico"></div>
            <a href="{{route("home")}}" class="logo"></a>
        </div>

        <div class="menu__wrapper">
            <ul>
                <li><a href="{{route("home")}}">{{Lang::get("site.home.name")}}</a></li>
                <li><a href="{{route("catalog")}}">{{Lang::get("site.advertising_platforms")}}</a></li>
                <li><a href="{{route("contact")}}">{{Lang::get("site.contacts")}}</a></li>
                <li><a href="{{route("howItWorks")}}">{{Lang::get("site.how_it_works_title")}}</a></li>

                @if(Session::has("user"))
                    <li><a href="{{route("profile")}}">{{Lang::get("site.profile2")}}</a></li>
                    <li><a href="{{route("logout")}}"><b>{{Lang::get("site.quit")}}</b></a></li>
                @endif
            </ul>
        </div>
    </div>
</div>