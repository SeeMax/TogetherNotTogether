let loadLetters = (thisOne) => {

  let pChars = $(thisOne).find('.pChars');
  let hChars = $(thisOne).find('.hChars');
  let arrow = $(thisOne).find('.websiteArrow');
  let tl = new gsap.timeline({

  });
  let uTime = 0.2;

  tl.to(pChars, {
    duration:uTime,
    ease:"back.out(0.1)",
    transformOrigin:"50% 50% -30",
    opacity:0,
    scale:0,
    x:-10,
    y:0,
    rotationY:-40,
    rotationX:-120,
    stagger: {
      amount: uTime,
      // ease:"back.out(0.1)",
      // ease: "power2.inOut"
    }
  },"rollIt")
  .to(hChars, {
    duration:uTime,
    ease:"back.out(0.1)",
    opacity:1,
    x:55,
    y:0,
    rotationY:0,
    rotationX:0,
    stagger: {
      amount: uTime,
      // ease:"back.out(0.1)",
      // ease: "power2.inOut"
    }
  },"rollIt")
  .to(arrow, {
    duration:uTime,
    transformOrigin:"0% 100%",
    ease:"back.out(0.1)",
    opacity:1,
    x:55,
    y:0,
    rotation:0,
  },"-=0.1");

  return tl;
}
