<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <title>Document</title>
</head>
<body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
          @auth
          <a class="navbar-item" href="user/{{Auth::id()}}">
          <figure class="image is-32x32">
          <img class="is-rounded" src="{{Auth::user()->image ?? "https://bulma.io/images/placeholders/128x128.png"}}">
        </figure>
        </a>
             <a class="navbar-item" href="homework/{{Auth::id()}}">
              課題
            </a> 
                <a class="button is-primary" href="{{ route('logout') }}"
 
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>            
          @endauth
             @guest
                <a class="button is-primary" href="{{ route('login') }}">
                  <strong>Login</strong>
                </a>
              @endguest         
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>     
        </div>
      </nav>    
    <div class="columns">
        <div class="column">
            
        </div>
        <div class="column is-half">
            <article class="panel is-link">
                <p class="panel-heading">
                  英語
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