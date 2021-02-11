$(function(){
 
    var quizArea = $('.quiz_area'); //クイズを管理するDOMを指定
    var quiz_html = quizArea.html(); //もう一度　を押した時に元に戻すため初期HTMLを変数で保管
    var quiz_cnt = 0; //現在の問題数を管理
    var quiz_fin_cnt = 10; //何問で終了か設定（クイズ数以下であること）
    var quiz_success_cnt = 0; //問題の正解数
    let my_select = [];
    let corr =[];
    let quiz_cash =[];

    //クイズの配列を設定
    //answerの選択肢の数はいくつでもOK　ただし先頭を正解とすること(出題時に選択肢はシャッフルされる)
    var aryQuiz = p;
   
    
    quizReset();
   
    
    //回答を選択した後の処理
    quizArea.on('click', '.quiz_ans_area ul li', function(){
            quizArea.find('.quiz_area_icon').addClass('true');
       const se=new Audio('https://akira32310901.s3.amazonaws.com/Quiz-Correct_Answer02-1.mp3'); 
                   se.play();        
        //画面を暗くするボックスを表示（上から重ねて、結果表示中は選択肢のクリックやタップを封じる
        quizArea.find('.quiz_area_bg').show();
        //選択した回答に色を付ける
        $(this).addClass('selected');
       my_select.push($(this).text());
        if($(this).data('true')){
            //正解の処理 〇を表示
 
            //正解数をカウント
            quiz_success_cnt++;
             $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "../../log",
                    type: 'POST',
                    data:{'question_id':aryQuiz[quiz_cnt]['id']}
                })
                // Ajaxリクエストが成功した場合
                .done(function(data) {
                    console.log(data);
                
                
                 
                })
                
                .fail(function(data) {
                    alert('失敗');
                });            
        }else{
            //不正解の処理
            const wrong = new Audio('https://akira32310901.s3.amazonaws.com/Quiz-Wrong_Buzzer02-1.mp3');
            wrong.play();
            quizArea.find('.quiz_area_icon').addClass('false');
        }
        setTimeout(function(){
            //表示を元に戻す
            quizArea.find('.quiz_ans_area ul li').removeClass('selected');
            quizArea.find('.quiz_area_icon').removeClass('true false');
            quizArea.find('.quiz_area_bg').hide();
          
            //問題のカウントを進める
            quiz_cnt++;
            if(quiz_fin_cnt > quiz_cnt){
                //次の問題を設定する
                quizShow();
            }else{
                //結果表示画面を表示
                quizResult();
            }
        }, 1000);
    });
    
    //もう一度挑戦するを押した時の処理
    quizArea.on('click', '.quiz_restart', function(){
        quizReset();
    });
    
    //リセットを行う関数
    function quizReset(){
        quizArea.html(quiz_html); //表示を元に戻す
        quiz_cnt = 0;
        quiz_success_cnt = 0;
        aryQuiz = arrShuffle(aryQuiz); //毎回出題の順番をシャッフルしたい場合はここのコメントを消してね
        quizShow();
    }
    
    //問題を表示する関数
    function quizShow(){
        //何問目かを表示
        quizArea.find('.quiz_no').text((quiz_cnt + 1));
        //問題文を表示
        quizArea.find('.quiz_question').text(aryQuiz[quiz_cnt]['question']);
        pronounce(aryQuiz[quiz_cnt]['question']);
        //正解の回答を取得する
        var success = aryQuiz[quiz_cnt]['answer'][0];
          corr.push(success); 
          quiz_cash.push(aryQuiz[quiz_cnt]['question']);
        //現在の選択肢表示を削除する
        quizArea.find('.quiz_ans_area ul').empty();
        //問題文の選択肢をシャッフルさせる(自作関数) .concat()は参照渡し対策
        var aryHoge = arrShuffle(aryQuiz[quiz_cnt]['answer'].concat());
        //問題文の配列を繰り返し表示する
        $.each(aryHoge, function(key, value){
            var fuga = '<li>' + value + '</li>';
            //正解の場合はdata属性を付与する
            if(success === value){
                fuga = '<li data-true="1">' + value + '</li>';
            }
            quizArea.find('.quiz_ans_area ul').append(fuga);
        });
    }
    
    //結果を表示する関数
    function quizResult(){
        quizArea.find('.quiz_set').hide();
        var text = quiz_fin_cnt + '問中' + quiz_success_cnt + '問正解！';
        if(quiz_fin_cnt === quiz_success_cnt){
            text += '<br>全問正解おめでとう！';
        }
        text += '<br><input type="button"    value="もう一度挑戦する" class="button quiz_restart p-10">';
        text += '<br><a href="../1" class="button">一覧に戻る</a>';   
        text += (show_result(corr,my_select,quiz_cash)); 
        corr = [];
        my_select =[];
        quiz_cash = [];
        quizArea.find('.quiz_result').html(text);
        quizArea.find('.quiz_result').show();
    }
    
    //配列をシャッフルする関数
    function arrShuffle(arr){
        for(i = arr.length - 1; i > 0; i--){
            var j = Math.floor(Math.random() * (i + 1));
            var tmp = arr[i];
            arr[i] = arr[j];
            arr[j] = tmp;
        }
        return arr;
    }
 function pronounce(au) {

    let word = au;
    let u = new SpeechSynthesisUtterance(word);
    var voices = speechSynthesis.getVoices();
   voices.forEach(function(v, i){
        //イタリア人風
        if(v.name == 'Google US English' || v.name =="Karen") u.voice = v;
    });    
   speechSynthesis.speak(u);

  }
  function show_result(array1,array2,array3){
      let correct_or_not =[];
      let count = corr.length;
      let tmp_str ='';
      
      for(i=0;i<=count-1;i++){
          let dudge = (array1[i] == array2[i]) ? '〇' : '✖';
          let tmp='<tr><td>'+String(array3[i])+'</td><td>'+String(array1[i])+'</dt><td>'+String(array2[i])+'</td><td>'+dudge+'</td></tr>';
          tmp_str+=tmp;
      }
      return '<table class="table"><tr><td>問題</td><td>正解</dt><td>あなたの回答</td><td>正誤</td></tr>'+tmp_str+'</table>';
  }
});