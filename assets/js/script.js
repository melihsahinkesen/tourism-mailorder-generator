// Sticky Header & Scrool Animation
var header = document.getElementById("header");
var headerHeight = document.getElementById('header').offsetHeight;
var fullBgHeader = document.getElementById('full-bg-header');
var footer = document.getElementById('footer');

$(window).on('resize', function() {
  var headerHeight = document.getElementById('header').offsetHeight;
});

$(window).scroll(function(){
  if( $(window).scrollTop() > headerHeight ) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
});

if (fullBgHeader) {
  header.style["margin-bottom"] = "0";
  header.style.position = "absolute";
  header.classList.add("head-light");
  footer.style["margin-top"] = "0";
}

// Change and Activate Navigation Info
var scroll_offsets = $('[data-spy]').map(function(){
  return {
    offset: $(this).offset().top,
    status: $(this).data("name"),
    height: $(this).outerHeight()
  };
});

$(window).on('scroll resize', function() {
  var offset = $(window).scrollTop();
  for (var i=scroll_offsets.length-1; i>=0; i--) {
    // console.log(offset);
    // console.log(scroll_offsets.offset);
    if(offset > scroll_offsets[i].offset && 
    	scroll_offsets[i].height+scroll_offsets[i].offset > offset && 
    	scroll_offsets[i].status != "") {
      console.log(scroll_offsets[i].status);
      //console.log(scroll_offsets[i].offset);
      header.classList.add("info-active");
      $('#nav-info-text').text( scroll_offsets[i].status );
      return;
    } else { header.classList.remove("info-active"); }
  }
});


// Makes sure the whole site is loaded 
$(window).on('load', function() {
  // Preload
	document.querySelector('body').classList.remove('p-loading');
  console.log("Page has been loaded.");
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip({html:true})
})

$(function () {
  $('[data-toggle="popover"]').popover()
})
/*
$('.popover-duyuru').popover({
  trigger: 'focus'
})
*/

$(document).ready(function () {
  // Mask
  $('.time').mask('00:00', {placeholder: "__ : __"});
  $('.date-mask').mask('00/00/0000', {placeholder: "Gün / Ay / Yıl"});
  $('.voucher-no').mask('AAAAAAAAAA', {placeholder: "TK123456"});
  $('.fly-ticket-pnr').mask('AAAAAA', {placeholder: "X0000X"});
  $('.fly-ticket-no').mask('AAAAAAAAAAAAA', {placeholder: "0000000000000"});
  $('.phone-us').mask('(Z00) 000-0000', {
    placeholder: "( ___ ) ___ - ____",
    translation: {
      'Z': { pattern: /[1-9]/, optional: false }
    }
  });
  $('.tc-no').mask('00000000000', {placeholder: "12345678910"});
  $('.money').mask('000.000.000.000.000', {reverse: true});
  $('.just-text').mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {placeholder: "ör: Bonus 6 Taksit"});
  $('.fly-code').mask('XX-0000', {
    placeholder: "AA-0123",
    translation: {
      'X': { pattern: /[a-zA-Z]/, optional: false }
    }
  });
});

$('.btn-clipboard').tooltip({
  trigger: 'click',
  placement: 'bottom'
});

function setTooltip(btn, message) {
  $(btn).tooltip('hide')
    .attr('data-original-title', message)
    .tooltip('show');
}

function hideTooltip(btn) {
  setTimeout(function() {
    $(btn).tooltip('hide');
  }, 1000);
}

$(document).ready(function(){
  // Add scrollspy to <body>
  $('body').scrollspy({target: "#navbar-example3", offset: 110});   

  // Add smooth scrolling on all links inside the navbar
  $("#navbar-example3 a").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top - 105
      }, 600, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash -105;
      });
    }  // End if
  });
});

const allRanges = document.querySelectorAll(".range-wrap");
allRanges.forEach(wrap => {
  const range = wrap.querySelector(".range");
  const bubble = wrap.querySelector(".bubble");

  range.addEventListener("input", () => {
    setBubble(range, bubble);
  });
  setBubble(range, bubble);
});

function setBubble(range, bubble) {
  const val = range.value;
  const min = range.min ? range.min : 0;
  const max = range.max ? range.max : 100;
  const newVal = Number(((val - min) * 100) / (max - min));
  bubble.innerHTML = val;
}