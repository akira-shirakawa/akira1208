<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
   
      <div class="columns">
        <div class="column ">
            
  
        </div>
        <div class="column is-one-third">
            <div class="card">
                <div class="card-image">
                  <figure class="image is-4by3">
                    <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
                  </figure>
                </div>
                <div class="card-content">
                 
              
                  <div class="content">
                   <form action="../question" method="post">
                       {{csrf_field()}}
                      <input class="input" type="text" placeholder="タイトル" name="title">
                        <div class="select">
                          <select>
                            <option>English</option>
                            <option>Math</option>
                          </select>
                        </div> 
                        <div class="file">
                          <label class="file-label">
                            <input class="file-input" type="file" name="resume">
                            <span class="file-cta">
                              <span class="file-icon">
                                <i class="fas fa-upload"></i>
                              </span>
                              <span class="file-label">
                                 問題の画像を添付（任意）
                              </span>
                            </span>
                          </label>
                        </div>                        
                       <textarea class="textarea" placeholder="問題文"></textarea>
                       <input class="input" type="text" placeholder="答え" name="option">
                       <input class="input" type="text" placeholder="選択し２" name="option">
                       <input class="input" type="text" placeholder="選択し３" name="option">
                       <input class="input" type="text" placeholder="選択し４" name="option">
                       <input type="submit" value="送信" class="button is-link">
                        <div class="file has-name">
                          <label class="file-label">
                            <input class="file-input" type="file" name="resume">
                            <span class="file-cta">
                              <span class="file-icon">
                                <i class="fas fa-upload"></i>
                              </span>
                              <span class="file-label">
                                音声ファイルを添付（任意）
                              </span>
                            </span>
                            <span class="file-name">
                              Screen Shot 2017-07-29 at 15.54.25.png
                            </span>
                          </label>
                        </div>  
                      <textarea class="textarea" placeholder="解説（任意）"></textarea>
                   </form>
                   <form action="/csv" method="post" name="csv" enctype="multipart/form-data">
                     {{csrf_field()}}
                     
                      <div class="file has-name">
                        <label class="file-label">
                          <input class="file-input" type="file" name="csv">
                          
                          <span class="file-cta">
                            <span class="file-icon">
                              <i class="fas fa-upload"></i>
                            </span>
                            <span class="file-label">
                              Send a csv file
                            </span>
                          </span>
                          <span class="file-name">
                            Screen Shot 2017-07-29 at 15.54.25.png
                          </span>
                        </label>
                      </div>  
                      <input type="submit" value="csvファイルを送信" class="button is-prime">
                   </form>
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

</body>
</html>