<ul>
    <li><a href="{{route("home")}}">SocialHub.az</a></li>

    @foreach($breadcrumbs as $key=>$value)
        <li><a href="{{$key}}">{{$value}}</a></li>
    @endforeach
</ul>