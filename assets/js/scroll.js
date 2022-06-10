function scrollFunctie() {
    var my_element = document.getElementById('huidigeDag');
    
    my_element.scrollIntoView({
        behavior: 'smooth',
        block: 'start',
        inline: 'nearest'
    });
}