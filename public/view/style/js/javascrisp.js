
jQuery(document).ready(function() {
    jQuery(".close-popup").click(function() {
        jQuery(this).closest(".popup-inline").addClass("hidepopup");
    });
});

document.addEventListener('wpcf7mailsent', function(event) {
    jQuery(".popup-inline").addClass("hidepopup");
}, false);