<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="columns">
        <div class="column"></div>
        <div class="column is-half">
            <article class="panel is-danger">
                <p class="panel-heading">
                  Tasks
                </p>
               
               
                <a class="panel-block is-active" href="homework">
                  <span class="panel-icon">
                    <i class="fas fa-book" aria-hidden="true"></i>
                  </span>
                  homework
                </a>
                <a class="panel-block" href="question">
                  <span class="panel-icon">
                    <i class="fas fa-book" aria-hidden="true"></i>
                  </span>
                  question
                </a>
                <a class="panel-block" href="make">
                  <span class="panel-icon">
                    <i class="fas fa-book" aria-hidden="true"></i>
                  </span>
                  Article
                </a>
                <a class="panel-block">
                  <span class="panel-icon">
                    <i class="fas fa-book" aria-hidden="true"></i>
                  </span>
                  User
                </a>
              </article>
              <div class="card">
                <div class="card-content">
                  <div class="content">
                      <h2 class="title">message</h2>
                      <form action="../notification" method="post">
                          {{csrf_field()}}
                        <textarea class="textarea" name="content" placeholder="e.g. Hello world"></textarea>
                        <input class="input" type="text" name="link" placeholder=" url"> 
                        <div class="control">
                            <label class="radio">
                              <input type="radio" name="flag" value="1">
                              個別
                            </label>
                            <label class="radio">
                              <input type="radio" name="flag" value="2">
                              オープン
                            </label>
                          </div>
                        <div class="file">
                          <label class="file-label">
                            <input class="file-input" type="file" name="resume">
                            <span class="file-cta">
                              <span class="file-icon">
                                <i class="fas fa-upload"></i>
                              </span>
                              <span class="file-label">
                                Image 
                              </span>
                            </span>
                          </label>
                        </div>                          
                          <input type="submit" class="button">
                      </form>
                  </div>
                </div>
              </div>
        </div>
        <div class="column"></div>
    </div>
</body>
</html>

                  
 