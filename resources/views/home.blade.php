<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

</head>
<body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
          @auth
          <a class="navbar-item" href="user/{{Auth::id()}}">
            {{Auth::user()->name}}
          </a>
          @endauth
      
          <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </a>
        </div>
      
        <div id="navbarBasicExample" class="navbar-menu">
          <div class="navbar-start">
            @auth
            <figure class="image is-48x48">
              <img src="{{Auth::user()->image}}">
            </figure>
            @endauth
      
            <a class="navbar-item" href="homework/{{Auth::id()}}">
              課題
            </a>
      
            <div class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link">
                More
              </a>
      
              <div class="navbar-dropdown">
                <a class="navbar-item">
                  About
                </a>
                <a class="navbar-item">
                  Jobs
                </a>
                <a class="navbar-item">
                  Contact
                </a>
                <hr class="navbar-divider">
                <a class="navbar-item">
                  Report an issue
                </a>
              </div>
            </div>
          </div>
      
          <div class="navbar-end">
            <div class="navbar-item">
             
              <div class="buttons">
                
             @guest
                <a class="button is-primary" href="{{ route('login') }}">
                  <strong>Sign up</strong>
                </a>
              @endguest
             @auth
                <a class="button is-primary" href="{{ route('logout') }}"
 
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>
              @endauth 
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </div>
            </div>
          </div>
        </div>
      </nav>
       <section class="hero is-medium mb-1" style="background:url(https://akira32310901.s3.amazonaws.com/%E3%83%81%E3%83%A7%E3%82%B310.12.jpg) center">
         
        <div class="hero-body">
          <p class="title has-text-white-ter">
            聖ラーニング
          </p>
          <p class="subtitle has-text-white-ter ">
             Akira lerning
          </p>
        </div>
      </section>     
      <div class="columns">
        <div class="column ">
          @auth
            <article class="message is-link">
                <div class="message-header">
                  <p>Link</p>
                  <button class="delete" aria-label="delete"></button>
                </div>
                <div class="message-body">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a> efficitur. Aenean ac <em>eleifend lacus</em>, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
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
                  数学
                </a>
                <a class="panel-block">
                  <span class="panel-icon">
                    <i class="fas fa-book" aria-hidden="true"></i>
                  </span>
                  英語
                </a>
                <a class="panel-block">
                  <span class="panel-icon">
                    <i class="fas fa-globe-asia"></i>
                  </span>
                  地理
                </a>
                <a class="panel-block">
                  <span class="panel-icon">
                    <i class="fas fa-book" aria-hidden="true"></i>
                  </span>
                  理科
                </a>
              </article>
            <article class="panel is-primary">
                <p class="panel-heading">
                 学習 <i class="fas fa-book" aria-hidden="true"></i>
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
                  英語
                </a>
                <a class="panel-block" href="article/2">
                  <span class="panel-icon">
                   <i class="fas fa-flask"></i>
                  </span>
                  理科
                </a>
                <a class="panel-block">
                  <span class="panel-icon">
                   <i class="fas fa-globe-asia"></i>
                  </span>
                  地理
                </a>
              </article>
      <div class="title is-4">
        ランキング
      </div>
<ul class="tab clearfix">
  <li class="active">総合</li>
  <li>dayly</li>
  <li>month</li>
</ul>
<div class="card">
  <div class="card-content">
    <div class="content">
<div class="area">
  <ul class="show">
    <table class="table">
    @foreach($message as $key)
   <tr><td><figure class="image is-32x32">
  <img class="is-rounded" src="{{$key->image ?? "https://bulma.io/images/placeholders/128x128.png"}}">
</figure></td><td>{{$key->name}} </td><td> {{$key->point}}Point</td></tr>
   @endforeach
   </table>
  </ul>
  <ul>
  @foreach($day as $key)
   <li>{{$user->get_user($key['user_id'])->name}} {{$key['point']}}point</li> 
   @endforeach
  </ul>
  <ul>
    @foreach($month as $key)
   <li>{{$key['point']}}point</li>
   @endforeach
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
                  <button class="delete" aria-label="delete"></button>
                </div>
                <div class="message-body">
                <div class="block">
                <span class="icon has-text-success">
                  <i class="fab fa-line"></i>
                </span>                  
                line at で相談しませんか？
                <h2 class="subtitle js-target">Subtitle</h2>                
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
        <img src="{{$key->image ?: "https://bulma.io/images/placeholders/128x128.png"}}" alt="Image">
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
        var date2 = new Date( 2022, 1, 16, 0, 00, 00 ) ;
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
