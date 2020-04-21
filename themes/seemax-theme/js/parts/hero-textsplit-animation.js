const heroFlyout = () => {

  let headChars = document.querySelectorAll('.heroChars');
  let bodyWords = document.querySelectorAll('.heroWords');
  let hBody = document.querySelector('.heroBody');
  let backStroke = document.querySelector('.backStroke');
  let logoAll = document.querySelector(".logoAll");
  let logoBottomHalf = document.querySelector(".logoBottomHalf");
  let logoTopHalf = document.querySelector(".logoTopHalf");
  let logoBottomLetter = document.querySelector(".logoBottomLetter");
  let logoTopLetter = document.querySelector(".logoTopLetter");
  let logoLine = document.querySelector(".logoLine");
  let allCreative = $(".single-creative-title").not(this);
  let theHeight = $('.hero-section').height() + 100;
  let tl = gsap.timeline({
    paused:true,
    defaults:{
      // ease: 'power0.none',
      // ease: Back.easeOut.config(0.2),
      ease: 'power4.out',
      duration:0.9,
    }
  });

  $(headChars).each(function(i) {
    let charX =  $(this).attr('datax');
    let charY =  $(this).attr('datay');
    let charZ =  $(this).attr('dataZ');

    tl.to($(this), {x:charX, y:charY, scale:charZ, opacity:0}, "doIt")
  });

  $(bodyWords).each(function(i) {
    let charX =  $(this).attr('datax');
    let charY =  $(this).attr('datay');
    let charZ =  $(this).attr('dataZ');

    tl.to($(this), {x:charX, y:charY, scale:charZ, opacity:0}, "doIt")
  });

  if($(window).width() >= 1024) {
    tl.set($('.hero-section'), {zIndex:0}, "doIt");
    tl.set($('.hero-section').find('.content'), {zIndex:0}, "doIt");
    tl.to(backStroke, {rotation:180, width:0}, "doIt");
  }
  else {
    tl.to(backStroke, {rotation:180, width:0, onComplete:function(){
        gsap.set($('.hero-section'), {zIndex:0});
        gsap.set($('.hero-section').find('.content'), {zIndex:0});
      }
  }, "doIt");
  }
  tl.to(logoLine, {scale:1, rotation:0, opacity:1}, "doIt");
  tl.to(logoTopLetter, {x:0, opacity:1}, "doIt");
  tl.to(logoBottomLetter, {x:0,opacity:1}, "doIt");
  // tl.set($('.hero-section'), {opacity:0, immediateRender:false}, "doIt");
  tl.to($('.hero-section'), {duration:0.0000001, opacity:0});

  let visiblity = 'invisible';

  let options = {
    root: null,
    rootMargin: '-100px',
    threshold: 0
  }

  let callBack = (entries) => {

    // Element enters the viewport
    if(entries[0].isIntersecting) {

      // console.log(entries[0].intersectionRatio);
      visiblity = 'visible';
      // tl.pause();
      tl.play();

    // Element leaves the viewport
    } else {
      visiblity = 'invisible';
      // tl.pause();
      tl.reverse();
    }

    // updateStatus(visiblity);
  };


  // Create new IntersectionObserver
  let io = new IntersectionObserver(callBack, options);

  // Element to be observed
  let box = document.querySelector('.creative-list-area');

  // Start observing .box
  io.observe(box);
}
