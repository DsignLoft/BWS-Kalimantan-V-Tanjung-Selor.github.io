@extends('layouts.main')
@section('main')
    <style>
        #chat-circle {
            z-index: 1000;
            position: fixed;
            bottom: 50px;
            right: 50px;
            background: #3BB77E;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            color: white;
            padding: 28px;
            cursor: pointer;
            box-shadow: 0px 3px 16px 0px rgba(0, 0, 0, 0.6), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
        }
        .btn#my-btn {
            background: white;
            padding-top: 13px;
            padding-bottom: 12px;
            border-radius: 45px;
            padding-right: 40px;
            padding-left: 40px;
            color: #3BB77E;
        }
        #chat-overlay {
            background: rgba(255,255,255,0.1);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            display: none;
        }


        .chat-box {
            display:none;
            background: #efefef;
            position:fixed;
            right:30px;
            bottom:50px;
            width:350px;
            max-width: 85vw;
            max-height:100vh;
            border-radius:5px;
            /*   box-shadow: 0px 5px 35px 9px #464a92; */
            box-shadow: 0px 5px 35px 9px #ccc;
            z-index: 10000;
        }
        .chat-box-toggle {
            float:right;
            margin-right:15px;
            cursor:pointer;
        }
        .chat-box-header {
            background: #3BB77E;
            height:70px;
            border-top-left-radius:5px;
            border-top-right-radius:5px;
            color:white;
            text-align:center;
            font-size:20px;
            padding-top:17px;
        }
        .chat-box-body {
            position: relative;
            height:370px;
            height:auto;
            border:1px solid #ccc;
            overflow: hidden;
        }
        .chat-box-body:after {
            content: "";
            background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMTAgOCkiIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+PGNpcmNsZSBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIgY3g9IjE3NiIgY3k9IjEyIiByPSI0Ii8+PHBhdGggZD0iTTIwLjUuNWwyMyAxMW0tMjkgODRsLTMuNzkgMTAuMzc3TTI3LjAzNyAxMzEuNGw1Ljg5OCAyLjIwMy0zLjQ2IDUuOTQ3IDYuMDcyIDIuMzkyLTMuOTMzIDUuNzU4bTEyOC43MzMgMzUuMzdsLjY5My05LjMxNiAxMC4yOTIuMDUyLjQxNi05LjIyMiA5LjI3NC4zMzJNLjUgNDguNXM2LjEzMSA2LjQxMyA2Ljg0NyAxNC44MDVjLjcxNSA4LjM5My0yLjUyIDE0LjgwNi0yLjUyIDE0LjgwNk0xMjQuNTU1IDkwcy03LjQ0NCAwLTEzLjY3IDYuMTkyYy02LjIyNyA2LjE5Mi00LjgzOCAxMi4wMTItNC44MzggMTIuMDEybTIuMjQgNjguNjI2cy00LjAyNi05LjAyNS0xOC4xNDUtOS4wMjUtMTguMTQ1IDUuNy0xOC4xNDUgNS43IiBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIi8+PHBhdGggZD0iTTg1LjcxNiAzNi4xNDZsNS4yNDMtOS41MjFoMTEuMDkzbDUuNDE2IDkuNTIxLTUuNDEgOS4xODVIOTAuOTUzbC01LjIzNy05LjE4NXptNjMuOTA5IDE1LjQ3OWgxMC43NXYxMC43NWgtMTAuNzV6IiBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIvPjxjaXJjbGUgZmlsbD0iIzAwMCIgY3g9IjcxLjUiIGN5PSI3LjUiIHI9IjEuNSIvPjxjaXJjbGUgZmlsbD0iIzAwMCIgY3g9IjE3MC41IiBjeT0iOTUuNSIgcj0iMS41Ii8+PGNpcmNsZSBmaWxsPSIjMDAwIiBjeD0iODEuNSIgY3k9IjEzNC41IiByPSIxLjUiLz48Y2lyY2xlIGZpbGw9IiMwMDAiIGN4PSIxMy41IiBjeT0iMjMuNSIgcj0iMS41Ii8+PHBhdGggZmlsbD0iIzAwMCIgZD0iTTkzIDcxaDN2M2gtM3ptMzMgODRoM3YzaC0zem0tODUgMThoM3YzaC0zeiIvPjxwYXRoIGQ9Ik0zOS4zODQgNTEuMTIybDUuNzU4LTQuNDU0IDYuNDUzIDQuMjA1LTIuMjk0IDcuMzYzaC03Ljc5bC0yLjEyNy03LjExNHpNMTMwLjE5NSA0LjAzbDEzLjgzIDUuMDYyLTEwLjA5IDcuMDQ4LTMuNzQtMTIuMTF6bS04MyA5NWwxNC44MyA1LjQyOS0xMC44MiA3LjU1Ny00LjAxLTEyLjk4N3pNNS4yMTMgMTYxLjQ5NWwxMS4zMjggMjAuODk3TDIuMjY1IDE4MGwyLjk0OC0xOC41MDV6IiBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIvPjxwYXRoIGQ9Ik0xNDkuMDUgMTI3LjQ2OHMtLjUxIDIuMTgzLjk5NSAzLjM2NmMxLjU2IDEuMjI2IDguNjQyLTEuODk1IDMuOTY3LTcuNzg1LTIuMzY3LTIuNDc3LTYuNS0zLjIyNi05LjMzIDAtNS4yMDggNS45MzYgMCAxNy41MSAxMS42MSAxMy43MyAxMi40NTgtNi4yNTcgNS42MzMtMjEuNjU2LTUuMDczLTIyLjY1NC02LjYwMi0uNjA2LTE0LjA0MyAxLjc1Ni0xNi4xNTcgMTAuMjY4LTEuNzE4IDYuOTIgMS41ODQgMTcuMzg3IDEyLjQ1IDIwLjQ3NiAxMC44NjYgMy4wOSAxOS4zMzEtNC4zMSAxOS4zMzEtNC4zMSIgc3Ryb2tlPSIjMDAwIiBzdHJva2Utd2lkdGg9IjEuMjUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIvPjwvZz48L3N2Zz4=');
            opacity: 0.1;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            height:100%;
            position: absolute;
            z-index: 10000;
        }
        #chat-input {
            background: #f4f7f9;
            width:100%;
            position:relative;
            height:47px;
            padding-top:10px;
            padding-right:50px;
            padding-bottom:10px;
            padding-left:15px;
            border:none;
            resize:none;
            outline:none;
            border:1px solid #ccc;
            color:#888;
            border-top:none;
            border-bottom-right-radius:5px;
            border-bottom-left-radius:5px;
            overflow:hidden;
        }
        .chat-input > form {
            margin-bottom: 0;
        }
        #chat-input::-webkit-input-placeholder { /* Chrome/Opera/Safari */
            color: #ccc;
        }
        #chat-input::-moz-placeholder { /* Firefox 19+ */
            color: #ccc;
        }
        #chat-input:-ms-input-placeholder { /* IE 10+ */
            color: #ccc;
        }
        #chat-input:-moz-placeholder { /* Firefox 18- */
            color: #ccc;
        }
        .chat-submit {
            position:absolute;
            bottom:3px;
            right:10px;
            background: transparent;
            box-shadow:none;
            border:none;
            border-radius:50%;
            color:#3BB77E;
            width:35px;
            height:35px;
        }
        .chat-logs {
            padding:15px;
            height:370px;
            overflow-y:scroll;
        }
        .chat-logs::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }
        .chat-logs::-webkit-scrollbar
        {
            width: 5px;
            background-color: #F5F5F5;
        }
        .chat-logs::-webkit-scrollbar-thumb
        {
            background-color: #3BB77E;
        }
        @media only screen and (max-width: 500px) {
            .chat-logs {
                height:40vh;
            }
        }
        .chat-msg.user > .msg-avatar img {
            width:45px;
            height:45px;
            border-radius:50%;
            float:left;
            width:15%;
        }
        .chat-msg.self > .msg-avatar img {
            width:45px;
            height:45px;
            border-radius:50%;
            float:right;
            width:15%;
        }
        .cm-msg-text {
            background:white;
            padding:10px 15px 10px 15px;
            color:#666;
            max-width:75%;
            float:left;
            margin-left:10px;
            position:relative;
            margin-bottom:20px;
            border-radius:30px;
        }
        .chat-msg {
            clear:both;
        }
        .chat-msg.self > .cm-msg-text {
            float:right;
            margin-right:10px;
            background: #3BB77E;
            color:white;
        }
        .cm-msg-button>ul>li {
            list-style:none;
            float:left;
            width:50%;
        }
        .cm-msg-button {
            clear: both;
            margin-bottom: 70px;
        }
    </style>
    <div id="body">
        <div id="chat-circle" class="btn btn-raised">
            <div id="chat-overlay"></div>
            <i class="fi-sr-comment"></i>
        </div>

        <div class="chat-box">
            <div class="chat-box-header">
                IDP Partner
                <span class="chat-box-toggle"><i class="material-icons">tutup</i></span>
            </div>
            <div class="chat-box-body">
                <div class="chat-box-overlay">
                </div>
                <div class="chat-logs">

                </div><!--chat-log -->
            </div>
            <div class="chat-input">
                <form>
                    <input type="text" id="chat-input" placeholder="Ketik pesan anda disini..."/>
                    <button type="submit" class="chat-submit" id="chat-submit"><i class="fi-sr-plane"></i></button>
                </form>
            </div>
        </div>




    </div>
    <script type="text/javascript">
        $(function() {
            var INDEX = 0;
            $("#chat-submit").click(function(e) {
                e.preventDefault();
                var msg = $("#chat-input").val();
                if(msg.trim() == ''){
                    return false;
                }
                generate_message(msg, 'self');
                var buttons = [
                    {
                        name: 'Existing User',
                        value: 'existing'
                    },
                    {
                        name: 'New User',
                        value: 'new'
                    }
                ];
                setTimeout(function() {
                    generate_message(msg, 'user');
                }, 1000)

            })

            function generate_message(msg, type) {
                INDEX++;
                var str="";
                str += "<div id='cm-msg-"+INDEX+"' class=\"chat-msg "+type+"\">";
                str += "          <span class=\"msg-avatar\">";
                str += "            <img src=\"https:\/\/indoprinting.co.id\/assets\/images\/logo\/favicon2.png\">";
                str += "          <\/span>";
                str += "          <div class=\"cm-msg-text\">";
                str += msg;
                str += "          <\/div>";
                str += "        <\/div>";
                $(".chat-logs").append(str);
                $("#cm-msg-"+INDEX).hide().fadeIn(300);
                if(type == 'self'){
                    $("#chat-input").val('');
                }
                $(".chat-logs").stop().animate({ scrollTop: $(".chat-logs")[0].scrollHeight}, 1000);
            }

            function generate_button_message(msg, buttons){
                /* Buttons should be object array
                  [
                    {
                      name: 'Existing User',
                      value: 'existing'
                    },
                    {
                      name: 'New User',
                      value: 'new'
                    }
                  ]
                */
                INDEX++;
                var btn_obj = buttons.map(function(button) {
                    return  "              <li class=\"button\"><a href=\"javascript:;\" class=\"btn btn-primary chat-btn\" chat-value=\""+button.value+"\">"+button.name+"<\/a><\/li>";
                }).join('');
                var str="";
                str += "<div id='cm-msg-"+INDEX+"' class=\"chat-msg user\">";
                str += "          <span class=\"msg-avatar\">";
                str += "            <img src=\"https:\/\/indoprinting.co.id\/assets\/images\/logo\/favicon2.png\">";
                str += "          <\/span>";
                str += "          <div class=\"cm-msg-text\">";
                str += msg;
                str += "          <\/div>";
                str += "          <div class=\"cm-msg-button\">";
                str += "            <ul>";
                str += btn_obj;
                str += "            <\/ul>";
                str += "          <\/div>";
                str += "        <\/div>";
                $(".chat-logs").append(str);
                $("#cm-msg-"+INDEX).hide().fadeIn(300);
                $(".chat-logs").stop().animate({ scrollTop: $(".chat-logs")[0].scrollHeight}, 1000);
                $("#chat-input").attr("disabled", true);
            }

            $(document).delegate(".chat-btn", "click", function() {
                var value = $(this).attr("chat-value");
                var name = $(this).html();
                $("#chat-input").attr("disabled", false);
                generate_message(name, 'self');
            })

            $("#chat-circle").click(function() {
                $("#chat-circle").toggle('scale');
                $(".chat-box").toggle('scale');
            })

            $(".chat-box-toggle").click(function() {
                $("#chat-circle").toggle('scale');
                $(".chat-box").toggle('scale');
            })

        })
    </script>
