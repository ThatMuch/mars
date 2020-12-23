/*!
 * Essential javascript functions/variables
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s_1.0.0.0
 *
 */

/*==================================================================================
  General Variables & Presets
==================================================================================*/


/* Viewport Width
/––––––––––––––––––––––––*/
var $vpWidth = jQuery(window).width();

/* Touch Device
/––––––––––––––––––––––––*/
var $root = $('html');
var isTouch = 'ontouchstart' in document.documentElement;
if (isTouch) {
  $root.attr('data-touch', 'true');
} else {
  $root.attr('data-touch', 'false');
}


/* Debouncer
/––––––––––––––––––––––––*/
// prevents functions to execute to often/fast
// Usage:
// var myfunction = debounce(function() {
//   // function stuff
// }, 250);
// window.addEventListener('resize', myfunction);
function debounce(func, wait, immediate) {
  var timeout;
  return function() {
    var context = this, args = arguments;
    var later = function() {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };
    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
}
/* Collapse accordeon */
jQuery('.accordion .card-header').click(function() {
  jQuery(this).toggleClass('active').find('i').toggleClass('fa-plus fa-minus')
         .closest('section').siblings('section')
         .removeClass('active').find('i')
         .removeClass('fa-minus').addClass('fa-plus');

});


/* Images */


let imgCircle = document.getElementsByClassName('img-circle');
console.log(imgCircle);
Array.from(imgCircle).forEach(img => {
  let wrapper = document.createElement('div');
  wrapper.classList.add('img-box', 'img-shadow')

  img.parentNode.insertBefore(wrapper, img);
  wrapper.appendChild(img);
});


/* Section Text-Image */

let sections = document.getElementsByClassName('section-text-image');
let arraySection = Array.from(sections);

for (let index = 0; index < arraySection.length; index++) {
  if (index % 2 !== 0) {
    arraySection[index].getElementsByClassName('row')[0].classList.add('flex-row-reverse');
      }
  }