//Laad alle urls met jquery
$('a').click(function(e) {
    e.preventDefault(); // stops the default action of clicking on the link
    var pageToLoad = $(this).attr('href'); // gets the href of the clicked link
    $('#div1').load(pageToLoad); // loads the remote page into the content div without refresh

    //Scroll omhoog bij klik
    $('html, body').animate({scrollTop: 0}, 800);

    //Stop met scrollen bij user input
    $viewport.bind("scroll mousedown DOMMouseScroll mousewheel keyup", function(e){
        if ( e.which > 0 || e.type === "mousedown" || e.type === "mousewheel"){
            $viewport.stop().unbind('scroll mousedown DOMMouseScroll mousewheel keyup'); // This identifies the scroll as a user action, stops the animation, then unbinds the event straight after (optional)
        }
    });
});