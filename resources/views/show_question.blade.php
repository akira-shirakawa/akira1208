<!DOCTYPE html>
<html lang="ja">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
           
    <title>共通一次試験英単語</title>
      <meta content="無料で共通一次試験対策ができるサイト" name="description">
</head>
<body>
    <nav class="navbar" role="navigation" aria-label="main navigation"> 
        <div class="navbar-brand">
             <a class="navbar-item" href="../../home">
             <i class="fas fa-home is-size-4"></i>
            </a>             
          @auth
          <a class="navbar-item" href="../../user/{{Auth::id()}}">
  <div class="box3">
  <img src="{{Auth::user()->image ?? "https://bulma.io/images/placeholders/128x128.png"}}">
  </div>
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
            @if($message2 == "英語")
                 <div class="autoplay">  
                    <div><a href="1"><img src="https://yellowokapi67.sakura.ne.jp/image/daigakunyuusi.png"></a></div>
                    <div><img src="https://yellowokapi67.sakura.ne.jp/image/nannkanneitango.png"></div> 
                    <div><a href="11"><img src="https://yellowokapi67.sakura.ne.jp/image/eiken3.png"></a></div>
                    <div><img src="https://yellowokapi67.sakura.ne.jp/image/eiken2-.png"></div>
                    <div><img src="https://yellowokapi67.sakura.ne.jp/image/eiken2.png"></div>
                </div>
            @endif    
            <article class="panel is-link"> 
                <p class="panel-heading">
                  {{$message2}} 
                </p> 
                @auth
                @foreach ($message as $key=>$message) 
             <a href="show/{{$key}}" class="target">
                <div class="pregress ">
                    <div class="color" style="width:{{$message[0]}}%"></div>
                    <div class="miss_color" style="width:{{$message[1]}}%"></div>
                </div> 
                <div class="target2">
                    {{$key}} 
                </div>
             </a>
             @if ($message[1] != 0)
             <a href="show_miss/{{$key}}" class="button">間違えたところだけ</a>
             @endif 
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
  body{
      font-family: '游ゴシック', YuGothic, 'メイリオ', Verdana, 'Hiragino Kaku Gothic ProN', Meiryo, sans-serif;
  } 
             .box3 {
    width: 30px;
    padding-top: 30px;     
    position: relative;
   
}
.box3>img{
       width: 100%;
       height: 100%; 
       position: absolute;
       top: 0;
       object-fit: cover;
       border-radius: 50%;
}
.miss_color{ 
             height:10px;
            width:50%;
            background:red;
            border-radius: 2px;   
}
        .pregress{
            display:flex;
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
<style>
.autoplay img{
margin:10px;/*画像の周りに余白*/
width:95%;/*横幅に制限*/
border:0.5px solid #eee;/*周囲に薄いボーダー*/}
</style>
 <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
 
<script type="text/javascript"> 
 $('.autoplay').slick({
  slidesToShow: 3,
  slidesToScroll:1,
  autoplay: true,
  autoplaySpeed: 3000,
// 画像下のドット（ページ送り）を表示
  dots:true,
});
  </script>
</body>
</html>