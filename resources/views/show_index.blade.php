
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
  <div class="box3">
  <img src="{{Auth::user()->image ?? "https://bulma.io/images/placeholders/128x128.png"}}">
  </div>
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
    <div class="columns is-desktop">
        <div class="column is-half is-offset-one-quarter">
            @if($id == 0) 
            <article class="panel is-danger">
              <p class="panel-heading">
                公式集 
              </p>
            
              <div class="panel-block">
               <button class="js-math1 button">数学１</button>
               <button class="js-math2 button">数学A</button>
               <button class="js-math3 button">数学2</button>
               <button class="js-math4 button">数学B</button>
              </div>
            
            
            </article>           
          @endif 
              @foreach($message as $key=>$message)
           <article class="panel is-success">
                <p class="panel-heading">
                 {{$key}}
                </p> 
               
                <div class="panel-block is-flex-wrap-wrap">
                    @foreach($message as $message)
                    <div class="items2">
                      <div class="content"> <a href="show/{{$message['id']}}">{{$message['title']}}</a></div> 
                      @auth
                      <div class="statue{{$message3->return_statue(Auth::id(),$message['id'])}}"> <i class="fas fa-check"></i></div>
                      @endauth 
                    </div>
                  @endforeach
                </div>
               
              
              </article>
              @endforeach
<div class="modal modal-1 ">
  <div class="modal-background"></div>
  <div class="modal-content">
<div class="has-background-white">
<article class="panel is-danger">
  <p class="panel-heading">
    展開と因数分解
  </p>
  <a class="panel-block ">
    $acx^2+(ad+bc)x+bd=(ax+b)(cx+d)$   
  </a>
  <a class="panel-block ">
    $a^3+3a^2b+3ab^2+b^3=(a+b)^3$  
  </a>
  <a class="panel-block ">
    $a^2+b^2+c^2+2ab+2bc+2ac=(a+b+c)^2$ 
  </a>
  <a class="panel-block ">
    $a^3+b^3+c^3-3abc=(a+b+c)(a^2+b^2+c^2-ab-ac-bc)$ 
  </a>

</article>    
<article class="panel is-danger">
  <p class="panel-heading">
    2次関数2次方程式
  </p>
  <a class="panel-block ">
    判別式$D=b^2-4ac$    
  </a>
 

</article>    
<article class="panel is-danger">
  <p class="panel-heading">
    図形と計量
  </p>
  <a class="panel-block ">
    $sin^2\theta+cos^2\theta=1$ 
  </a>
  <a class="panel-block ">
    $tan\theta=\frac{sin\theta}{cos\theta}$ 
  </a>
  <a class="panel-block ">
    $tan^2\theta+1=\frac{1}{cos^2\theta}$ 
  </a>
  <a class="panel-block ">
    $\frac{sinA}{a}=\frac{sinB}{b}=\frac{sinC}{C}$ 
  </a>
  <a class="panel-block ">
    $a^2=b^2+c^2-2bccosA$
  </a>
  <a class="panel-block ">
    $cosA=\frac{b^2+c^2-a^2}{2bc}$ 
  </a>
  <a class="panel-block ">
   $S=\frac{1}{2}bcsinA$
  </a>
  
</article>    
</div>
  </div>
  <button class="modal-close is-large" aria-label="close"></button>
</div>              
<div class="modal modal-2">
  <div class="modal-background"></div>
  <div class="modal-content">
<div class="has-background-white">
<article class="panel is-danger">
  <p class="panel-heading">
    集合と確率
  </p>
  <a class="panel-block ">
    $A\cup B = A+B-A\cap B $  
  </a>
 
 
</article>    
<article class="panel is-danger">
  <p class="panel-heading">
    図形
  </p>
  <a class="panel-block ">
    $PA*PB=PC*PD$  
  </a>
  <a class="panel-block "> 
    $PA*PB = PT^2$
  </a>
  <a class="panel-block ">
    $\frac{AR}{RB} \frac{BO}{OQ} \frac{CQ}{QA}$
  </a>
 
 
</article>    
</div>
  </div>
  <button class="modal-close is-large" aria-label="close"></button>
</div>              
<div class="modal modal-3">
  <div class="modal-background"></div>
  <div class="modal-content">
