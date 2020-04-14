const aboutLiHover = () => {
  $(".aboutSingleLink").each(function(i, el) {
    // Add Various Timelines from other js files | Use el for this
    let masterTL = new gsap.timeline({paused:true});
    let theseChars = $(this).find('.aboutChars');
    let t = masterTL.to(theseChars, {
                        duration:0.25,
                        ease:"back.out(0.1)",
                        x:1,
                        y:-1,
                        stagger: {
                          amount:0.15,
                        }
                      })
                      .to($(this), {
                        duration:0.07,
                        x:1,
                        y:-1,
                      },'-=0.15');

    // Create A Variable for each timeline
    el.animation = t;
    // Control The Specific Timeline for Each Hovered Element
    $(this).on("mouseenter",function(){
        this.animation.play();
    }).on("mouseleave",function(){
        this.animation.reverse();
    });
  });
}


const aboutSplitSetup = () => {
  // let aboutLinkSplit = new SplitText($('.about-item'), {type:"words,chars"});

  const aboutSplit = () => {
    aboutLinkSplit = new SplitText($('.aboutSingleLink'), {type:"words,chars"});
    let aboutWords = aboutLinkSplit.words;
    let aboutChars = aboutLinkSplit.chars;

    $(aboutWords).addClass('aboutWords');
    $(aboutChars).addClass('aboutChars');

    gsap.set(aboutChars, {
      // opacity:0,
      x:-1,
      y:1,
      rotationY:0,
      rotationX:0,
      // Once this is all setup enable the hover aniamtion above
      onComplete: function() {
        aboutLiHover();
      }
    });
    // Return the TextSplit Object to be reset / used in other Functions
    return aboutLinkSplit;
  }
  aboutSplit();

  // Access the TextSplit object form the aboutSplitFunction
  let aboutLinkSplit;


  // Reset Text On Window Resize
  window.addEventListener('resize', function(event){
    // Reset the TextSplit
    aboutLinkSplit.revert();
    // Redo the TextSplit
    aboutSplit();
  });
}
aboutSplitSetup();
