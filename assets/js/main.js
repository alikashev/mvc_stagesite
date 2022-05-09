console.log("test");

function loadPage(url) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      document.querySelector(".demo").innerHTML =
      this.responseText;
    }
    xhttp.open("GET", url);
    xhttp.send();
  }