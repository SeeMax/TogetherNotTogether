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
