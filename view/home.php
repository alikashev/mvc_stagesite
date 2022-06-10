<?php include_once 'view/sidebar.php'; ?>
<img class='balk' src="assets/img/blauwe_balk_links.svg" alt="">
<div class="content-section">
  <div class="text-section">
    <h2>Welkom op Volgstage</h2> <br>
    <p>
      Door vele jaren stagebegeleiding heeft Volgstage de meest overzichtelijke en gebruiksvriendelijke oplossing gebouwd. <br>
      Wij hebben geluisterd naar alle knelpunten tijdens de corona tijd en ons platform zowel voor online als offline gebruik geperfectioneerd. <br> <br>
      •   Voor de school, student, stagebedrijf en ouder! <br> <br>
      •   Test gratis onze demo omgeving! <br> <br>
      •   Neem contact op voor een offerte op maat! <br> <br>
      •   Ons team en systeem ontzorgen u graag! <br> <br>
      •   Coaching voor nieuwe stagiaires en begeleiders<br> <br>
      •   Springplank voor de vervolgstap na afronding <br> <br>
    </p>
  </div>          
</div>  
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();

    // You can also pass an optional settings object
// below listed default settings
AOS.init({
  // Global settings:
  disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
  startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
  initClassName: 'aos-init', // class applied after initialization
  animatedClassName: 'aos-animate', // class applied on animation
  useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
  disableMutationObserver: false, // disables automatic mutations' detections (advanced)
  debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
  throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
  

  // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
  offset: 120, // offset (in px) from the original trigger point
  delay: 0, // values from 0 to 3000, with step 50ms
  duration: 400, // values from 0 to 3000, with step 50ms
  easing: 'ease', // default easing for AOS animations
  once: false, // whether animation should happen only once - while scrolling down
  mirror: false, // whether elements should animate out while scrolling past them
  anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

});
</script>
<?php require_once 'footer.php'?>
</body>
</html>