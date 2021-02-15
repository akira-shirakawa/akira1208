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
          <figure class="image is-32x32">
          <img class="is-rounded" src="{{Auth::user()->image ?? "https://bulma.io/images/placeholders/128x128.png"}}">
        </figure>
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
            <h2 class="title has-text-centered">{{$message->title}}</h2>
           {!! nl2br(($message->content)) !!}
              <div class="homework">
                @guest
                <div class="wrapper">
                  ログインして課題を提出してみよう
                </div>
                @endguest
               <div class="title">課題</div>
               {{$message->homework}}
            @switch($message2->distinct_homework(Auth::id(),$message->id))
               @case('再提出')
             
               <form action="../../homework_edit" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                      <input type="hidden" name="article_id" value="{{$message->id}}">
                     
                        <input type="hidden" value="{{ Auth::id() }}" name="user_id">
                
              <div class="file is-danger">
                <label class="file-label">
                  <input class="file-input" type="file" name="image" onchange="previewImage(this);"  accept="image/png, image/jpeg, image/jpg" required>  
                  <span class="file-cta">
                    <span class="file-icon">
                      <i class="fas fa-upload"></i>
                    </span>
                    <span class="file-label">
                     再提出
                    </span>
                  </span>
                </label>
              </div>
                     <input type="submit" class="button is-link">

              </form>
              @break
              @case('未提出')
                <form action="../../homework" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                      <input type="hidden" name="article_id" value="{{$message->id}}">
                     
                        <input type="hidden" value="{{ Auth::id() }}" name="user_id">
                
              <div class="file is-primary">
                <label class="file-label">
                  <input class="file-input" type="file" name="image" onchange="previewImage(this);"  accept="image/png, image/jpeg, image/jpg" required> 
                  <span class="file-cta">
                    <span class="file-icon">
                      <i class="fas fa-upload"></i>
                    </span>
                    <span class="file-label">
                      課題ができ たら写真を撮ってここから送ってね
                    </span>
                  </span>
                </label>
              </div>
                     <input type="submit" class="button is-link">

              </form>             
              @break
          @case('合格')
              <button class="is-info button">合格おめでとう</button>
          @break
          @default
              <button class="is-info button">提出済み</button>
          @endswitch
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
  .title{
    background:black;
    color:white; 
    border-radius:6px 6px 0 0; 
    padding:10px 0 10px 0; 
    text-align:center;
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