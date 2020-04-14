const splitHero = () => {
  let headSplit = new SplitText($('.heroHeadline'), {type:"chars"});
  let bodySplit = new SplitText($('.heroBody'), {type:"words"});
  let hWords = bodySplit.words;
  let hChars = headSplit.chars;
  let logoAll = document.querySelector(".logoAll");
  let logoBottomHalf = document.querySelector(".logoBottomHalf");
  let logoTopHalf = document.querySelector(".logoTopHalf");
  let logoBottomLetter = document.querySelector(".logoBottomLetter");
  let logoTopLetter = document.querySelector(".logoTopLetter");
  let logoLine = document.querySelector(".logoLine");

  $(hWords).addClass('heroWords');
  $(hChars).addClass('heroChars');

  $(hChars).each(function() {
    let charX =  Math.random() * (500 - (-500)) + (-500);
    let charY =  Math.random() * (500 - (-500)) + (-500);
    let charZ =  Math.random() * (6 - 0) + 0;

    $(this).attr({datax:charX, datay:charY, dataZ:charZ});
  });

  $(hWords).each(function() {
    let charX =  Math.random() * (10 - (-10)) + (-10);
    let charY =  Math.random() * (10 - (-10)) + (-10);
    let charZ =  Math.random() * (0.5 - 0) + 0;

    $(this).attr({datax:charX, datay:charY, dataZ:charZ});
  });

  gsap.set(logoLine, {scale:0, rotation:40, opacity:0, transformOrigin:'50% 50%'});
  gsap.set(logoTopLetter, {x:-75, opacity:0});
  gsap.set(logoBottomLetter, {x:75, opacity:0});
  gsap.set(hWords, {x:0,y:0,scale:1,});
  gsap.set(hChars, {x:0,y:0,scale:1, onComplete: function() {heroFlyout()}});
}
splitHero();

// // Reset Text On Window Resize
// window.addEventListener('resize', function(){
//   new SplitText($('.heroHeadline')).revert();
//   new SplitText($('.heroBody')).revert();
// });
