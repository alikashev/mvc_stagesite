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

  function loadPage1(url) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      document.querySelector(".content-section").innerHTML =
      this.responseText;
    }
    xhttp.open("GET", url);
    xhttp.send();
  }

function scrollFunctie() {
  setTimeout(function() {
      var my_element = document.getElementById('huidigeDag');
      console.log(my_element);
      my_element.scrollIntoView({
        behavior: 'smooth',
        block: 'start',
        inline: 'nearest'
      });
  }, 5000);
}