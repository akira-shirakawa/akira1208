
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    <title>Document</title>
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
             <a class="navbar-item" href="../../homework/{{Auth::id()}}"> 
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
    <div class="columns is-desktop">
        <div class="column is-half is-offset-one-quarter">
           
  
              @foreach($message as $key=>$message)
           <article class="panel is-success">
                <p class="panel-heading">
                 {{$key}}
                </p> 
               
                <div class="panel-block is-flex-wrap-wrap">
                    @foreach($message as $message)
                    <div class="items2">
                      <div class="content"> <a href="show/{{$message['id']}}">{{$message['title']}}</a></div> 
                      @auth
                      <div class="statue{{$message3->return_statue(Auth::id(),$message['id'])}}"> <i class="fas fa-check"></i></div>
                      @endauth 
                    </div>
                  @endforeach
                </div>
               
              
              </article>
              @endforeach
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
      .content{
          width:75%; 
      }
      .statue{
          width:14%; 
          height:45px; 
          text-align:center;
          vertical-align: middle; 
          border-radius:5px;   
          background:#eee; 
          
         
      }
      .statue1{
          width:14%; 
          height:45px; 
          text-align:center;
          vertical-align: middle;
         border-radius:5px;   
          background:#bfefec;  
         
      }
      .statue2{
          width:14%; 
          height:45px;
        border-radius:5px;   
          text-align:center;
          vertical-align: middle; 
          background:#ff3979;  
         
      }
          .items2{
              display:flex;
              width:50%;
              padding:20px,0,10px,0; 
              font-size:1.5rem;
              border-top: 1px solid #eee;
          }
          .panel-block{
              display:flex;
              flex-wrap:wrap;
          }
          @media screen and (max-width:480px) { 
   .items2{
       width:100%;
   }
}
      </style>
</body>
</html>