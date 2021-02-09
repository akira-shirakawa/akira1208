<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <title>Document</title>
</head>
<body >
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
    <textarea class="textarea" placeholder="10 lines of textarea" rows="10" name='memo'>{{$message3->memo ?? null}}</textarea>   
    <button class="button is-black js-target">保存</button>
    <button class="button is-loading is-black js-target2 hide">保存</button>
    
  </div>
</article>         
     
       </div>
        <div class="column is-half has-background-white">
 <div class="notification is-success hide js-target4">
正常に保存されました
</div>         
            <h2 class="title">{{$message->title}}</h2>
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
                  <input class="file-input" type="file" name="image" onchange="previewImage(this);">
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
                  <input class="file-input" type="file" name="image" onchange="previewImage(this);">
                  <span class="file-cta">
                    <span class="file-icon">
                      <i class="fas fa-upload"></i>
                    </span>
                    <span class="file-label">
                      ここから写真を送る
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
        	fileReader.onload = (function() {
        		document.getElementById('preview').src = fileReader.result;
        	});
        	fileReader.readAsDataURL(obj.files[0]);
        }
        </script>
      <style>
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