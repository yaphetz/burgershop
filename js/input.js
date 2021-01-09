var inputEl = document.getElementsByClassName('input-field');
for (var i = 0; i < inputEl.length; i++) {
  inputEl[i].addEventListener("focus", focusedPlaceholder);
  inputEl[i].addEventListener('blur', blurredPlaceholder);
}


function focusedPlaceholder(e) {
  var targetElement = e.target;
  console.log(targetElement);
  targetElement.parentElement.children[2].className = "border border-focused";
  targetElement.parentElement.children[0].className = "input-placeholder input-placeholder-focused";
}

function blurredPlaceholder(e) {
  var targetElement = e.target;
  if (!targetElement.value) {
    targetElement.parentElement.children[0].className = "input-placeholder input-placeholder-blurred";
  } else {
    targetElement.parentElement.children[0].className = "input-placeholder input-placeholder-blurred-full";
  }
  targetElement.parentElement.children[2].className = "border border-blurred";

}


window.setInterval(function(){
  $("form.input-form h1").text('hello '+clientName+' :)');
  $("#username-field").remove();
  $("#login-button").val('Login as another user');
}, 1000);

