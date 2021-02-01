
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <title>Document</title>
</head>
<body>
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
                       <a href="show/{{$message['id']}}">{{$message['title']}}</a> 
                    </div>
                  @endforeach
                </div>
               
              
              </article>
              @endforeach
        </div>
      </div>
      <style>
          .items2{
              width:50%;
              padding:20px,0,10px,0;
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