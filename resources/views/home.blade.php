<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>あきらラーニング</title>　
    <meta content="無料で大学入試、共通一次試験対策ができるサイト、単語アプリとしてもつかえる！" name="description">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/ fb# website: http://ogp.me/ns/ website#">
 
<meta property="og:url" content="https://akira-learning.com" />
 
<meta property="og:type" content=" ページの種類" />
 
<meta property="og:title" content="あきらラーニング" />
 
<meta property="og:description" content="無料で共通一次試験対策ができるサイト" />
 
<meta property="og:site_name" content="あきらラーニング" />
 <meta name="twitter:card" content="summary_large_image" />
 <meta name="twitter:site" content="@@2tgtPb958VVgpRp" /> 
<meta property="og:image" content="https://akira32310901.s3.amazonaws.com/public/group6.png" />
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-TN03MTYVLP"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-TN03MTYVLP');
</script>    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

</head>
<body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
          @auth
          <a class="navbar-item" href="user/{{Auth::id()}}">
          <figure class="image is-32x32">
   <div class="box3">
  <img src="{{Auth::user()->image ?? "https://bulma.io/images/placeholders/128x128.png"}}">
  </div>
        </figure>
        </a>
             <a class="navbar-item" href="homework/{{Auth::id()}}">
              課題
            </a>
             <a class="navbar-item" href="#">
                     {{auth::user()->point}}Pt
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
       <section class="hero is-medium mb-1" style="background:url(https://akira32310901.s3.amazonaws.com/public/%E3%82%B0%E3%83%AB%E3%83%BC%E3%83%97+9.png) center">
         
        <div class="hero-body">
          <p class="title ">
            <h1 class="title">あきらラーニング</h1>
          </p>
          <p class="subtitle  ">
             Akira lerningVer1.0  
          </p>
        </div>
      </section>     
      <div class="columns">
        <div class="column ">
            @guest
            <img src="https://akira32310901.s3.amazonaws.com/public/%E3%82%B0%E3%83%AB%E3%83%BC%E3%83%97+9.jpg" alt="高速基礎マスター" width="100%" height="auto">
            @endguest
          @auth
            <article class="message is-link">
                <div class="message-header">
                  <p>Notification</p>
                  <button class="delete" aria-label="delete"></button>
                </div>
                <div class="message-body">
                共通一次試験まであと <h2 class="subtitle js-target">Subtitle</h2>     
                </div>
              </article>
              @endauth
              

  
        </div>
        <div class="column is-half">
            <article class="panel is-primary pt-3">
                <p class="panel-heading">
                  高速基礎マスター
                </p>
                
               
                <a class="panel-block is-active" href="question/1">
                  <span class="panel-icon">
                    <i class="fas fa-book" aria-hidden="true"></i>
                  </span>
                  英語<span class="tag is-danger">New</span>
                </a>
                <a class="panel-block" href="question/2">
                  <span class="panel-icon">
                    <i class="fas fa-book" aria-hidden="true"></i>
                  </span>
                  古文単語   
                </a>
                <a class="panel-block">
                  <span class="panel-icon">
                    <i class="fas fa-globe-asia"></i>
                  </span>
                  地歴公民 Comming Soon 
                </a>
                <a class="panel-block">
                  <span class="panel-icon">
                    <i class="fas fa-book" aria-hidden="true"></i>
                  </span>
                  生物基礎・化学基礎 Comming soon
                </a>
              </article>
            <article class="panel is-primary">
                <p class="panel-heading">
                 学習(動画) <i class="fas fa-book" aria-hidden="true"></i>
                </p>
                
               
                <a href="article/0"class="panel-block is-active">
                  <span class="panel-icon">
                   <i class="fas fa-calculator"></i>
                  </span>
                  数学
                </a>
                <a class="panel-block" href="article/1">

                  <span class="panel-icon">
                    <i class="fas fa-font"></i>
                  </span>
                  英語Commingsoon
                </a>
                <a class="panel-block" href="article/2">
                  <span class="panel-icon">
                   <i class="fas fa-flask"></i>
                  </span>
                  理科Commingsoon
                </a>
                <a class="panel-block">
                  <span class="panel-icon">
                   <i class="fas fa-globe-asia"></i>
                  </span>
                  地理Commingsoon
                </a>
              </article>
      <div class="title is-4">
        ランキング
      </div>
<ul class="tab clearfix">
  <li class="active">総合</li>
  <li>Dayly</li>
  <li>Month</li>
</ul>
<div class="card">
  <div class="card-content">
    <div class="content">
<div class="area">
  <ul class="show" style="margin-left:0px;"> 
    <table class="table">
    @foreach($message as $key)
      @if ($loop->first)
   <tr><td class="first">
     
     <img src="https://akira32310901.s3.amazonaws.com/public/ranking_1st.png"></td><td>
   <div class="box2">
  <img src="{{$key->image ?? "https://bulma.io/images/placeholders/128x128.png"}}">
  </div>
</td><td is-size-4>{{$key->name}} </td><td is-size-4> {{$key->point}}Point</td></tr>   
      @elseif($loop->index == 1)  
   <tr><td><img src="https://akira32310901.s3.amazonaws.com/public/ranking_2nd.png"></td><td>
   <div class="box2">
  <img src="{{$key->image ?? "https://bulma.io/images/placeholders/128x128.png"}}">
  </div>
</td><td>{{$key->name}} </td><td> {{$key->point}}Point</td></tr>
@elseif($loop->index ==2)
   <tr><td><img src="https://akira32310901.s3.amazonaws.com/public/ranking_3rd.png"></td><td>
   <div class="box2">
  <img src="{{$key->image ?? "https://bulma.io/images/placeholders/128x128.png"}}">
  </div>
