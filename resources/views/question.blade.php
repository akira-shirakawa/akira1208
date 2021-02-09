<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta name="csrf-token" content="{{ csrf_token() }}">
       
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <link rel="stylesheet" href="{{ asset('css/question.css')}}">
    
    <title>Document</title>
</head>
<body>
<div class="columns">
    <div class="column"></div>
    <div class="column is-half">
   <div class="quiz_area">
    <div class="quiz_set">
        第<span class="quiz_no">0</span>問
        <div class="quiz_question"></div>
        <div class="quiz_ans_area">
            <ul></ul>
        </div>
        <div class="quiz_area_bg"></div>
        <div class="quiz_area_icon"></div>
    </div>
    <div class="quiz_result"></div>
</div>       
    </div>
    <div class="column"></div>
</div>

<?php
   $php_json = json_encode( $array);	
?>
<script>
var p = JSON.parse('<?php echo $php_json; ?>');    
</script>
<style>
    html{
        text-align:center; 
    }
</style>
   <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js?ver=1.12.4'></script>
  <script src="{{ asset('js/question.js') }}"></script>
</body>
</html>