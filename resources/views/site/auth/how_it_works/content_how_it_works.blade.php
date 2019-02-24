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

<div class="three-step-block how-it-work__wrapper">
    <div class="container">
        <div class="title">{{Lang::get("site.how_it_works_title")}}</div>

        <div class="text__blocks">
            @foreach($howItWorks as $howItWork)
                <div class="text__block">
                    <div class="block__title">
                        {{$howItWork->title}}
                    </div>

                    <div class="block__content">
                        {!! $howItWork->text !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>