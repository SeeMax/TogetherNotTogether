const creativeNameAnimation = () => {
  // Only Load on Desktop
  if($(window).width() >= 1024) {

    $(".single-creative-title").each(function(i, el) {
      // Add Various Timelines from other js files | Use el for this
      let masterTL = new gsap.timeline({paused:true});
      let t = masterTL;
      masterTL.add(loadImage(el),'getcreative+=0.1');
      masterTL.add(loadDetails(el),'getcreative+=0.1');
      masterTL.add(loadLetters(el),'getcreative' );

      // Create A Variable for each timeline
      el.animation = t;
      // Control The Specific Timeline for Each Hovered Element
      $(this).on("mouseenter",function(){
        if ($('.menuToggle').hasClass("menuOpen")) {
          $('.single-creative-title').find('a').hide();
          return false;
        } else {
          this.animation.play();
        }
      }).on("mouseleave",function(){
        if ($('.menuToggle').hasClass("menuOpen")) {
          $('.single-creative-title').find('a').show();
          return false;
        } else {
          this.animation.reverse();
        }
      }).on("click",function(){
        this.animation.reverse();
      });
    });
  }
}
