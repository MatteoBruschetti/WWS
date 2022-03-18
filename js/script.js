jQuery(document).ready(function () {

    jQuery(window).on("scroll", function() {
        //add navbar shadow
        if(jQuery(this).scrollTop() > 50) {
            jQuery("#navigation").addClass("scrolled");
        } else {
           jQuery("#navigation").removeClass("scrolled");
        }
    });

    //Hamburger menu
    jQuery('.hamburger').click(function () {
        jQuery('.hamburger').toggleClass('is-active');
        jQuery(this).parent().parent().parent('.container').toggleClass('open');
    });

});