</td><td>{{$key->name}} </td><td> {{$key->point}}Point</td></tr>

@else 
   <tr><td></td><td>
    <div class="box2">
  <img src="{{$key->image ?? "https://bulma.io/images/placeholders/128x128.png"}}">
  </div>
</td><td>{{$key->name}} </td><td> {{$key->point}}Point</td></tr>

     @endif
   @endforeach
   </table>
  </ul>
  <ul>
    <table class="table">
  @foreach($day as $key)
   <tr><td>
     <div class="box2">
  <img src="{{$user->get_user($key['user_id'])->image  ?? "https://bulma.io/images/placeholders/128x128.png"}}">
  </div>
</td><td>{{$user->get_user($key['user_id'])->name}} </td><td>{{$key['point']}}point</td></tr>  
   @endforeach
   </table>
  </ul>
  
   <ul>
    <table class="table">
  @foreach($month as $key) 
   <tr><td>
     <div class="box2"> 
  <img src="{{$user->get_user($key['user_id'])->image  ?? "https://bulma.io/images/placeholders/128x128.png"}}">
  </div>
</td><td>{{$user->get_user($key['user_id'])->name}} </td><td>{{$key['point']}}point</td></tr>  
   @endforeach
   </table>
  </ul>
</div>   
    </div>
  </div>
</div>



        </div>
        <div class="column">
            <article class="message">
                <div class="message-header">
                  <p>News</p>
                </div>
                <div class="message-body">
                <div class="block">
                <span class="icon has-text-success">
                  <i class="fab fa-line is-size-3"></i> 
                </span>                  
                <a href="https://lin.ee/ArBZpHL">line at で相談しませんか？(無料)</a> 
                            
                </div>                 
                </div>
              </article>
              <article class="message">
                <div class="message-header">
                  <p>注目</p>
                  <button class="delete" aria-label="delete"></button>
                </div>
                <div class="message-body">
@foreach($notification as $key) 
<a href="{{$key->link}}">
<div class="box">
  <article class="media">
    <div class="media-left">
      <figure class="image is-64x64">
        <img src="{{$key->image ?: "https://auctions.afimg.jp/item_data/image/20121116/yahoo/b/b141197231.1.jpg"}}" alt="Image"> 
      </figure>
    </div>
    <div class="media-content">
      <div class="content">
        <p>
         
         {{$key->content}}<br>外部リンク 
        </p>
      </div>
     
    </div>
  </article>
</div>  
</a>
@endforeach
</div>
              </article>
        </div>
      </div>
      <footer class="footer">
        <div class="content has-text-centered">
          <p>
            <strong>Bulma</strong> by <a href="https://jgthms.com">Jeremy Thomas</a>. The source code is licensed
            <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
            is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
          </p>
        </div>
      </footer>
  <style>
  body{
      font-family: '游ゴシック', YuGothic, 'メイリオ', Verdana, 'Hiragino Kaku Gothic ProN', Meiryo, sans-serif;
  }
  @media(max-width:400px){
   
     .hero{
    background:url(https://akira32310901.s3.amazonaws.com/public/%E3%82%B0%E3%83%AB%E3%83%BC%E3%83%97+4.png) center;
  }
  }
 
           .box2 {
    width: 35px;
    padding-top: 35px;     
    position: relative;
   
}
.box2>img{
       width: 100%;
       height: 100%;
       position: absolute;
       top: 0;
       object-fit: cover;
       border-radius: 50%;
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
 ul .show{ 
   margin-left:none; 
 }
    .columns{
      padding-top:15px;
    }
.tab {
  border-bottom: 3px solid #fb4343;
  display:flex;
}
.tab li {
  color: #333;
  display:block;
  width:20%;
  margin: 0 10px -1px 0;
  padding: 10px 20px;
  border: 1px solid #fb4343;
  cursor: pointer;
  list-style: none;
  transition: .3s;
}
.tab li.active {
  color: #fff;
  background: #fb4343;
  cursor: auto;
}
 
.area ul {
  display: none;
}
.area ul.show {
  display: block;
}
ul>li{
list-style:none;
}
a {
text-decoration: none;
} 
  </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    function return_time(number){
        date = Math.floor(number/(60*60*24));
        hour = Math.floor((number-(date*60*60*24))/(60*60));
        minute = Math.floor((number-(date*60*60*24)-(hour*60*60))/60);
        second = Math.floor(number % 60);
        return String(date)+'日'+String(hour)+'時間'+String(minute)+'分'+String(second)+'秒'; 
    }
    function countdown(){
        var date = new Date() ;
        var a = date.getTime() ;
        var b = Math.floor( a / 1000 ) ;
        var date2 = new Date( 2021, 12, 16, 0, 00, 00 ) ;
        var c = date2.getTime() ;
        var d = Math.floor( c / 1000 ) ;
        let result = d-b;
        let result2 =return_time(result);
        $('.js-target').text(result2);
        setTimeout(countdown,1000);
    }
    countdown();
  $('.tab li').click(function() {
 
    // ②クリックされたタブの順番を変数に格納
    var index = $('.tab li').index(this);
 
    // ③クリック済みタブのデザインを設定したcssのクラスを一旦削除
    $('.tab li').removeClass('active');
 
    // ④クリックされたタブにクリック済みデザインを適用する
    $(this).addClass('active');
 
    // ⑤コンテンツを一旦非表示にし、クリックされた順番のコンテンツのみを表示
    $('.area ul').removeClass('show').eq(index).addClass('show');
 
  });
  
</script>
<style>
html{
  text-align:center;
}
i{
  font-size:1.5rem;
}
</style>
</body>
</html>
