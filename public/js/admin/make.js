function blinkBlue(){
    var sel = window.getSelection();
    console.log(sel);
    if(!sel.rangeCount) return; //範囲選択されている箇所がない場合は何もせず終了
  
    var range = sel.getRangeAt(0);
    var newNode = document.createElement('span');
    newNode.setAttribute('style', 'background-color: blue;'); //範囲選択箇所の背景を青にする
    newNode.innerHTML = sel.toString();
    range.deleteContents();    // 範囲選択箇所を一旦削除
    range.insertNode(newNode); // 範囲選択箇所の先頭から、修飾したspanを挿入
  }

document.getElementById('inputform').addEventListener('keyup', (e) => {
  var inputTopreview = document.getElementById('inputform').value;
  document.getElementById('preview').innerHTML = document.getElementById('inputform').value;
  MathJax.Hub.Queue(["Typeset", MathJax.Hub, 'preview']);
});



//.value.replace(/</g, "&lt;").replace(/>/g, "&gt;")