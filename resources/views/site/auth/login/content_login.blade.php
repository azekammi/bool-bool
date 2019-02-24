@if(session("message"))
    <div class="popup-{{Session::get("message")["status"]}}">
        <div class="popup__wrapper">
            <span class="popup__title">{{Session::get("message")["text"]}}</span>
        </div>
    </div>
@endif

@if(count($errors)>0)
    <div class="popup-red">
        <div class="popup__wrapper">
            @foreach($errors->all() as $error)
                <span class="popup__title">{{$error}}</span>
            @endforeach
        </div>
    </div>
@endif

<div class="main__title">{{Lang::get("site.login")}}</div>

<div class="create-ad profile-form">
    <div class="create-ad__body profile-form__body">
        <form method="post" action="{{route("login")}}">
            <ul>
                <li class="item">
                    <span class="item__title">{{Lang::get("site.username")}}</span>
                    <input name="username" value="{{old("username")}}" type="text" placeholder="username">
                </li>

                <li class="item">
                    <span class="item__title">{{Lang::get("site.password")}}</span>
                    <input name="password" type="password" placeholder="password">
                </li>
                <li>
                    <div class="g-recaptcha" data-sitekey="{{Config::get("my_config.reCaptcha.key")}}"></div>
                </li>

                <li class="item">
                    <input class="submit-button" type="submit" value="{{Lang::get("site.log_in")}}">

                    <a class="forget-pass" href="{{route("forgotPassword")}}">{{Lang::get("site.forgot_password")}}</a>
                </li>
            </ul>
            {{csrf_field()}}
        </form>
    </div>

    <div class="create-ad__title profile-form__title">
        <a class="reg-link" href="{{route("signup")}}">{{Lang::get("site.log_up")}},</a><br />
        {{ Lang::get("site.if_you_are_new") }}
    </div>
</div>