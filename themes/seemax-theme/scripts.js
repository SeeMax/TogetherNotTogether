function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

(function ($, root, undefined) {
  $(function () {
    'use strict';

    var closeAbout = function closeAbout() {
      var tl = new gsap.timeline();
      var about = $('.aboutArea');
      var title = $('.aboutToggle');
      var subTitle = $(about).find('h2');
      var aboutP = $(about).find('p');
      var emailBtn = $('.aboutEmailButtonArea');
      var singleLink = $(about).find('.aboutSingleLink');
      var uniTime = 0.3;
      var uniEase = Back.easeIn.config(0.5);
      var uniEase2 = Back.easeOut.config(0.5);
      $('.aboutToggle').removeClass("aboutOpen");
      tl.set(about, {
        zIndex: 1
      });
      tl.to(title, {
        duration: uniTime,
        opacity: 0.5,
        ease: uniEase
      }, "menuClose");
      tl.to(aboutP, {
        duration: uniTime,
        x: "121%",
        opacity: 0,
        ease: uniEase,
        stagger: {
          amount: uniTime / 2
        }
      }, "menuClose");
      tl.to(emailBtn, {
        duration: 0.2,
        x: "121%",
        opacity: 0,
        ease: uniEase2,
        stagger: {
          amount: uniTime
        }
      }, "menuClose+=0.1");
      tl.to(subTitle, {
        duration: 0.2,
        x: "121%",
        opacity: 0,
        ease: uniEase2,
        stagger: {
          amount: uniTime
        }
      }, "menuClose+=0.11");
      tl.to(singleLink, {
        duration: 0.15,
        x: "121%",
        opacity: 0,
        ease: uniEase,
        stagger: {
          amount: uniTime / 3
        }
      }, "menuClose+=0.11");
      return tl;
    };

    var openAbout = function openAbout() {
      var tl = new gsap.timeline();
      var about = $('.aboutArea');
      var title = $('.aboutToggle');
      var subTitle = $(about).find('h2');
      var aboutP = $(about).find('p');
      var emailBtn = $('.aboutEmailButtonArea');
      var singleLink = $(about).find('.aboutSingleLink');
      var uniTime = 0.15;
      var uniEase = Back.easeIn.config(0.5);
      var uniEase2 = Back.easeOut.config(0.5);
      $('.aboutToggle').addClass("aboutOpen");
      tl.set(about, {
        zIndex: 100
      });
      tl.to(title, {
        duration: uniTime,
        opacity: 1,
        ease: uniEase
      }, "menuOpen");
      tl.to(aboutP, {
        duration: 0.2,
        x: "0%",
        opacity: 1,
        ease: uniEase2,
        stagger: {
          amount: uniTime / 2
        }
      }, "menuOpen+=0.2");
      tl.to(emailBtn, {
        duration: 0.2,
        x: "0%",
        opacity: 1,
        ease: uniEase2,
        stagger: {
          amount: uniTime
        }
      }, "menuOpen+=0.25");
      tl.to(subTitle, {
        duration: 0.2,
        x: "0%",
        opacity: 1,
        ease: uniEase2,
        stagger: {
          amount: uniTime
        }
      }, "menuOpen+=0.27");
      tl.to(singleLink, {
        duration: 0.2,
        x: "0%",
        opacity: 1,
        ease: uniEase2,
        stagger: {
          amount: uniTime / 3
        }
      }, "menuOpen+=0.27");
      return tl;
    };

    var aboutLiHover = function aboutLiHover() {
      $(".aboutSingleLink").each(function (i, el) {
        // Add Various Timelines from other js files | Use el for this
        var masterTL = new gsap.timeline({
          paused: true
        });
        var theseChars = $(this).find('.aboutChars');
        var t = masterTL.to(theseChars, {
          duration: 0.25,
          ease: "back.out(0.1)",
          x: 1,
          y: -1,
          stagger: {
            amount: 0.15
          }
        }).to($(this), {
          duration: 0.07,
          x: 1,
          y: -1
        }, '-=0.15'); // Create A Variable for each timeline

        el.animation = t; // Control The Specific Timeline for Each Hovered Element

        $(this).on("mouseenter", function () {
          this.animation.play();
        }).on("mouseleave", function () {
          this.animation.reverse();
        });
      });
    };

    var aboutSplitSetup = function aboutSplitSetup() {
      // let aboutLinkSplit = new SplitText($('.about-item'), {type:"words,chars"});
      var aboutSplit = function aboutSplit() {
        aboutLinkSplit = new SplitText($('.aboutSingleLink'), {
          type: "words,chars"
        });
        var aboutWords = aboutLinkSplit.words;
        var aboutChars = aboutLinkSplit.chars;
        $(aboutWords).addClass('aboutWords');
        $(aboutChars).addClass('aboutChars');
        gsap.set(aboutChars, {
          // opacity:0,
          x: -1,
          y: 1,
          rotationY: 0,
          rotationX: 0,
          // Once this is all setup enable the hover aniamtion above
          onComplete: function onComplete() {
            aboutLiHover();
          }
        }); // Return the TextSplit Object to be reset / used in other Functions

        return aboutLinkSplit;
      };

      aboutSplit(); // Access the TextSplit object form the aboutSplitFunction

      var aboutLinkSplit; // Reset Text On Window Resize

      window.addEventListener('resize', function (event) {
        // Reset the TextSplit
        aboutLinkSplit.revert(); // Redo the TextSplit

        aboutSplit();
      });
    };

    aboutSplitSetup();

    var setImage = function setImage() {
      var allPics = $(".creative-images-area");
      var thisPic = $(".single-creative-image");
      gsap.set(thisPic, {
        opacity: 0,
        x: 1,
        y: 2,
        rotationY: 0,
        rotationX: -2
      });
      gsap.set(allPics, {
        perspective: 1000
      });
    };

    setImage();

    var loadImage = function loadImage(thisCreative) {
      var thisID = $(thisCreative).data('post');
      var thisPic = $(".creative-images-area").find("[data-post='" + thisID + "']");
      var tl = new gsap.timeline();
      tl.to(thisPic, {
        duration: 0.3,
        ease: "back.in(0.1)",
        transformOrigin: "50% 100% 0",
        opacity: 1,
        x: 0,
        y: 0,
        rotationY: 0,
        rotationX: 0
      });
      return tl;
    };

    var setDetails = function setDetails() {
      var thisDeets = $('.singleCreativeTitle');
      var name = $('.featuredName');
      var title = $('.featuredTitle');
      var advice = $('.featuredAdvice');
      gsap.set(thisDeets, {
        perspective: 800
      });
      gsap.set([name, title, advice], {
        opacity: 0,
        rotationX: -5
      });
    };

    setDetails();

    var loadDetails = function loadDetails(thisCreativeDeets) {
      var thisID = $(thisCreativeDeets).data('post');
      var thisDeets = $(".creative-details-area").find("[data-post='" + thisID + "']");
      var name = $(thisDeets).find('.featuredName');
      var title = $(thisDeets).find('.featuredTitle');
      var advice = $(thisDeets).find('.featuredAdvice');
      var tl = new gsap.timeline({
        defaults: {
          ease: "back.in(0.1)",
          transformOrigin: "50% 100% 0",
          duration: 0.3,
          scale: 1,
          opacity: 1,
          x: 0,
          y: 0,
          rotationX: 0
        }
      });
      tl.to([title, name, advice], {});
      return tl;
    }; // $( ".featured-hero-section" ).next().addClass( "post-sub-hero-section" );
    // const heroFlyout = () => {
    //
    //   const observerOptions = {
    //     root: null,
    //     rootMargin: '0px 0px',
    //     threshold: 0,
    //   };
    //
    //   const observerElements = document.querySelectorAll('.hero-section');
    //   observerElements.forEach(el => {
    //
    //     let headChars = $(el).find($('.heroChars'));
    //     let bodyWords = $(el).find($('.heroWords'));
    //     let hBody = $(el).find($('.heroBody'));
    //     let backStroke = $(el).find($('.backStroke'));
    //     let logoAll = document.querySelector(".logoAll");
    //     let logoBottomHalf = document.querySelector(".logoBottomHalf");
    //     let logoTopHalf = document.querySelector(".logoTopHalf");
    //     let logoBottomLetter = document.querySelector(".logoBottomLetter");
    //     let logoTopLetter = document.querySelector(".logoTopLetter");
    //     let logoLine = document.querySelector(".logoLine");
    //     let theHeight = $('.hero-section').height() + 100;
    //     el.tl = gsap.timeline({paused: true});
    //
    //     $(headChars).each(function(i) {
    //       let charX =  $(this).attr('datax');
    //       let charY =  $(this).attr('datay');
    //       let charZ =  $(this).attr('dataZ');
    //
    //       el.tl.to($(this), {x:charX, y:charY, scale:charZ, opacity:0, ease: 'power1.inOut'}, "doIt")
    //     });
    //
    //     $(bodyWords).each(function(i) {
    //       let charX =  $(this).attr('datax');
    //       let charY =  $(this).attr('datay');
    //       let charZ =  $(this).attr('dataZ');
    //
    //       el.tl.to($(this), {x:charX, y:charY, scale:charZ, opacity:0, ease: 'power1.inOut'}, "doIt")
    //     });
    //
    //
    //     el.tl.set($('.hero-section').find('.content'), {zIndex:0}, "doIt");
    //     el.tl.to(backStroke, {rotation:180, width:0}, "doIt");
    //     el.tl.to(logoLine, {scale:1, rotation:0, opacity:1}, "doIt");
    //     el.tl.to(logoTopLetter, {x:0, opacity:1}, "doIt");
    //     el.tl.to(logoBottomLetter, {x:0,opacity:1}, "doIt");
    //     el.tl.to($('.hero-section'), {opacity:0});
    //
    //
    //
    //     el.observer = new IntersectionObserver(entry => {
    //       if (entry[0].intersectionRatio > 0) {
    //         gsap.ticker.add(el.progressTween)
    //       } else {
    //         gsap.ticker.remove(el.progressTween)
    //       }
    //     }, observerOptions);
    //
    //     el.progressTween = () => {
    //       // Get scroll distance to bottom of viewport.
    //       const scrollPosition = (window.scrollY + (window.innerHeight - theHeight + 20));
    //       // Get element's position relative to bottom of viewport.
    //       const elPosition = (scrollPosition - el.offsetTop);
    //       // Set desired duration.
    //       const durationDistance = ((window.innerHeight/1.5 - theHeight) + el.offsetHeight -20);
    //       // Calculate tween progresss.
    //       const currentProgress = (elPosition / durationDistance);
    //       // Set progress of gsap timeline.
    //       el.tl.progress(currentProgress);
    //     }
    //
    //     el.observer.observe(el);
    //   });
    // };
    //
    //
    // // Reset Text On Window Resize
    // // window.addEventListener('resize', function(){
    // //   heroFlyout();
    // // });


    var heroFlyout = function heroFlyout() {
      var _defaults;

      var headChars = document.querySelectorAll('.heroChars');
      var bodyWords = document.querySelectorAll('.heroWords');
      var hBody = document.querySelector('.heroBody');
      var backStroke = document.querySelector('.backStroke');
      var logoAll = document.querySelector(".logoAll");
      var logoBottomHalf = document.querySelector(".logoBottomHalf");
      var logoTopHalf = document.querySelector(".logoTopHalf");
      var logoBottomLetter = document.querySelector(".logoBottomLetter");
      var logoTopLetter = document.querySelector(".logoTopLetter");
      var logoLine = document.querySelector(".logoLine");
      var theHeight = $('.hero-section').height() + 100;
      var tl = gsap.timeline({
        paused: true,
        defaults: (_defaults = {
          ease: 'power0.none'
        }, _defineProperty(_defaults, "ease", Back.easeOut.config(0.2)), _defineProperty(_defaults, "duration", 0.65), _defaults)
      });
      $(headChars).each(function (i) {
        var charX = $(this).attr('datax');
        var charY = $(this).attr('datay');
        var charZ = $(this).attr('dataZ');
        tl.to($(this), {
          x: charX,
          y: charY,
          scale: charZ,
          opacity: 0
        }, "doIt");
      });
      $(bodyWords).each(function (i) {
        var charX = $(this).attr('datax');
        var charY = $(this).attr('datay');
        var charZ = $(this).attr('dataZ');
        tl.to($(this), {
          x: charX,
          y: charY,
          scale: charZ,
          opacity: 0
        }, "doIt");
      });
      tl.set($('.hero-section'), {
        zIndex: 0
      }, "doIt");
      tl.set($('.hero-section').find('.content'), {
        zIndex: 0
      }, "doIt");
      tl.to(backStroke, {
        rotation: 180,
        width: 0
      }, "doIt");
      tl.to(logoLine, {
        scale: 1,
        rotation: 0,
        opacity: 1
      }, "doIt");
      tl.to(logoTopLetter, {
        x: 0,
        opacity: 1
      }, "doIt");
      tl.to(logoBottomLetter, {
        x: 0,
        opacity: 1
      }, "doIt"); // tl.set($('.hero-section'), {opacity:0, immediateRender:false}, "doIt");

      tl.to($('.hero-section'), {
        duration: 0.0000001,
        opacity: 0
      });
      var visiblity = 'invisible';
      var options = {
        root: null,
        rootMargin: '-100px',
        threshold: 0
      };

      var callBack = function callBack(entries) {
        // Element enters the viewport
        if (entries[0].isIntersecting) {
          // console.log(entries[0].intersectionRatio);
          visiblity = 'visible'; // tl.pause();

          tl.play(); // Element leaves the viewport
        } else {
          visiblity = 'invisible'; // tl.pause();

          tl.reverse();
        } // updateStatus(visiblity);

      }; // Create new IntersectionObserver


      var io = new IntersectionObserver(callBack, options); // Element to be observed

      var box = document.querySelector('.creative-list-area'); // Start observing .box

      io.observe(box); // Just necessary for displaying the current status
      // function updateStatus(visiblity) {
      //   console.log(visiblity);
      // }
    };

    var splitHero = function splitHero() {
      var headSplit = new SplitText($('.heroHeadline'), {
        type: "chars"
      });
      var bodySplit = new SplitText($('.heroBody'), {
        type: "words"
      });
      var hWords = bodySplit.words;
      var hChars = headSplit.chars;
      var logoAll = document.querySelector(".logoAll");
      var logoBottomHalf = document.querySelector(".logoBottomHalf");
      var logoTopHalf = document.querySelector(".logoTopHalf");
      var logoBottomLetter = document.querySelector(".logoBottomLetter");
      var logoTopLetter = document.querySelector(".logoTopLetter");
      var logoLine = document.querySelector(".logoLine");
      $(hWords).addClass('heroWords');
      $(hChars).addClass('heroChars');
      $(hChars).each(function () {
        var charX = Math.random() * (500 - -500) + -500;
        var charY = Math.random() * (500 - -500) + -500;
        var charZ = Math.random() * (6 - 0) + 0;
        $(this).attr({
          datax: charX,
          datay: charY,
          dataZ: charZ
        });
      });
      $(hWords).each(function () {
        var charX = Math.random() * (10 - -10) + -10;
        var charY = Math.random() * (10 - -10) + -10;
        var charZ = Math.random() * (0.5 - 0) + 0;
        $(this).attr({
          datax: charX,
          datay: charY,
          dataZ: charZ
        });
      });
      gsap.set(logoLine, {
        scale: 0,
        rotation: 40,
        opacity: 0,
        transformOrigin: '50% 50%'
      });
      gsap.set(logoTopLetter, {
        x: -75,
        opacity: 0
      });
      gsap.set(logoBottomLetter, {
        x: 75,
        opacity: 0
      });
      gsap.set(hWords, {
        x: 0,
        y: 0,
        scale: 1
      });
      gsap.set(hChars, {
        x: 0,
        y: 0,
        scale: 1,
        onComplete: function onComplete() {
          heroFlyout();
        }
      });
    };

    splitHero(); // // Reset Text On Window Resize
    // window.addEventListener('resize', function(){
    //   new SplitText($('.heroHeadline')).revert();
    //   new SplitText($('.heroBody')).revert();
    // });

    $(document.body).on('click', function () {
      var masterTL = new gsap.timeline();
      masterTL.add(closeAbout(), "nomItUp");
      masterTL.add(closeMenu(), "nomItUp");
      masterTL.add(closeNom(), "nomItUp");
    });
    $('.openNominate').on('click', function (e) {
      e.stopPropagation();
      var masterTL = new gsap.timeline();
      masterTL.add(openMenu(), "nomItUp");
      masterTL.add(openNom(), "nomItUp");
      masterTL.set($('.aboutToggle'), {
        opacity: 0.5
      }, "nomItUp");
    });
    $('.menuSection').on('click', function (e) {
      e.stopPropagation();
    }); // The Main Menu Opening

    $('.menuToggle').on('click', function (e) {
      e.stopPropagation(); // this stops the event from bubbling up to the body

      if ($(this).hasClass("menuOpen") && $('.nominateToggle').hasClass('nomOpen')) {
        var masterTL = new gsap.timeline();
        masterTL.add(closeNom(), "nomItUp");
        masterTL.add(closeMenu(), "nomItUp");
      } else if ($(this).hasClass("menuOpen") && $('.aboutToggle').hasClass('aboutOpen')) {
        var _masterTL = new gsap.timeline();

        _masterTL.add(closeAbout(), "nomItUp");

        _masterTL.add(closeMenu(), "nomItUp");
      } else {
        var _masterTL2 = new gsap.timeline();

        _masterTL2.add(openMenu(), "nomItUp");

        _masterTL2.add(openAbout(), "nomItUp");
      }
    }); // Swap In the Nominate Form

    $('.nominateToggle').on('click', function (e) {
      e.stopPropagation(); // this stops the event from bubbling up to the body

      if ($(this).hasClass("nomOpen")) {
        return;
      } else {
        $(this).addClass('nomOpen');
        $('.aboutToggle').removeClass("aboutOpen");
        var masterTL = new gsap.timeline();
        masterTL.add(openNom(), "nomItUp");
        masterTL.add(closeAbout(), "nomItUp");
      }
    }); // Swap In the About Info

    $(".aboutToggle").on('click', function (e) {
      e.stopPropagation(); // this stops the event from bubbling up to the body

      if ($(this).hasClass("aboutOpen")) {
        return;
      } else {
        $('.nominateToggle').removeClass('nomOpen');
        $(this).addClass("aboutOpen");
        var masterTL = new gsap.timeline();
        masterTL.add(closeNom(), "nomItUp");
        masterTL.add(openAbout(), "nomItUp");
      }
    }); // Disable Scroll Via Jquery

    $.fn.disableScroll = function () {
      window.oldScrollPos = $(window).scrollTop();
      $(window).on('scroll.scrolldisabler', function (event) {
        $(window).scrollTop(window.oldScrollPos);
        event.preventDefault();
      });
    }; // ReEnable Scroll Via Jquery


    $.fn.enableScroll = function () {
      $(window).off('scroll.scrolldisabler');
    };

    var closeMenu = function closeMenu() {
      var tl = new gsap.timeline();
      var toggle = $(".menuToggle");
      var menu = $('.menuSection');
      var ham1 = $(".hamTop");
      var ham2 = $(".hamMid");
      var ham3 = $(".hamBot");
      var hHam1 = $(".hovHamTop");
      var hHam2 = $(".hovHamMid");
      var hHam3 = $(".hovHamBot");
      var h2 = $('.menuSectionToggle');
      var yellowSpans = $('.sub-spans');
      var uniTime = 0.3;
      var uniEase = Back.easeIn.config(0.5);
      var uniEase2 = Back.easeOut.config(0.5);
      $(toggle).removeClass("menuOpen"); //enable

      $(".wrapper").enableScroll(); // tl.set($(".wrapper"), {height:"auto",overflow:"visible"});

      tl.to(menu, {
        duration: uniTime,
        x: "101%",
        ease: uniEase
      }, "menuClose+=0.1");
      tl.to(yellowSpans, {
        duration: uniTime,
        opacity: 1,
        ease: uniEase
      }, "menuClose+=0.1");
      tl.to(h2, {
        duration: uniTime,
        x: "101%",
        opacity: 0,
        ease: uniEase
      }, "menuClose");
      tl.to(ham1, {
        duration: uniTime / 2,
        width: "100%",
        rotation: 0,
        y: 0,
        ease: uniEase
      }, "menuClose");
      tl.to(ham2, {
        duration: uniTime / 2,
        x: 0,
        width: "100%",
        ease: uniEase
      }, "menuClose");
      tl.to(ham3, {
        duration: uniTime / 2,
        width: "100%",
        rotation: 0,
        y: 0,
        ease: uniEase
      }, "menuClose");
      tl.to(hHam1, {
        duration: uniTime / 2,
        rotation: 0,
        y: 0,
        ease: uniEase
      }, "menuClose");
      tl.to(hHam2, {
        duration: uniTime / 2,
        x: 0,
        ease: uniEase
      }, "menuClose");
      tl.to(hHam3, {
        duration: uniTime / 2,
        rotation: 0,
        y: 0,
        ease: uniEase
      }, "menuClose"); // tl.set([hHam1, hHam2, hHam3], {width:0});

      return tl;
    };

    var openMenu = function openMenu() {
      var tl = new gsap.timeline();
      var toggle = $(".menuToggle");
      var menu = $('.menuSection');
      var ham1 = $(".hamTop");
      var ham2 = $(".hamMid");
      var ham3 = $(".hamBot");
      var hHam1 = $(".hovHamTop");
      var hHam2 = $(".hovHamMid");
      var hHam3 = $(".hovHamBot");
      var h2 = $('.menuSectionToggle');
      var yellowSpans = $('.sub-spans');
      var uniTime = 0.3;
      var uniEase = Back.easeIn.config(0.5);
      var uniEase2 = Back.easeOut.config(0.5);
      $(toggle).addClass("menuOpen");
      $(".wrapper").disableScroll(); // tl.to($(".wrapper"), {duration:uniTime, ease:uniEase2, height:"100%", overflow:"hidden"}, "menuOpen");

      tl.to(menu, {
        duration: uniTime,
        x: "50%",
        ease: uniEase
      }, "menuOpen");
      tl.to(yellowSpans, {
        duration: uniTime,
        opacity: 0,
        ease: uniEase
      }, "menuOpen");
      tl.to(h2, {
        duration: uniTime,
        x: "0%",
        opacity: 1,
        ease: uniEase2
      }, "menuOpen+=0.15");
      tl.to(ham1, {
        duration: uniTime,
        rotation: 405,
        y: 2,
        width: 10,
        ease: uniEase2
      }, "menuOpen");
      tl.to(ham2, {
        duration: uniTime,
        x: -7,
        width: '99%',
        ease: uniEase2
      }, "menuOpen");
      tl.to(ham3, {
        duration: uniTime,
        rotation: -405,
        y: -2,
        width: 10,
        ease: uniEase2
      }, "menuOpen");
      tl.to(hHam1, {
        duration: uniTime,
        rotation: 405,
        y: 2,
        ease: uniEase2
      }, "menuOpen");
      tl.to(hHam2, {
        duration: uniTime,
        x: -7,
        ease: uniEase2
      }, "menuOpen");
      tl.to(hHam3, {
        duration: uniTime,
        rotation: -405,
        y: -2,
        ease: uniEase2
      }, "menuOpen");
      return tl;
    };

    var closeNom = function closeNom() {
      var tl = new gsap.timeline({});
      var fullForm = $('.nominateForm');
      var title = $('.nominateToggle');
      var paras = $(fullForm).find('p');
      var form = $(fullForm).find('form');
      var formInfo = $('.wpcf7-response-output');
      var uniTime = 0.15;
      var uniEase = Back.easeIn.config(1);
      $('.nominateToggle').removeClass("nomOpen");
      tl.set(fullForm, {
        zIndex: 1
      });
      tl.to(paras, {
        duration: uniTime,
        x: '121%',
        opacity: 0,
        ease: uniEase,
        stagger: {
          amount: uniTime / 2
        }
      }, "nomClose");
      tl.to(form, {
        duration: uniTime,
        x: 75,
        ease: uniEase
      }, "nomClose");
      tl.to(formInfo, {
        duration: uniTime,
        opacity: 0,
        x: 75,
        ease: uniEase
      }, "nomClose");
      tl.to(title, {
        duration: uniTime * 2,
        opacity: 0.5,
        ease: uniEase
      }, "nomClose");
    };

    var openNom = function openNom() {
      var tl = new gsap.timeline({});
      var fullForm = $('.nominateForm');
      var title = $('.nominateToggle');
      var paras = $(fullForm).find('p');
      var form = $(fullForm).find('form');
      var formInfo = $('.wpcf7-response-output');
      var uniTime = 0.2;
      var uniEase = Back.easeIn.config(1);
      var uniEase2 = Back.easeOut.config(1);
      $('.nominateToggle').addClass("nomOpen");
      tl.set(fullForm, {
        zIndex: 100
      });
      tl.to(title, {
        duration: uniTime,
        opacity: 1,
        ease: uniEase
      }, "nomOpen");
      tl.to(formInfo, {
        duration: uniTime,
        x: 0,
        opacity: 1,
        ease: uniEase
      }, "nomClose");
      tl.to(form, {
        duration: uniTime,
        x: 0,
        ease: uniEase
      }, "nomClose");
      tl.to(paras, {
        duration: uniTime,
        x: 0,
        opacity: 1,
        ease: uniEase2,
        stagger: {
          amount: uniTime / 2
        }
      }, "nomOpen+=0.28");
      return tl;
    };

    var newHover = function newHover() {
      $(".single-creative-title").each(function (i, el) {
        // Add Various Timelines from other js files | Use el for this
        var masterTL = new gsap.timeline({
          paused: true
        });
        var t = masterTL;
        masterTL.add(loadImage(el), 'getcreative+=0.1');
        masterTL.add(loadDetails(el), 'getcreative+=0.1');
        masterTL.add(funcHover(el), 'getcreative'); // Create A Variable for each timeline

        el.animation = t; // Control The Specific Timeline for Each Hovered Element

        $(this).on("mouseenter", function () {
          if ($('.menuToggle').hasClass("menuOpen")) {
            $('.single-creative-title').find('a').hide();
            return false;
          } else {
            this.animation.play();
          }
        }).on("mouseleave", function () {
          if ($('.menuToggle').hasClass("menuOpen")) {
            $('.single-creative-title').find('a').show();
            return false;
          } else {
            this.animation.reverse();
          }
        }).on("click", function () {
          this.animation.reverse();
        });
      });
    };

    $(function preLoaderOn() {
      $(window).load(function () {
        $('#preloader').fadeOut('slow', function () {
          $(this).remove();
        });
      });
    });

    var funcHover = function funcHover(thisOne) {
      var pChars = $(thisOne).find('.pChars');
      var hChars = $(thisOne).find('.hChars');
      var arrow = $(thisOne).find('.websiteArrow');
      var tl = new gsap.timeline({});
      var uTime = 0.2;
      tl.to(pChars, {
        duration: uTime,
        ease: "back.out(0.1)",
        transformOrigin: "50% 50% -30",
        opacity: 0,
        scale: 0,
        x: -10,
        y: 0,
        rotationY: -40,
        rotationX: -120,
        stagger: {
          amount: uTime // ease:"back.out(0.1)",
          // ease: "power2.inOut"

        }
      }, "rollIt").to(hChars, {
        duration: uTime,
        ease: "back.out(0.1)",
        opacity: 1,
        x: 55,
        y: 0,
        rotationY: 0,
        rotationX: 0,
        stagger: {
          amount: uTime // ease:"back.out(0.1)",
          // ease: "power2.inOut"

        }
      }, "rollIt").to(arrow, {
        duration: uTime,
        transformOrigin: "0% 100%",
        ease: "back.out(0.1)",
        opacity: 1,
        x: 55,
        y: 0,
        rotation: 0
      }, "-=0.1");
      return tl;
    };

    var creativeTitleSplit = function creativeTitleSplit() {
      var pSplit = new SplitText($('.plainName'), {
        type: "words,chars"
      });
      var hSplit = new SplitText($('.hoveredName'), {
        type: "words,chars"
      });
      var pWords = pSplit.words;
      var hWords = hSplit.words;
      var pChars = pSplit.chars;
      var hChars = hSplit.chars;
      $(hWords).addClass('hWords');
      $(pWords).addClass('pWords');
      $(hChars).addClass('hChars');
      $(pChars).addClass('pChars');
      gsap.set(pWords, {
        perspective: 100
      });
      gsap.set(hWords, {
        perspective: 100
      });
      gsap.set(hChars, {
        opacity: 0,
        x: -10,
        y: 10,
        rotationY: 0,
        rotationX: 0,
        // Once this is all setup enable the hover aniamtion in person-hover.js
        onComplete: function onComplete() {
          newHover();
        }
      });
      gsap.set($(".websiteArrow"), {
        opacity: 0,
        x: 40,
        y: 0,
        rotation: -5
      });
    };

    creativeTitleSplit(); // Reset Text On Window Resize

    window.addEventListener('resize', function () {
      new SplitText($('.plainName')).revert();
      new SplitText($('.hoveredName')).revert();
      newHover();
    });
  });
})(jQuery, this);