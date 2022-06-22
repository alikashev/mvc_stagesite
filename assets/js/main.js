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

// function showFunctie(dag) {
//     var idName = 'ext' + dag;
//     var dag = document.getElementById(idName);
//
//     // if(dag.classList.contains('ingediend0')) {
//         if(dag.style.display === "none") {
//             dag.style.display = "block";
//         } else {
//             dag.style.display = "none";
//         }
//         console.log(dag);
//         console.log(dag.style.diplay);
//     // }
// }

function showFunctie(dag) {
  var idName = 'ext' + dag;
  var dag = document.getElementById(idName);

  // if(dag.classList.contains('ingediend0')) {
  if(dag.classList.contains('hidden')) {
    dag.classList.remove('hidden');
    dag.classList.add('open');
  } else if (dag.classList.contains('open')) {
    dag.classList.remove('open');
    dag.classList.add('hidden');
  } else {
    dag.classList.add('open');
  }
  console.log(dag);
  // }
}

function wijzigNummerFunctie(id, nummer) {
    console.log(id, nummer);
    // $.ajax({
    //     url: "../../controller/LogboekController/wijzigNummer/" + id + "/" + nummer,    //the page containing php script
    //     type: "post",
    //     dataType: 'json',
    //     data: {registration: "success", name: "xyz", email: "abc@gmail.com"},
    //     success:function(result){
    //         console.log(result.abc);
    //     }
    // });
}

$(document).ready(function(){
  $('.customer-logos').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1000,
    arrows: false,
    dots: false,
    pauseOnHover: false,
    responsive: [{
      breakpoint: 768,
      settings: {
        slidesToShow: 4
      }
    }, {
      breakpoint: 520,
      settings: {
        slidesToShow: 3
      }
    }]
  });
});