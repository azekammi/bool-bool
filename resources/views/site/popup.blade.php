<div class="form-popup">
    <div class="create-ad profile-form">
        <div class="create-ad__title profile-form__title">
            {{Lang::get("site.report_to_advertiser2")}} {{"@".$order->customer_username}}

            <div class="close-popup"></div>
        </div>

        <div class="create-ad__body profile-form__body">
            <form action="{{route("reports")}}" method="post" name="create-form">
                <ul>
                    <li class="item">
                        <span class="item__img">
                            <img src="{{asset("assets/site/img/".($order->profile_pic ? $order->profile_pic : Config::get("my_config.default_profile_pic")))}}" alt="profile_pic">
                        </span>
                    </li>

                    <li class="item">
                        <span class="item__title">{{Lang::get("site.report_text")}}</span>
                        <textarea name="description" required minlength="10" maxlength="200" placeholder="{{Lang::get("site.i_dont_like_this_advertiser")}}"></textarea>
                    </li>

                    <li id="recaptchaId">
                        <div class="g-recaptcha" data-sitekey="{{Config::get("my_config.reCaptcha.key")}}"></div>
                    </li>

                    <li class="item">
                        <input type="hidden" name="post_id" value="{{$order->id}}">
                        {{csrf_field()}}
                        <input class="submit-button" type="submit" value="{{Lang::get("site.to_report")}}">
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>

<div class="black-layer"></div>