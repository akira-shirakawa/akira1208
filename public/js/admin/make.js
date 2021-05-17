let text;
document.getElementById('inputform').addEventListener('keyup', (e) => {
  
  var inputTopreview = document.getElementById('inputform').value;
 
  document.getElementById('preview').innerHTML = document.getElementById('inputform').value;
  MathJax.Hub.Queue(["Typeset", MathJax.Hub, 'preview']);
});

$('.textarea').select(function(){
  var sel = window.getSelection().toString();
  text=sel;
}); 

$('.bold').click(function(){
  var str1 = $('textarea[name="content"]').val();
 const replacement =' <span style="color: red; background: yellow">'+text+'</span>'; 
 str1=str1.replace(text,replacement); 
 $('textarea[name="content"]').val('');
 $('textarea[name="content"]').val(str1); 

});
$('.h2').click(function(){
  var str1 = $('textarea[name="content"]').val();
 const replacement =' <h2 class="title">'+text+'</h2>';  
 str1=str1.replace(text,replacement); 
 $('textarea[name="content"]').val('');
 $('textarea[name="content"]').val(str1); 

});
$('.a').click(function(){
  var str1 = $('textarea[name="content"]').val();
 const replacement ='<div class="columns"><div class="column is-one-fifth">test</div><div class="column"><div style="border: solid 2px #333;background:#eee;padding:20px;border-radius:4px">'+text+'</div></div></div>';           
 str1=str1.replace(text,replacement);  
 $('textarea[name="content"]').val('');
 $('textarea[name="content"]').val(str1); 

});

$('.wp2').click(function(){ 
    console.log('hoge'); 
  var str1 = $('textarea[name="content"]').val();
 const replacement ='<div style="padding:30px;border :2px solid #f00">'+text+'</div>';      
 str1=str1.replace(text,replacement);  
 $('textarea[name="content"]').val('');
 $('textarea[name="content"]').val(str1); 

});