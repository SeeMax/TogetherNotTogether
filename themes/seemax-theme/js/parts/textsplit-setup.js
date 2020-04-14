const creativeTitleSplit = () => {
  let pSplit = new SplitText($('.plainName'), {type:"words,chars"});
  let hSplit = new SplitText($('.hoveredName'), {type:"words,chars"});
  let pWords = pSplit.words;
  let hWords = hSplit.words;
  let pChars = pSplit.chars;
  let hChars = hSplit.chars;

  $(hWords).addClass('hWords');
  $(pWords).addClass('pWords');
  $(hChars).addClass('hChars');
  $(pChars).addClass('pChars');

  gsap.set(pWords, {perspective:100});
  gsap.set(hWords, {perspective:100});

  gsap.set(hChars, {
    opacity:0,
    x:-10,
    y:10,
    rotationY:0,
    rotationX:0,
    // Once this is all setup enable the hover aniamtion in person-hover.js
    onComplete: function() {
      newHover();
    }
  });

  gsap.set($(".websiteArrow"), {
    opacity:0,
    x:40,
    y:0,
    rotation:-5,
  });
}
creativeTitleSplit();

// Reset Text On Window Resize
window.addEventListener('resize', function(){
  new SplitText($('.plainName')).revert();
  new SplitText($('.hoveredName')).revert();
  newHover();
});
