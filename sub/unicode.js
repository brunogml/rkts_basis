
function tib(selector)
{
    var elements = document.querySelectorAll(selector);
    for (var i = 0; i < elements.length; i++) {
        elements[i].innerHTML = elements[i].innerHTML.replace(/a/g,'e');
        elements[i].style.fontSize = "xx-large";
   }
}

function wylie() {
  location.reload();
}
