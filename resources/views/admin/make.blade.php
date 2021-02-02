<!DOCTYPE html>
<html lang="ja">

<head>
    <title>Tex記法</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">

    <script type="text/javascript" src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
    </script>
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
          \\(sqrt2\\)
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
                  </select>
                </div>
                <textarea id="inputform" class="input-area textarea" name="content" type="textarea" required>

                </textarea>
                <textarea id="inputform" class="input-area textarea" name="homework" type="textarea" required>

                </textarea>
                
                <div class="control">
                    <label class="radio">
                      <input type="radio" name="homework_flag" value="1">
                      Yes
                    </label>
                    <label class="radio">
                      <input type="radio" name="homework_flag" value="0">
                      No
                    </label>
                  </div>
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
</body>

</html>