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
  }, 100);
}

function showFunctie() {
  //check of de dag al is ingediend
  console.log('test123');
  //als de dag nog niet is ingediend laat dan de popup zien
  // var dag = 
  // .style.display = "block";

}

function wijzigFunctie() {
  //update de dag waar een karakter is gewijzigd
}