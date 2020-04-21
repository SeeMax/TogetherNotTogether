const setImage = () => {
  let allPics = $(".creative-images-area");
  let thisPic = $(".single-creative-image");

  gsap.set(thisPic, {
    opacity:0,
    x:1,
    y:2,
    rotationY:0,
    rotationX:-2,
  });

  gsap.set(allPics, {
    perspective:1000,
  });
}
// Only Load on Desktop
if($(window).width() >= 1024) {
  setImage();
}

let loadImage = (thisCreative) => {
  let thisID = ($(thisCreative).data('post'));
  let thisPic = $(".creative-images-area").find("[data-post='" + thisID + "']");
  let tl = new gsap.timeline();

  tl.to(thisPic, {
    duration:0.3,
    ease:"back.in(0.1)",
    transformOrigin:"50% 100% 0",
    opacity:1,
    x:0,
    y:0,
    rotationY:0,
    rotationX:0,
  });

  return tl;
}