@endsection

{{--<style>--}}
{{--    /* ===== MENU ===== */--}}
{{--    .menu {--}}
{{--        float: left;--}}
{{--        height: 700px;;--}}
{{--        width: 70px;--}}
{{--        background: #3BB77E;--}}
{{--        background: -webkit-linear-gradient(#48d393, #3BB77E);--}}
{{--        background: -o-linear-gradient(#48d393, #3BB77E);--}}
{{--        background: -moz-linear-gradient(#48d393, #3BB77E);--}}
{{--        background: linear-gradient(#48d393, #3BB77E);--}}
{{--        box-shadow: 0 10px 20px rgba(0,0,0,0.19);--}}
{{--    }--}}

{{--    .menu .items {--}}
{{--        list-style:none;--}}
{{--        margin: auto;--}}
{{--        padding: 0;--}}
{{--    }--}}

{{--    .menu .items .item {--}}
{{--        height: 70px;--}}
{{--        border-bottom: 1px solid #48d393;--}}
{{--        display:flex;--}}
{{--        justify-content: center;--}}
{{--        align-items: center;--}}
{{--        color: #9fb5ef;--}}
{{--        font-size: 17pt;--}}
{{--    }--}}

{{--    .menu .items .item-active {--}}
{{--        background-color:#3BB77E;--}}
{{--        color: #FFF;--}}
{{--    }--}}

{{--    .menu .items .item:hover {--}}
{{--        cursor: pointer;--}}
{{--        background-color: #3BB77E;--}}
{{--        color: #cfe5ff;--}}
{{--    }--}}

{{--    /* === CONVERSATIONS === */--}}

{{--    .discussions {--}}
{{--        width: 35%;--}}
{{--        height: 700px;--}}
{{--        box-shadow: 0px 8px 10px rgba(0,0,0,0.20);--}}
{{--        overflow: hidden;--}}
{{--        background-color: #3BB77E;--}}
{{--        display: inline-block;--}}
{{--    }--}}

{{--    .discussions .discussion {--}}
{{--        width: 100%;--}}
{{--        height: 90px;--}}
{{--        background-color: #FAFAFA;--}}
{{--        border-bottom: solid 1px #E0E0E0;--}}
{{--        display:flex;--}}
{{--        align-items: center;--}}
{{--        cursor: pointer;--}}
{{--    }--}}

{{--    .discussions .search {--}}
{{--        display:flex;--}}
{{--        align-items: center;--}}
{{--        justify-content: center;--}}
{{--        color: #E0E0E0;--}}
{{--    }--}}

{{--    .discussions .search .searchbar {--}}
{{--        height: 40px;--}}
{{--        background-color: #FFF;--}}
{{--        width: 70%;--}}
{{--        padding: 0 20px;--}}
{{--        border-radius: 50px;--}}
{{--        border: 1px solid #EEEEEE;--}}
{{--        display:flex;--}}
{{--        align-items: center;--}}
{{--        cursor: pointer;--}}
{{--    }--}}

{{--    .discussions .search .searchbar input {--}}
{{--        margin-left: 15px;--}}
{{--        height:38px;--}}
{{--        width:100%;--}}
{{--        border:none;--}}
{{--        font-family: 'Montserrat', sans-serif;;--}}
{{--    }--}}

{{--    .discussions .search .searchbar *::-webkit-input-placeholder {--}}
{{--        color: #E0E0E0;--}}
{{--    }--}}
{{--    .discussions .search .searchbar input *:-moz-placeholder {--}}
{{--        color: #E0E0E0;--}}
{{--    }--}}
{{--    .discussions .search .searchbar input *::-moz-placeholder {--}}
{{--        color: #E0E0E0;--}}
{{--    }--}}
{{--    .discussions .search .searchbar input *:-ms-input-placeholder {--}}
{{--        color: #E0E0E0;--}}
{{--    }--}}

{{--    .discussions .message-active {--}}
{{--        width: 98.5%;--}}
{{--        height: 90px;--}}
{{--        background-color: #FFF;--}}
{{--        border-bottom: solid 1px #E0E0E0;--}}
{{--    }--}}

{{--    .discussions .discussion .photo {--}}
{{--        margin-left:20px;--}}
{{--        display: block;--}}
{{--        width: 45px;--}}
{{--        height: 45px;--}}
{{--        background: #E6E7ED;--}}
{{--        -moz-border-radius: 50px;--}}
{{--        -webkit-border-radius: 50px;--}}
{{--        background-position: center;--}}
{{--        background-size: cover;--}}
{{--        background-repeat: no-repeat;--}}
{{--    }--}}

{{--    .online {--}}
{{--        position: relative;--}}
{{--        top: 30px;--}}
{{--        left: 35px;--}}
{{--        width: 13px;--}}
{{--        height: 13px;--}}
{{--        background-color: #8BC34A;--}}
{{--        border-radius: 13px;--}}
{{--        border: 3px solid #FAFAFA;--}}
{{--    }--}}

{{--    .desc-contact {--}}
{{--        height: 43px;--}}
{{--        width:50%;--}}
{{--        white-space: nowrap;--}}
{{--        overflow: hidden;--}}
{{--        text-overflow: ellipsis;--}}
{{--    }--}}

{{--    .discussions .discussion .name {--}}
{{--        margin: 0 0 0 20px;--}}
{{--        font-family:'Montserrat', sans-serif;--}}
{{--        font-size: 11pt;--}}
{{--        color:#515151;--}}
{{--    }--}}

{{--    .discussions .discussion .message {--}}
{{--        margin: 6px 0 0 20px;--}}
{{--        font-family:'Montserrat', sans-serif;--}}
{{--        font-size: 9pt;--}}
{{--        color:#515151;--}}
{{--    }--}}

{{--    .timer {--}}
{{--        margin-left: 15%;--}}
{{--        font-family:'Open Sans', sans-serif;--}}
{{--        font-size: 11px;--}}
{{--        padding: 3px 8px;--}}
{{--        color: #BBB;--}}
{{--        background-color: #FFF;--}}
{{--        border: 1px solid #E5E5E5;--}}
{{--        border-radius: 15px;--}}
{{--    }--}}

{{--    .chat {--}}
{{--        width: calc(65% - 85px);--}}
{{--    }--}}

{{--    .header-chat {--}}
{{--        background-color: #FFF;--}}
{{--        height: 90px;--}}
{{--        box-shadow: 0px 3px 2px rgba(0,0,0,0.100);--}}
{{--        display:flex;--}}
{{--        align-items: center;--}}
{{--    }--}}

{{--    .chat .header-chat .icon {--}}
{{--        margin-left: 30px;--}}
{{--        color:#515151;--}}
{{--        font-size: 14pt;--}}
{{--    }--}}

{{--    .chat .header-chat .name {--}}
{{--        margin: 0 0 0 20px;--}}
{{--        text-transform: uppercase;--}}
{{--        font-family:'Montserrat', sans-serif;--}}
{{--        font-size: 13pt;--}}
{{--        color:#515151;--}}
{{--    }--}}

{{--    .chat .header-chat .right {--}}
{{--        position: absolute;--}}
{{--        right: 40px;--}}
{{--    }--}}

{{--    .chat .messages-chat {--}}
{{--        padding: 25px 35px;--}}
{{--    }--}}

{{--    .chat .messages-chat .message {--}}
{{--        display:flex;--}}
{{--        align-items: center;--}}
{{--        margin-bottom: 8px;--}}
{{--    }--}}

{{--    .chat .messages-chat .message .photo {--}}
{{--        display: block;--}}
{{--        width: 45px;--}}
{{--        height: 45px;--}}
{{--        background: #E6E7ED;--}}
{{--        -moz-border-radius: 50px;--}}
{{--        -webkit-border-radius: 50px;--}}
{{--        background-position: center;--}}
{{--        background-size: cover;--}}
{{--        background-repeat: no-repeat;--}}
{{--    }--}}

{{--    .chat .messages-chat .text {--}}
{{--        margin: 0 35px;--}}
{{--        background-color: #f6f6f6;--}}
{{--        padding: 15px;--}}
{{--        border-radius: 12px;--}}
{{--    }--}}

{{--    .text-only {--}}
{{--        margin-left: 45px;--}}
{{--    }--}}

{{--    .time {--}}
{{--        font-size: 10px;--}}
{{--        color:lightgrey;--}}
{{--        margin-bottom:10px;--}}
{{--        margin-left: 85px;--}}
{{--    }--}}

{{--    .response-time {--}}
{{--        float: right;--}}
{{--        margin-right: 40px !important;--}}
{{--    }--}}

{{--    .response {--}}
{{--        float: right;--}}
{{--        margin-right: 0px !important;--}}
{{--        margin-left:auto; /* flexbox alignment rule */--}}
{{--    }--}}

{{--    .response .text {--}}
{{--        background-color: #e3effd !important;--}}
{{--    }--}}

{{--    .footer-chat {--}}
{{--        width: calc(65% - 66px);--}}
{{--        height: 80px;--}}
{{--        display:flex;--}}
{{--        align-items: center;--}}
{{--        position:absolute;--}}
{{--        bottom: 0;--}}
{{--        background-color: transparent;--}}
{{--        border-top: 2px solid #EEE;--}}

{{--    }--}}

{{--    .chat .footer-chat .icon {--}}
{{--        margin-left: 30px;--}}
{{--        color:#C0C0C0;--}}
{{--        font-size: 14pt;--}}
{{--    }--}}

{{--    .chat .footer-chat .send {--}}
{{--        color:#fff;--}}
{{--        background-color: #3BB77E;--}}
{{--        position: absolute;--}}
{{--        right: 50px;--}}
{{--        padding: 12px 12px 12px 12px;--}}
{{--        border-radius: 50px;--}}
{{--        font-size: 14pt;--}}
{{--    }--}}

{{--    .chat .footer-chat .name {--}}
{{--        margin: 0 0 0 20px;--}}
{{--        text-transform: uppercase;--}}
{{--        font-family:'Montserrat', sans-serif;--}}
{{--        font-size: 13pt;--}}
{{--        color:#515151;--}}
{{--    }--}}

{{--    .chat .footer-chat .right {--}}
{{--        position: absolute;--}}
{{--        right: 40px;--}}
{{--    }--}}

{{--    .write-message {--}}
{{--        border:none !important;--}}
{{--        width:60%;--}}
{{--        height: 50px;--}}
{{--        margin-left: 20px;--}}
{{--        padding: 10px;--}}
{{--    }--}}

{{--    .footer-chat *::-webkit-input-placeholder {--}}
{{--        color: #C0C0C0;--}}
{{--        font-size: 13pt;--}}
{{--    }--}}
{{--    .footer-chat input *:-moz-placeholder {--}}
{{--        color: #C0C0C0;--}}
{{--        font-size: 13pt;--}}
{{--    }--}}
{{--    .footer-chat input *::-moz-placeholder {--}}
{{--        color: #C0C0C0;--}}
{{--        font-size: 13pt;--}}
{{--        margin-left:5px;--}}
{{--    }--}}
{{--    .footer-chat input *:-ms-input-placeholder {--}}
{{--        color: #C0C0C0;--}}
{{--        font-size: 13pt;--}}
{{--    }--}}

{{--    .clickable {--}}
{{--        cursor: pointer;--}}
{{--    }--}}
{{--</style>--}}
{{--<div class="container FixedHeightContainer mt-20 mb-20">--}}
{{--    <div class="row">--}}

{{--        <section class="discussions">--}}
{{--            <div class="discussion search">--}}
{{--                <div class="searchbar">--}}
{{--                    <i class="fi-sr-search" aria-hidden="true"></i>--}}
{{--                    <input type="text" placeholder="Cari..."></input>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="discussion">--}}
{{--                <div class="photo" style="background-image: url('https://indoprinting.co.id/assets/images/logo/favicon2.png');">--}}
{{--                    <div class="online"></div>--}}
{{--                </div>--}}
{{--                <div class="desc-contact">--}}
{{--                    <p class="name">Admin Online</p>--}}
{{--                    <p class="message">Kami Online</p>--}}
{{--                </div>--}}
{{--                <div class="timer">12 sec</div>--}}
{{--            </div>--}}
{{--            <div class="discussion message-active">--}}
{{--                <div class="photo" style="background-image: url('https://indoprinting.co.id/assets/images/logo/favicon2.png');">--}}
{{--                    <div class="online"></div>--}}
{{--                </div>--}}
{{--                <div class="desc-contact">--}}
{{--                    <p class="name">IDP Partner</p>--}}
{{--                    <p class="message">Kami Online</p>--}}
{{--                </div>--}}
{{--                <div class="timer">12 sec</div>--}}
{{--            </div>--}}
{{--            <div class="discussion">--}}
{{--                <div class="photo" style="background-image: url('https://indoprinting.co.id/assets/images/logo/favicon2.png');">--}}
{{--                    <div class="online"></div>--}}
{{--                </div>--}}
{{--                <div class="desc-contact">--}}
{{--                    <p class="name">Marketing</p>--}}
{{--                    <p class="message">Kami Online</p>--}}
{{--                </div>--}}
{{--                <div class="timer">12 sec</div>--}}
{{--            </div>--}}
{{--            <div class="discussion">--}}
{{--                <div class="photo" style="background-image: url('https://indoprinting.co.id/assets/images/logo/favicon2.png');">--}}
{{--                    <div class="online"></div>--}}
{{--                </div>--}}
{{--                <div class="desc-contact">--}}
{{--                    <p class="name">Technical Support</p>--}}
{{--                    <p class="message">Kami Online</p>--}}
{{--                </div>--}}
{{--                <div class="timer">12 sec</div>--}}
{{--            </div>--}}
{{--            <div class="discussion">--}}
{{--                <div class="photo" style="background-image: url('https://indoprinting.co.id/assets/images/logo/favicon2.png');">--}}
{{--                    <div class="online"></div>--}}
{{--                </div>--}}
{{--                <div class="desc-contact">--}}
{{--                    <p class="name">Design Inspiration</p>--}}
{{--                    <p class="message">Kami Online</p>--}}
{{--                </div>--}}
{{--                <div class="timer">12 sec</div>--}}
{{--            </div>--}}
{{--            <div class="discussion">--}}
{{--                <div class="photo" style="background-image: url('https://indoprinting.co.id/assets/images/logo/favicon2.png');">--}}
{{--                    <div class="online"></div>--}}
{{--                </div>--}}
{{--                <div class="desc-contact">--}}
{{--                    <p class="name">IDP Support</p>--}}
{{--                    <p class="message">Kami Online</p>--}}
{{--                </div>--}}
{{--                <div class="timer">12 sec</div>--}}
{{--            </div>--}}
{{--            <div class="discussion">--}}
{{--                <div class="photo" style="background-image: url('https://indoprinting.co.id/assets/images/logo/favicon2.png');">--}}
{{--                    <div class="online"></div>--}}
{{--                </div>--}}
{{--                <div class="desc-contact">--}}
{{--                    <p class="name">Kritik & Saran</p>--}}
{{--                    <p class="message">Kami Online</p>--}}
{{--                </div>--}}
{{--                <div class="timer">12 sec</div>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--        <section class="chat Content">--}}
{{--            <div class="header-chat">--}}
{{--                <i class="icon fa fa-user-o" aria-hidden="true"></i>--}}
{{--                <p class="name">IDP Partner</p>--}}
{{--                <i class="icon clickable fa fa-ellipsis-h right" aria-hidden="true"></i>--}}
{{--            </div>--}}
{{--            <div class="messages-chat">--}}
{{--                @foreach($from as $message_send)--}}
{{--                    <div class="message text-only">--}}
{{--                        <div class="response">--}}
{{--                            <p class="text"> {{ $message_send->message_chat }}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    --}}{{--                        <p class="response-time time"> 15h04</p>--}}
{{--                @endforeach--}}

{{--                @foreach($to as $message_receive)--}}
{{--                    @if($message_receive->message_chat == 'Berikut Design Inspirasi untuk Kategori MMT yang Indoprinting berikan:')--}}
{{--                        @php--}}
{{--                            $databaseHost = 'localhost';--}}
{{--                            $databaseName = 'idp_w2p';--}}
{{--                            $databaseUsername = 'idp_w2p';--}}
{{--                            $databasePassword = 'Dur14n100$';--}}
{{--                            $w2p = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);--}}
{{--                            $mmt_inspirations = mysqli_query($w2p, "SELECT * FROM nsm_products WHERE category_id=11");--}}
{{--                            $check_design = mysqli_num_rows($mmt_inspirations);--}}
{{--                            if ($check_design > 0 ) {--}}
{{--                                foreach ($mmt_inspirations as $mi) {--}}
{{--                                    $design_result = $mi['thumbnail_url'];--}}
{{--                                }--}}
{{--                                echo "--}}
{{--                                <div class='message'>--}}
{{--                    <div class='photo' style='background-image: url(https://indoprinting.co.id/assets/images/logo/favicon2.png);'>--}}
{{--                        <div class='online'></div>--}}
{{--                    </div>--}}
{{--                    <p class='text'>$message_receive->message_chat </p>--}}
{{--                </div>--}}
{{--                <div class='message text-only'>--}}
{{--                    <p class='text'>  <img src='$design_result' /></p>--}}
{{--                </div>--}}
{{--                                ";--}}
{{--                            } else {--}}
{{--                                return back()->with('error', 'Voucher sudah tidak berlaku');--}}
{{--                            }--}}
{{--                        @endphp--}}
{{--                    @else--}}
{{--                        <div class="message">--}}
{{--                            <div class="photo" style="background-image: url('https://indoprinting.co.id/assets/images/logo/favicon2.png');">--}}
{{--                                <div class="online"></div>--}}
{{--                            </div>--}}
{{--                            <p class="text"> {{ $message_receive->message_chat }} </p>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                @endforeach--}}

{{--            </div>--}}

{{--            <div class="chat-input">--}}

{{--            </div>--}}

{{--            <form action="{{ route('idppartner.action') }}" method="post">--}}
{{--                <div class="footer-chat">--}}
{{--                    @csrf--}}
{{--                    <input type="hidden" name="message_to" value="1">--}}
{{--                    <input type="hidden" name="message_from" value="{{ Auth()->id() ?? $_SERVER['REMOTE_ADDR'] }}">--}}
{{--                    <i class="icon fi-sr-plus clickable" style="font-size:25pt;" aria-hidden="true"></i>--}}
{{--                    <input type="text" class="write-message" name="message_chat" placeholder="Tulis pesan anda di sini...">--}}
{{--                    <button type="submit"> Kirim</button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </section>--}}
{{--    </div>--}}
{{--</div>--}}