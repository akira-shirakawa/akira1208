<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <title>Document</title>
</head>
<body >
    <div class="columns is-desktop ">
        <div class="column is-half is-offset-one-quarter has-background-white">
            <h2 class="title">{{$message->title}}</h2>
           {!! nl2br(($message->content)) !!}
              <div class="homework">
               <div class="title">課題</div>
               {{$message->homework}}
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
           </div>
           <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:200px;">
        </div>
      
      </div>  
        <script>
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
          .homework{
             
              background:rgb(222, 245, 255);
          }
      </style>
</body>
</html>