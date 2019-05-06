/*Boto menú*/
/*btnm es el botó que surt per mostrar el menú
btna està display:none i quan la funció actua el fa apareixer*/
function mostra(){
  document.getElementById('lateralfull').style.display = "block";
setTimeout(
    function(){document.getElementById('lateralfull').style.opacity = "1";});}
/*el mateix peró al revés*/
function amaga(){
  document.getElementById('lateralfull').style.opacity = "0";
setTimeout(
    function(){
  document.getElementById('lateralfull').style.display = "none";

});
}
