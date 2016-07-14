<!DOCTYPE html>
<html>
    <head>
        <title>启创教育云平台</title>
        <meta charset="utf-8">


        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }


            .title {
                font-size: 18px;
                color:#545454;
            }
            #count{
                color:red;
                font-weight: bold;
            }

            .pic{
                width:648px;
                height:320px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="pic">
                    <img src="{{url('image/qiyun/error/1.png')}}" alt="">
                    <div style="height:15px"></div>
                    <div class="title">抱歉！未被授权。<span id="count">5</span> 秒之后跳转首页,或点击按钮返回首页......</div>
                    <div style="height:25px"></div>
                    <a href="/"><img src="{{url('image/qiyun/error/2.png')}}" alt=""></a>
                </div>
            </div>
        </div>
    </body>
    <script>
        (function() {
            var count = 5;
            var myTime = setInterval(function () {
                document.getElementById('count').innerText = count;
                count--;
                if (count == 0) {
                    clearInterval(myTime);
                    location.href="/";
                }
            }, 1000);
        })()

    </script>
</html>
