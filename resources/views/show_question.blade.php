<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <title>Document</title>
</head>
<body>
    <div class="columns">
        <div class="column">
            
        </div>
        <div class="column is-half">
            <article class="panel is-link">
                <p class="panel-heading">
                  数学
                </p>
                @auth
                @foreach ($message as $key=>$message)
             <a href="show/{{$key}}" class="target">
                <div class="pregress ">
                    <div class="color" style="width:{{$message}}%"></div>
                </div>
                <div class="target2">
                    {{$key}} 
                </div>
             </a>
            @endforeach
            @endauth
            @guest
            @foreach($message as $key=>$message)
             <a href="show/{{$key}}" class="target">
               
                <div class="target2">
                    {{$key}} 
                </div>
             </a>
             @endforeach
             @endguest
            
            
            
              </article>
        </div>
        <div class="column">

        </div>
    </div>
    <style>
        .pregress{
            height:10px;
            width:100%;
            background:#eee;
            padding:10px 0 10px 0 ;
            
        }
        .color{
            height:10px;
            width:50%;
            background:chartreuse;
            border-radius: 2px;
        }
        .target2{
            padding:0 0 10px 0;
        }
        a{
            display:block;
            text-decoration: none;
        }
        .panel{
            text-align:center;
        }
    </style>
</body>
</html>