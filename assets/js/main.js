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
      my_element.scrollIntoView({
        behavior: 'smooth',
        block: 'start',
        inline: 'nearest'
      });
  }, 100);
}

function showFunctie(dag) {
    var idName = 'ext' + dag;
    var dag = document.getElementById(idName);

    // if(dag.classList.contains('ingediend0')) {
        if(dag.style.display = "none") {
            dag.style.display = "block";
        } else {
            dag.style.display = "none";
        }
        console.log(dag);
        console.log(dag.style.diplay);
    // }
}

function wijzigNummerFunctie(nummer) {
    
}