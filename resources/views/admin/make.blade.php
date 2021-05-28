<!DOCTYPE html>
<html lang="ja">

<head>
    <title>Tex記法</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
 <script type="text/javascript" src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"> </script> 

   
   
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
</head>
<style>
    *,
    *:before,
    *:after {
        box-sizing: border-box;
    }





    #preview {
        background-color: white;
        white-space: pre-wrap;
    }
</style>

<body>
   
    <div class="columns is-mobile">
        <div class="column is-half "> 
         <p>
  <button class="button bold">B</button><button class="button h2">H2</button><button class="button a">A</button><button class="button wp2">wrap</button> 
         </p>
            <form action="/make" method="post">
              {{ csrf_field() }}
                <input class="input" type="text" placeholder="title" name="title" required>
                <input class="input" type="text" placeholder="category" name="category" required>
                <div class="select">
                  <select name="subject">
                    <option value="0">数学</option>
                    <option value="1">英語</option>
                    <option value="2">理科</option>
                    <option value="3">地理</option>
                    <option value="10">解説</option>
                  </select>
                </div>
                <textarea id="inputform" class="input-area textarea" name="content" rows="30"   type="textarea" required>

                </textarea>
 
                <input type="radio" name="homework_flag" value="0" checked="checked">公開
                <input type="radio" name="homework_flag" value="1">非公開（下書きとして保存）
              　
                  <input type="submit" class="button is-link"> 
                    <input type="hidden" value="{{ Auth::id() }}" name="admin_id">
            </form>
        </div>
        <div class="column is-half ">
            <div id="preview" class="input-area">
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/admin/make.js') }}"></script>
 <script>


</script>
</body>

</html>