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

<div class="main__title">{{Lang::get("site.signup")}}</div>

<div class="create-ad profile-form">
    <div class="create-ad__body profile-form__body">
        <form method="post" action="{{route("signup")}}">
            <ul>
                <li class="item">
                    <span class="item__title">{{Lang::get("site.username")}}</span>
                    <input name="username" type="text" value="{{old("username")}}" placeholder="username">
                </li>

                <li class="item">
                    <span class="item__title">{{Lang::get("site.email")}}</span>
                    <input name="email" type="text" value="{{old("email")}}" placeholder="{{Lang::get("site.email")}}">
                </li>

                <li class="item">
                    <span class="item__title">{{Lang::get("site.phone")}}</span>
                    <input name="phone" type="text" value="{{old("phone")}}" placeholder="994555555555">
                </li>

                <li class="item">
                    <span class="item__title">{{Lang::get("site.secret_question")}}</span>
                    <input name="secret_question" type="text" value="{{old("secret_question")}}" placeholder="">
                </li>

                <li class="item">
                    <span class="item__title">{{Lang::get("site.secret_answer")}}</span>
                    <input name="secret_answer" type="text" value="{{old("secret_answer")}}" placeholder="">
                </li>

                <li class="item">
                    <span class="item__title">{{Lang::get("site.password")}}</span>
                    <input name="password" type="password" placeholder="********">
                </li>

                <li class="item">
                    <span class="item__title">{{Lang::get("site.password_again")}}</span>
                    <input name="password_confirm" type="password" placeholder="********">
                </li>
                <li class="item">
                    <span class="item__title">{{Lang::get("site.read")}} <a class="item__rules" href="{{route("rules")}}">{{Lang::get("site.conditions")}}</a> {{Lang::get("site.to_use_and_im_accept")}}</span>
                    <input name="privacy_policy" type="checkbox">
                </li>
                <li>
                    <div class="g-recaptcha" data-sitekey="{{Config::get("my_config.reCaptcha.key")}}"></div>
                </li>
                <li class="item">
                    <input class="submit-button" type="submit" value="{{Lang::get("site.to_signup")}}">
                </li>
            </ul>
            {{csrf_field()}}
        </form>
    </div>

    <div class="create-ad__title profile-form__title">
        {{Lang::get("site.alredy_signedup")}}<br>
        <a class="reg-link" href="{{route("login")}}">{{Lang::get("site.you_log_in")}}</a> {{Lang::get("site.using_account")}}
    </div>
</div>