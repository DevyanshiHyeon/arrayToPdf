<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style>
        body{
            font-family: 'Poppins';
            /*font-size: 22px;*/
        }
        .chat
        {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .chat li
        {
            margin-bottom: 40px;
            padding-bottom: 5px;
            /* border-bottom: 1px dotted #B3A9A9; */
            margin-top: 10px;
            width: 80%;
        }
        .chat li .chat-body p
        {
            /*margin: 0;*/
            /* color: #777777; */
        }
        .chat-care
        {
            /*overflow-y: scroll;*/
            /*height: 350px;*/
        }
        .chat-care .chat-img
        {
            width: 50px;
            height: 50px;
        }
        .chat-care .img-circle
        {
            border-radius: 50%;
        }
        .chat-care .chat-img
        {
            display: inline-block;
        }
        .chat-care .chat-body
        {
            display: inline-block;
            max-width: 80%;
            /*background-color: #FFC195;*/
            padding: 15px;
        }
        .chat-care .chat-body strong
        {
            color: #0169DA;
        }
        .chat-care .question
        {
            text-align: right ;
            float: right;
        }
        .chat-care .question p
        {
            text-align: left ;
        }
        .chat-care .answer
        {
            text-align: left ;
            float: left;
        }
        .chat-care .left
        {
            float: left;
        }
        .chat-care .right
        {
            float: right;
        }
        .clearfix {
            clear: both;
        }
        ::-webkit-scrollbar-track
        {
            box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }
        ::-webkit-scrollbar
        {
            width: 12px;
            background-color: #F5F5F5;
        }
        ::-webkit-scrollbar-thumb
        {
            box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #555;
        }
        .answer-msg{
            border-radius: 0rem 1.25rem 1.25rem 1.25rem;
            background-color: #eaeaea;
        }
        .question-msg{
            border-radius: 1.25rem 0rem 1.25rem 1.25rem;
            background-color: lightpink;
        }
        div #photo{
            text-align: center;
        }
        img {
            vertical-align:middle;
        }
        span {
            vertical-align:middle;
        }
        h4 {
            display: inline-block
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body chat-care">
                    <center>
                        <div id="photo" >
                            <img style="vertical-align:middle;margin: 6px; height: 250px; width: 250px" src="{{url('logo/logo_android.png')}}" alt="Paris" />
                            <span style="vertical-align:middle;font-weight: 900;font-size:4em;font-family: 'Poppins';">Chat AI</span>
                        </div>
                    </center>
                    <div style="font-weight: 700;font-family: 'Poppins';">Download Via this Link:</div>
                    <a style="font-weight: 600;font-family: 'Poppins';" href="https://play.google.com/store/apps/details?id=com.snapchat.android">https://play.google.com/store/apps/details?id=com.snapchat.android</a>
                    <div style="font-weight: 700;font-family: 'Poppins';margin-top: 15px;">Or scan this QR code:</div>
                    <center><img style="height: 200px; width: 200px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/QR_code_for_mobile_English_Wikipedia.svg/1200px-QR_code_for_mobile_English_Wikipedia.svg.png" alt="">
                        <ul class="chat">
                            @foreach($data as $message)
                                @if (isset($message['question']))
                                    <li class="question clearfix">
                                        <div class="chat-body clearfix question-msg">
                                            <p>
                                                {{ $message['question'] }}
                                            </p>
                                        </div>
                                    </li>
                                @elseif($message['answer'])
                                    <li class="answer clearfix">
                                        <div class="chat-body clearfix answer-msg">
                                            <p>
                                                {{ $message['answer'] }}
                                            </p>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul></center>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
