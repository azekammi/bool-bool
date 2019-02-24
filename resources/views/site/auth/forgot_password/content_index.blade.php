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

<div class="main__title">{{Lang::get("site.forgot_password")}}</div>

<div class="create-ad profile-form">
    <div class="create-ad__body profile-form__body">
        <ul id="accountContent">

        </ul>
        <form method="post" action="">

        </form>

    </div>
</div>

<script>

    function step1(){
        content = "" +
            "            <!--Step 1-->" +
            "            <li class=\"item\">" +
            "                <span class=\"item__title\">{{Lang::get("site.username")}}</span>" +
            "                <input name=\"username\" type=\"text\">" +
            "            </li>" +
            "" +
            "            <li class=\"item\">" +
            "                <input class=\"submit-button\" id='checkout1' type=\"submit\" value=\"{{Lang::get("site.to_check")}}\">" +
            "            </li>";


        $("#accountContent").empty();
        $("#accountContent").html(content);
    }

    function step2(secretQuestion){
        content = "" +
            "            <ul>" +
            "               <li class=\"item removable\">\n" +
            "                    <span class=\"item__title\">{{Lang::get("site.secret_question").": "}}"+secretQuestion+"</span>\n" +
            "                    <input name=\"secret_answer\" value=\"{{old("secret_answer")}}\" type=\"text\">\n" +
            "                </li>\n" +
            "\n" +
            "                <li class=\"removable\">\n" +
            "                    <div class=\"g-recaptcha\" data-sitekey=\"{{Config::get("my_config.reCaptcha.key")}}\"></div>\n" +
            "                </li>\n" +
            "\n" +
            "                <li class=\"item removable\">\n" +
            "                    <input name='username' type=\"hidden\" value='"+username+"'>\n" +
            "                    <input name='_token' type=\"hidden\" value='{{csrf_token()}}'>\n" +
            "                    <input id='checkout2' class=\"submit-button\" type=\"submit\" value=\"{{Lang::get("site.to_send")}}\">\n" +
            "                </li>\n" +
            "            </ul>"

        $(".removable").remove();
        //$("#accountContent").empty();
        $("#accountContent").next().empty();
        $("#accountContent").next().html(content);
        //$("#accountContent").html($("#accountContent").html()+content);
    }

    function createMessage(message){
        content = "" +
            "           <li class=\"item\">" +
            "                <span class=\"item__title\">{{Lang::get("site.message")}}</span>" +
            "                <span class=\"item__desc\">"+message+"</span>" +
            "            </li>" +
            "";

        $("#accountContent").empty();
        $("#accountContent").html(content);
    }

    $(window).load(function(){
        step1();
    })

    var username;

    $("body").delegate("#checkout1", "click", function(){
        username = $("input[name='username']").val();

        if(username.length > 0 && username.length <= 10){
            $.ajax({
                url: "{{route("getUserSecretQuestion")}}",
                type: "post",
                dataType: "json",
                data: {
                    username: username
                },
                success: function(response){
                    switch(response["status"]){
                        case 0:
                            createMessage(response["message"]);
                            break;
                        case 1:
                            step2(response["secret_question"]);
                            break;
                    }
                }
            })
        }
    })

    $("body").delegate("#checkout2", "click", function(){

        $("form").submit();

        /*
        var blogUrl = "{{route("home")}}"+"/login/";

        if(username.length > 0 && username.length <= 10){
            $.ajax({
                url: "",
                type: "post",
                dataType: "json",
                data: {
                    username: username
                },
                success: function(response){
                    switch(response["status"]){
                        case 0:
                            createMessage(response["message"]);
                            break;
                        case 1:
                            location.href = blogUrl
                            break;
                    }
                }
            })
        }

        */
    })
</script>