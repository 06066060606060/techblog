function toggleNav() {
  var updateElement2 = document.getElementById("cat2");
  var updateElement3 = document.getElementById("cat3");
  var updateElement4 = document.getElementById("cat4");
  var updateElement5 = document.getElementById("cat5");
  updateElement2.classList.toggle("active");
  updateElement3.classList.toggle("active");
  updateElement4.classList.toggle("active");
  updateElement5.classList.toggle("active");
}

function fonctionCom() {
  var updateElement = document.getElementById("forms1");
  updateElement.classList.toggle("active");
}

function on() {
  document.getElementById("overlay").style.display = "block";
  document.getElementById("login").style.visibility = "visible";
  document.getElementById("login").style.zIndex = "2";
}

function off() {
  document.getElementById("overlay").style.display = "none";
  document.getElementById("login").style.visibility = "hidden";
  document.getElementById("login").style.zIndex = "-1";
}
