<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
    <div class="columns ">
        <div class="column">
            
        </div>
        <div class="column is-half">
            <table class="tableis-striped is-fullwidth table">
               
                <tr>
                  
                    <th>問題</th>
                    <th>statue</th>
                    <th>detail</th>
                </tr>
             @foreach($message as $message)
               <tr>
                  
                   <td>{{$message->article->title ?: nul}}</td>
             <td><button class="is-success button">{{$message2->show_statue($message->user->id,$message->article->id) }}</button></td>   
             
                   <td>
                     <button class="js-target button is-link">詳細を見る</button>
                     
                    <div class="modal">
                      <div class="modal-background"></div>
                      <div class="modal-card">
                        <header class="modal-card-head">
                          <p class="modal-card-title">{{$message->article->title ?: null}}</p>
                          <button class="delete" aria-label="close"></button>
                        </header>
                        <section class="modal-card-body">
                            <figure class="image is-128x128">
                              <img src="{{$message->image}}" alt ="">
                            </figure>                        
                         </section>
                        <footer class="modal-card-foot">
                            フィードバック
                      {{$message2->get_reply($message->user->id,$message->article->id)}}
                      
                      
                        </footer>
                      </div>
                    </div>
                   </td>                     
                   
               </tr>
               @endforeach
            </table>
        </div>
        <div class="column">
            
        </div>
        
      </div>
      
      <style>
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
