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

<div class="grey-infoblock">
    <div class="container">
        <div class="title">{{$rules->title}}</div>

        <div class="desc">
            {!! $rules->text !!}
        </div>
    </div>
</div>