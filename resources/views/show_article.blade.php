<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
         <script type="text/javascript" src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"> </script> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script type="text/x-mathjax-config">
      MathJax.Hub.Config({
        TeX: { equationNumbers: { autoNumber: "AMS" }},
        tex2jax: {
          inlineMath: [ ['$','$'], ["\\(","\\)"] ],
          processEscapes: true
        },
        "HTML-CSS": { matchFontHeight: false },
        displayAlign: "left",
        displayIndent: "2em"
      });
  </script>    
    <title>Document</title>
</head>
<body >
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
<article class="message is-dark">
  <div class="message-header">
    <p>Memo</p>
  </div>
  <div class="message-body js-memo">
    @guest
    <div class="wrapper2">
      ログインしてメモを書いてみよう
    </div>
    @endguest
    <textarea class="textarea" placeholder="10 lines of textarea" rows="10" name='memo' id="js-count" required>{{$message3}}</textarea>     
    <button class="button is-black js-target">保存</button> <button class="button is-loading is-black js-target2 hide">保存</button>
    <button class="button js-target-time">打刻</button>
    <span class="js-count-target">{{mb_strlen($message3)}}</span>/1000     
   <button class="js-pien button">🥺</button>
    
  </div>
</article>         
     
       </div>
        <div class="column is-half has-background-white">
 <div class="notification is-success hide js-target4">
正常に保存されました
</div>         
    <section class="hero is-medium mb-1" id="hero-target"
        style="background:url(https://i.gzn.jp/img/2014/03/06/children-play-math/00-top.png) center no-repeat;background-size: cover;">

        <div class="hero-body">
            <p class="title ">
                <h1 class="title" style="margin-right:24px;color:white">{{$message->title}}</h1>
            </p> 
            <p class="subtitle  ">
                Akira lerningVer1.0
            </p> 
        </div> 
    </section>         {!! nl2br(($message->content)) !!}　
              <div class="homework">
                @guest
                <div class="wrapper is-vcentered">
                  ログインして課題を提出してみよう
                </div>
                @endguest
                @auth
               @endauth 
 
           </div>
           <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:200px;">
        </div>
        <div class="column">
         
       </div>       
      
      </div>  
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
        let count =0;
        $('.js-pien').click(function(){
          let date = $('.textarea').val();
          let date2 = '🥺';
          count = date.length; 
           $('.js-count-target').text(count);
           
          $('.textarea').val(date+date2); 
        }); 
        $('.js-target-time').click(function(){
        console.log('hoge'); 
          let date = new Date();
          let date2 = date.toLocaleString();
          let date3 = $('.textarea').val();
          count+= 17;
            $('.js-count-target').text(count);
          $('.textarea').val(date3+date2);   
        });
        $('#js-count').keyup(function(){
           count = $(this).val().length;
          $('.js-count-target').text(count);
         if(count >1000){ 
         $('.js-target').addClass('hide'); 
         }else{
          $('.js-target').removeClass('hide'); 
         }
          
          
        })
        
        function show_alert(){
          $('.js-target4').toggleClass('hide');
          setTimeout(function(){
               $('.js-target4').toggleClass('hide');
          },2000);          
        };
        $('.js-target').click(function(){
         $(this).toggleClass('hide');
         $('.js-target2').toggleClass('hide');
        let memo = $('textarea[name="memo"]').val();
              $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "../../memo",
                    type: 'POST',
                    data:{'user_id':{{Auth::id()}},'article_id':{{$message->id}},'memo':memo}
                })
                .done(function(data) {
                   $('.js-target').toggleClass('hide');
                   $('.js-target2').toggleClass('hide');
                  show_alert();
                 
                })
                
                .fail(function(data) {
                    alert('失敗');
                });  
        });
     
        function previewImage(obj)
        { 
        	var fileReader = new FileReader();
        	fileReader.onload = (function(e) {
        	   console.log(obj.files[0].name);  
        		document.getElementById('preview').src = fileReader.result;
        	});
        	fileReader.readAsDataURL(obj.files[0]);
        }
        </script>
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
  
          html{
              background:#eee;
          }
            .summary{
              border:tomato 2px solid;
              border-radius:3px;
          }
          .homework,.js-memo{
             
              background:rgb(222, 245, 255);
              position:relative;
          }
          
          
          
          .wrapper{
          text-align:center;
          color:#fff;
          font-size:2rem;
          position:absolute;
          width:100%;
          height:100%;
          background:black;
          opacity:0.5;
          z-index:3;
          }
          .wrapper2{
          text-align:center;
          top:0;
          left:0;
          color:#fff;
          font-size:2rem;
          position:absolute;
          width:100%;
          height:100%;
          background:black;
          opacity:0.5;
          z-index:3;
          }
          .hide{
          display:none;
          }
      </style>
</body>
</html>