<div class="has-background-white">
<article class="panel is-danger">
  <p class="panel-heading">
    図形と方程式
  </p>
  <a class="panel-block ">
    $a+b > 2\sqrt{ab} $ 
  </a>
  <a class="panel-block ">
    $\sqrt{(x_1-x_2)^2+(y_1-y_2)^2}$ 
  </a>
  <a class="panel-block ">
    $d = \frac{|ax+by+c|}{\sqrt{a^2+b^2}} $ 
  </a>
  <a class="panel-block ">
    $(\frac{nx_1+mx_2}{m+n},\frac{ny_1+my_2}{m+n})$ 
  </a>
  <a class="panel-block ">
    $(x_1-a)(x-a)+(y_1-b)(y-b) =r^2$ 
  </a>
 
 
</article>    
<article class="panel is-danger">
  <p class="panel-heading">
    三角関数
  </p>
  <a class="panel-block ">
    $sin(\alpha+\beta) = cos\alpha sin\beta+cos\beta sin\alpha $ 
  </a>
  <a class="panel-block ">
    $cos(\alpha+\beta) = cos\alpha cos\beta - sin\alpha cos\beta$ 
  </a>
 
</article>    
</div>
  </div>
  <button class="modal-close is-large" aria-label="close"></button>
</div>              
<div class="modal modal-4">
  <div class="modal-background"></div>
  <div class="modal-content">
<div class="has-background-white">
<article class="panel is-danger">
  <p class="panel-heading">
    ベクトル
  </p>
  <a class="panel-block ">
    ベクトルの垂直条件$\vec{a} \bullet \vec{b} = 0$
  </a>
  <a class="panel-block ">
    $\vec{AB} = t \vec{AC}$ 
  </a>
  <a class="panel-block ">
    $cos\theta= \frac{\vec{a}\bullet\vec{b}}{|\vec{a}||\vec{b}|} $ 
  </a>
  <a class="panel-block ">
    $P= (1-t)\vec{a} + t\vec{b}$ 
  </a>
  <a class="panel-block ">
   $\vec{AP} =s \vec{AB}+t\vec{AC}$ 
  </a>
 
</article>    
<article class="panel is-danger">
  <p class="panel-heading">
    数列
  </p>
  <a class="panel-block ">
    $a_n = a+(n-1)d$ 
  </a>
  <a class="panel-block ">
   $S_n = \frac{n(a_1 + a_n)}{2}$ 
  </a>
  <a class="panel-block ">
   $a_n = ar^{n-1}$
  </a>
  <a class="panel-block ">
   $S_n = \frac{a(1-r^n)}{1-r}$  
  </a>
  <a class="panel-block ">
  $\sum_{k=1}^n 1= n$ 
  </a>
  <a class="panel-block ">
 $\sum_{k=1}^n k = \frac{1}{2}n(n+1)$  
  </a>
  <a class="panel-block ">
 $\sum_{k=1}^n  k^2 = n(n+1)(2n+1)$ 
  </a>
 
</article>    
</div>
  </div>
  <button class="modal-close is-large" aria-label="close"></button>
</div>              
        </div> 
      </div>
  <script>
    $('.js-math1').click(function(){
     
        $('.modal-1').toggleClass('is-active');  
    })
    $('.js-math2').click(function(){
     
        $('.modal-2').toggleClass('is-active');  
    })
    $('.js-math3').click(function(){
     
        $('.modal-3').toggleClass('is-active');  
    })
    $('.js-math4').click(function(){
     
        $('.modal-4').toggleClass('is-active');  
    })
    $('.modal-background').click(function(){
        $('.modal-1').removeClass('is-active');
        $('.modal-2').removeClass('is-active');
        $('.modal-3').removeClass('is-active');
        $('.modal-4').removeClass('is-active'); 
    })
  </script>
      <style>
  body{
      font-family: '游ゴシック', YuGothic, 'メイリオ', Verdana, 'Hiragino Kaku Gothic ProN', Meiryo, sans-serif;
  }  
            .box3 {
    width: 30px;
    padding-top: 30px;     
    position: relative;
   
}
.box3>img{
       width: 100%;
       height: 100%; 
       position: absolute;
       top: 0;
       object-fit: cover;
       border-radius: 50%;
} 
      .content{
          width:75%; 
      }
      .statue{
          width:14%; 
          height:45px; 
          text-align:center;
          vertical-align: middle; 
          border-radius:5px;   
          background:#eee; 
          
         
      }
      .statue1{
          width:14%; 
          height:45px; 
          text-align:center;
          vertical-align: middle;
         border-radius:5px;   
          background:#bfefec;  
         
      }
      .statue2{
          width:14%; 
          height:45px;
        border-radius:5px;   
          text-align:center;
          vertical-align: middle; 
          background:#ff3979;  
         
      }
          .items2{
              display:flex;
              width:50%;
              padding:20px,0,10px,0; 
              font-size:1.5rem;
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