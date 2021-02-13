<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <title>Document</title>
</head>
<body> 
    <div class="columns">
        <div class="column"></div>
        <div class="column ls-half">
            <div class="card">
                <div class="card-content">
                  <div class="content"> 
                    <table class="table"> 
                        @foreach($message as $message) 
                         <tr>
                             <td>{{$message->title}}</td>
                             <td>{{$message->created_at}}</td>
                             <td>
                                 <form action="../article" method="post">
                                     {{csrf_field()}}
                                     <input type="hidden" value="{{$message->id}}" name="id">
                                     <input type="submit" class="button" value="送信">
                                 </form>
                             </td>
                         </tr>
                        @endforeach 
                   </table>
                  </div>
                </div>
              </div> 
        </div>
        <div class="column"></div>
    </div>
</body>
</html>