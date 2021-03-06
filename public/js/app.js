(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

//Pure JS, completely customizable preloader from GreenSock.
//Once you create an instance like var preloader = new GSPreloader(), call preloader.active(true) to open it, preloader.active(false) to close it, and preloader.active() to get the current status. Only requires TweenLite and CSSPlugin (http://www.greensock.com/gsap/)
var preloader = new GSPreloader({
  radius: 42,
  dotSize: 15,
  dotCount: 10,
  colors: ["#FFADA9", "#ff7c76", "#ffa9d0"], //have as many or as few colors as you want.
  boxOpacity: 0,
  boxBorder: "1px solid #AAA",
  animationOffset: 1.8 });

//open the preloader
preloader.active(true);

//for testing: click the window to toggle open/close the preloader
// document.onclick = document.ontouchstart = function() {
//   preloader.active( !preloader.active() );
// };

//this is the whole preloader class/function
function GSPreloader(options) {
  options = options || {};
  var parent = options.parent || document.body,
      element = this.element = document.createElement("div"),
      radius = options.radius || 42,
      dotSize = options.dotSize || 15,
      animationOffset = options.animationOffset || 1.8,
      //jumps to a more active part of the animation initially (just looks cooler especially when the preloader isn't displayed for very long)
  createDot = function createDot(rotation) {
    var dot = document.createElement("div");
    element.appendChild(dot);
    TweenLite.set(dot, { width: dotSize, height: dotSize, transformOrigin: -radius + "px 0px", x: radius, backgroundColor: colors[colors.length - 1], borderRadius: "50%", force3D: true, position: "absolute", rotation: rotation });
    dot.className = options.dotClass || "preloader-dot";
    return dot;
  },
      i = options.dotCount || 10,
      rotationIncrement = 360 / i,
      colors = options.colors || ["#61AC27", "black"],
      animation = new TimelineLite({ paused: true }),
      dots = [],
      isActive = false,
      box = document.createElement("div"),
      tl,
      dot,
      closingAnimation,
      j;
  colors.push(colors.shift());

  //setup background box
  TweenLite.set(box, { width: radius * 2 + 70, height: radius * 2 + 70, borderRadius: "14px", backgroundColor: options.boxColor || "white", border: options.boxBorder || "1px solid #AAA", position: "absolute", xPercent: -50, yPercent: -50, opacity: options.boxOpacity !== null ? options.boxOpacity : 0.3 });
  box.className = options.boxClass || "preloader-box";
  element.appendChild(box);

  parent.appendChild(element);
  TweenLite.set(element, { position: "fixed", top: "45%", left: "50%", perspective: 600, overflow: "visible", zIndex: 2000 });
  animation.from(box, 0.1, { opacity: 0, scale: 0.1, ease: Power1.easeOut }, animationOffset);
  while (--i > -1) {
    dot = createDot(i * rotationIncrement);
    dots.unshift(dot);
    animation.from(dot, 0.1, { scale: 0.01, opacity: 0, ease: Power1.easeOut }, animationOffset);
    //tuck the repeating parts of the animation into a nested TimelineMax (the intro shouldn't be repeated)
    tl = new TimelineMax({ repeat: -1, repeatDelay: 0.25 });
    for (j = 0; j < colors.length; j++) {
      tl.to(dot, 2.5, { rotation: "-=360", ease: Power2.easeInOut }, j * 2.9).to(dot, 1.2, { skewX: "+=360", backgroundColor: colors[j], ease: Power2.easeInOut }, 1.6 + 2.9 * j);
    }
    //stagger its placement into the master timeline
    animation.add(tl, i * 0.07);
  }
  if (TweenLite.render) {
    TweenLite.render(); //trigger the from() tweens' lazy-rendering (otherwise it'd take one tick to render everything in the beginning state, thus things may flash on the screen for a moment initially). There are other ways around this, but TweenLite.render() is probably the simplest in this case.
  }

  //call preloader.active(true) to open the preloader, preloader.active(false) to close it, or preloader.active() to get the current state.
  this.active = function (show) {
    if (!arguments.length) {
      return isActive;
    }
    if (isActive != show) {
      isActive = show;
      if (closingAnimation) {
        closingAnimation.kill(); //in case the preloader is made active/inactive/active/inactive really fast and there's still a closing animation running, kill it.
      }
      if (isActive) {
        element.style.visibility = "visible";
        TweenLite.set([element, box], { rotation: 0 });
        animation.play(animationOffset);
      } else {
        closingAnimation = new TimelineLite();
        if (animation.time() < animationOffset + 0.3) {
          animation.pause();
          closingAnimation.to(element, 1, { rotation: -360, ease: Power1.easeInOut }).to(box, 1, { rotation: 360, ease: Power1.easeInOut }, 0);
        }
        closingAnimation.staggerTo(dots, 0.3, { scale: 0.01, opacity: 0, ease: Power1.easeIn, overwrite: false }, 0.05, 0).to(box, 0.4, { opacity: 0, scale: 0.2, ease: Power2.easeIn, overwrite: false }, 0).call(function () {
          animation.pause();closingAnimation = null;
        }).set(element, { visibility: "hidden" });
      }
    }
    return this;
  };
}

var loadingBG = $('.page-load-bg'),
    body = $('.content'),
    page = $('.page'),
    pageElements = $('.page > div'),
    header = $('header'),
    sidebar = $('#sidebar'),
    topNavBar = $('.top-navbar'),
    topNavLinks = $('#sidebar a'),
    ease1 = 'Power2.easeIn',
    ease2 = 'Power2.easeOut',
    noease = 'Power0.easeNone',
    easeParams = 4,
    delay = 5;

TweenMax.set(pageElements, { y: 50 });
TweenMax.set(topNavBar, { y: -150 });
TweenMax.set(topNavLinks, { y: -15, opacity: 0 });

$(window).on('load', function () {

  preloader.active(false);
  var pageloadTween = new TimelineMax().staggerTo([body, topNavBar, sidebar], 0.60, { opacity: 1, ease: ease2 }, 0.20).to(topNavBar, 0.2, { y: 0, ease: ease2 }, "-=0.40").staggerTo(topNavLinks, 0.8, { y: 0, opacity: 1, ease: ease2 }, 0.15, "-=1.2").to(page, 0.2, { opacity: 1, ease: Power3.easeInOut }).staggerTo(pageElements, 1, { y: 0, ease: Power3.easeInOut }, 0.20, "-=0.25");

  $('.toggle').click(function () {
    $(this).toggleClass('open');
    $(header).toggleClass('open');

    if ($(header).hasClass('open')) {
      TweenMax.staggerTo(topNavLinks, 0.18, { ease: ease2, x: 0, delay: 0.1 }, 0.04);
    } else {
      TweenMax.staggerTo(topNavLinks, 0.18, { ease: ease1, x: -460 }, 0.04);
    }
  }); //$('.toggle').click(function()

  $(document).scroll(function () {
    if ($(header).hasClass('open')) {
      $('.toggle').toggleClass('open');
      $(header).toggleClass('open');
      TweenMax.staggerTo(topNavLinks, 0.18, { ease: Power2.easeOut, x: -766 }, 0.08);
    }
  }); //$(document).scroll(function()

  $(document).on('submit', '.form', function () {
    var $form = $(this),
        $button,
        label;
    $form.find(':submit').each(function () {
      $button = $(this);
      label = $button.data('after-submit-value');
      if (typeof label != 'undefined') {
        $button.val(label).prop('disabled', true);
      }
    });
  });
}); // ./ $(window).on('load', function()

},{}]},{},[1]);

//# sourceMappingURL=app.js.map
