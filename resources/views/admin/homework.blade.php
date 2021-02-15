<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="columns is-mobile">
        <div class="column is-half is-offset-one-quarter main">
            <table class="tableis-striped is-fullwidth table">
               
                <tr>
                    <th>名前</th>
                    <th>問題</th>
                    <th>statue</th>
                    <th>detail</th>
                </tr>
               
             @foreach($message as $message)
              @if(empty($message2->return_statue2(optional($message->user)->id,optional($message->article)->id))  )
               <tr>
                   <td>{{optional($message->user)->name}}</td>
                   <td>{{optional($message->article)->title}}</td>
             <td><button class="is-success button">{{$message2->show_statue2($message->user->id,$message->article->id) }}</button></td>   
             
                   
                   
                   
                   <td>
                     <button class="js-target button is-link">詳細を見る</button>
                     
                    <div class="modal">
                      <div class="modal-background"></div>
                      <div class="modal-card">
                        <header class="modal-card-head">
                          <p class="modal-card-title">{{optional($message->article)->title}}</p>
                          <button class="delete" aria-label="close"></button>
                        </header>
                        <section class="modal-card-body">
                            <figure class="image is-128x128">
                              <img src="{{$message->image}}" alt ="">
                            </figure>                        
                         </section>
                        <footer class="modal-card-foot">
                         <form action="../reply" method="post">
                             {{ csrf_field() }}
                             
                            <textarea class="textarea" placeholder="e.g. Hello world" name ="comment">
                             
                         </textarea> 
                        <div class="control">
                          <label class="radio">
                            <input type="radio" name="statue" value="1">
                            合格
                          </label>
                          <label class="radio">
                            <input type="radio" name="statue" value="2">
                            
                            再提出
                          </label>
                        </div> 
                        <input type="submit" value="送信">
                        <input type="hidden" name="user_id" value="{{$message->user->id}}">
                        <input type="hidden" name="article_id" value="{{$message->article->id}}">
                         </form>
                        </footer>
                      </div>
                    </div>
                   </td>                     
                   
               </tr>
              @elseif ( $message2->return_statue2($message->user->id,$message->article->id)->statue == 5)
               <tr>
                   <td>{{$message->user->name}}</td>
                   <td>{{$message->article->title}}</td>
             <td><button class="is-success button">{{$message2->show_statue2($message->user->id,$message->article->id) }}</button></td>   
             
                   
                   
                   
                   <td>
                     <button class="js-target button is-link">再提出の詳細を見る</button>
                     
                    <div class="modal">
                      <div class="modal-background"></div>
                      <div class="modal-card">
                        <header class="modal-card-head">
                          <p class="modal-card-title">{{$message->article->title}}</p>
                          <button class="delete" aria-label="close"></button>
                        </header>
                        <section class="modal-card-body">
                            <figure class="image is-128x128">
                              <img src="{{$message->image}}" alt ="">
                            </figure>                        
                         </section>
                        <footer class="modal-card-foot">
                         <form action="../reply_edit" method="post">
                             <input type="hidden" name ="reply_id" value="{{$message2->return_statue2($message->user->id,$message->article->id)->id}}">
                             {{ csrf_field() }}
                             
                            <textarea class="textarea" placeholder="e.g. Hello world" name ="comment">
                             
                         </textarea> 
                        <div class="control">
                          <label class="radio">
                            <input type="radio" name="statue" value="1">
                            合格
                          </label>
                          <label class="radio">
                            <input type="radio" name="statue" value="2">
                            
                            再提出
                          </label>
                        </div> 
                        <input type="submit" value="送信">
                        <input type="hidden" name="user_id" value="{{$message->user->id}}">
                        <input type="hidden" name="article_id" value="{{$message->article->id}}">
                         </form>
                        </footer>
                      </div>
                    </div>
                   </td>                     
                   
               </tr>               
               @else
               @endif
               @endforeach
              
            </table>
        </div>
      </div>
      <style>
  body{
      font-family: '游ゴシック', YuGothic, 'メイリオ', Verdana, 'Hiragino Kaku Gothic ProN', Meiryo, sans-serif;
  }      
          html{
              background:#eee;
          }
          .main{
              background:#fff;
          }
      </style>
      <script>
         $('.js-target').click(function(){
             $(this).next('.modal').toggleClass('is-active');
            
             
         }) 
         $('.delete').click(function(){
             $(this).parent().parent().parent('.modal').toggleClass('is-active');
             
         })
      </script>
</body>
</html>
