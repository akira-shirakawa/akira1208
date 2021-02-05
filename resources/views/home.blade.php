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
          <a class="navbar-item" href="user/{{Auth::id()}}">
            {{Auth::user()->name}}
          </a>
      
          <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </a>
        </div>
      
        <div id="navbarBasicExample" class="navbar-menu">
          <div class="navbar-start">
            <figure class="image is-48x48">
              <img src="{{Auth::user()->image}}">
            </figure>
      
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
      <div class="columns">
        <div class="column ">
            <article class="message is-link">
                <div class="message-header">
                  <p>Link</p>
                  <button class="delete" aria-label="delete"></button>
                </div>
                <div class="message-body">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a> efficitur. Aenean ac <em>eleifend lacus</em>, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
                </div>
              </article>
              
            <article class="message is-info">
                <div class="message-header">
                <p>Info</p>
                <button class="delete" aria-label="delete"></button>
                </div>
                <div class="message-body">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a> efficitur. Aenean ac <em>eleifend lacus</em>, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
                </div>
            </article>
  
        </div>
        <div class="column is-half">
            <article class="panel is-primary">
                <p class="panel-heading">
                  高速基礎マスター
                </p>
                
               
                <a class="panel-block is-active">
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
             <article class="message is-primary">
              <div class="message-header">

                ランキング
              </div>
              <div class="message-body">
              <div class="tabs is-centered">
                <ul>
                  <li class="is-active"><a>Dayly</a></li>
                 
                  <li>月間</li>
                  <li>総合</li>
                  
                </ul>
              </div>              </div>
            </article>             
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
                  <p>Hello World</p>
                  <button class="delete" aria-label="delete"></button>
                </div>
                <div class="message-body">
               <i class="fas fa-book" aria-hidden="true"></i>              
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a> efficitur. Aenean ac <em>eleifend lacus</em>, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
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
</script>
<style>
i{
  font-size:1.5rem;
}
</style>
</body>
</html>