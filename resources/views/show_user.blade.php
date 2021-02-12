<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet"> 
</head>
<body>
    <nav class="navbar" role="navigation" aria-label="main navigation"> 
        <div class="navbar-brand">
             <a class="navbar-item" href="../../home"> 
             <i class="fas fa-home"></i>
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
        <div class="column ">
            
  
        </div>
        <div class="column is-one-third">
            <div class="card">
                <div class="card-image">
                  <figure class="image is-4by3">
                    <img src="{{$message->image}}" alt="ユーザーのプロフィール">
                  </figure>
                </div>
                <div class="card-content">
                  <div class="media">
                    <div class="media-left">
                      <figure class="image is-48x48">
                        <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                      </figure>
                    </div>
                    <div class="media-content">
                      <p class="title is-4">{{$message->name}}</p>
                      <p class="subtitle is-6">{{$message->point}}Point</p>
                    </div>
                  </div>
              
                  <div class="content">
                    <button class="js-target button is-link">プロフィールを編集</button>
                     <div class="modal">
                      <div class="modal-background"></div>
                      <div class="modal-content">
                        <form action="../user" method="post" enctype="multipart/form-data">
                          {{csrf_field()}} 
                         <div class="card">
                          <div class="card-content">
                            <div class="content">
                              <h2 class="subtitle">プロフィールを編集</h2> 
                              <input class="input" type="text" name="name" placeholder="名前" required> 
                              <input class="input" type="text"  name="high_school_name" placeholder="高校">
                              <input class="input" type="text" name="college" placeholder="志望校">
                              <input type="file" name="image" onchange="previewImage(this);">
                            </div>
                          </div>
                        </div> 
                        <input type="submit" value="変更を保存" class="button"> 
                        </form>
                        <p>
                        Preview:<br>
                        <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:200px;">
                        </p>                        
                      </div>
                      <button class="modal-close is-large" aria-label="close"></button>
                    </div>
                    
                  </div>
                </div>
              </div>
            
        </div>
        <div class="column">
         
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
  $('.js-target').click(function(){
    $('.modal').toggleClass('is-active')
  }); 
  $('.modal-background').click(function(){ 
    $('.modal').toggleClass('is-active');
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
</body>
</html>