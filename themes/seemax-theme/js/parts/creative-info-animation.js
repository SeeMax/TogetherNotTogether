const setDetails = () => {
  let thisDeets = $('.singleCreativeTitle');
  let name = $('.featuredName');
  let title = $('.featuredTitle');
  let advice = $('.featuredAdvice');

  gsap.set(thisDeets, {
    perspective:800,
  });
  gsap.set([name,title,advice], {opacity:0, rotationX:-5});
}

// Only Load on Desktop
if($(window).width() >= 1024) {
  setDetails();
}


let loadDetails = (thisCreativeDeets) => {
  let thisID = ($(thisCreativeDeets).data('post'));
  let thisDeets = $(".creative-details-area").find("[data-post='" + thisID + "']");
  let name = $(thisDeets).find('.featuredName');
  let title = $(thisDeets).find('.featuredTitle');
  let advice = $(thisDeets).find('.featuredAdvice');

  let tl = new gsap.timeline({
    defaults:{
      ease:"back.in(0.1)",
      transformOrigin:"50% 100% 0",
      duration:0.3,
      opacity:1,
      rotationX:0,
    }
  });

  tl.to([title,name,advice], {});

  return tl;
}
