var $toggleButton = jQuery('.gp-checkbox');
var wrapper = document.getElementById('site-wrapper');
if (localStorage.getItem('darkmode') === 'true') {
wrapper.setAttribute('class', 'dark');
jQuery( '.theme-switch' ).addClass('checked');
}

(function darkMode() {
function toggleDarkMode() {
var $wrap = jQuery('#site-wrapper');
if (!$wrap.hasClass('dark')) {
$wrap.addClass('dark');
localStorage.setItem('darkmode', 'true');
jQuery( '.theme-switch' ).addClass('checked');
} else {
$wrap.removeClass('dark');
localStorage.removeItem('darkmode');
jQuery( '.theme-switch' ).removeClass('checked');
}
}
$toggleButton.on('click', toggleDarkMode);
})();

 
 
 
