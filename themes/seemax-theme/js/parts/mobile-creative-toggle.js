const creativeInfoSetup = () => {
  let imgBox = $('.mobileImageContainer');
  let infoBox = $('.mobile-featured-info');
  let image = $(".mobile-single-creative-image");
  let hName = $(".mobile-name-hidden");
  let pName = $(".plainName");
  let title = $(".mobileFeaturedTitle");
  let advice = $(".mobile-featured-advice");
  let link = $(".mobile-website-link");
  let tl = new gsap.timeline();

  tl.set(image, {opacity:0,rotationX:10});
  tl.set([title,link], {opacity:0,rotationX:-30,y:75});
  tl.set(advice, {opacity:0,rotationX:30,y:75});
  // tl.set(hName, {opacity:0,rotationX:30});
  tl.set(imgBox, {perspective:1000});
  tl.set(infoBox, {perspective:1000});
}

const setupEachCreatives = (thisOne) => {
  // Hide All Info, Fired After Each Is Setup
  const setHeight = () => {
    let allDeets = $('.mobileDetailsContainer');
    let allImg = $('.mobileImageContainer');
    gsap.set([allDeets, allImg], {height:0});
  }

  $('.single-creative-title').each(function(){

    let deets = $(this).find('.mobile-featured-creative-text');
    let deetHeight = $(deets).outerHeight();
    let img = $(this).find('.mobile-single-creative-image');
    let imgHeight = $(img).outerHeight();
    let pName = $(this).find(".plainName");
    let pNameHeight = $(pName).outerHeight();

    $(this).attr({'data-deets':deetHeight,'data-img':imgHeight, 'data-high':pNameHeight});
  }).promise().done(setHeight());
  // After Each Is Complete Setup the Height at 0
}


const creativeMobileAnimationEnter = (thisPerson) => {
  let image = $(thisPerson).find(".mobile-single-creative-image");
  let hName = $(thisPerson).find(".mobile-name-hidden");
  let pName = $(thisPerson).find(".plainName");
  let title = $(thisPerson).find(".mobileFeaturedTitle");
  let advice = $(thisPerson).find(".mobile-featured-advice");
  let link = $(thisPerson).find(".mobile-website-link");
  let deets = $(thisPerson).find('.mobileDetailsContainer');
  let deetHeightTo = $(thisPerson).attr('data-deets');
  let img = $(thisPerson).find('.mobileImageContainer');
  let imgHeightTo = $(thisPerson).attr('data-img');
  let plainName = $(thisPerson).find('.plainName');

    let tl = new gsap.timeline({
      defaults:{
        ease:"back.out(0.7)",
        transformOrigin:"100% 100% 0",
        duration:0.3,
        opacity:1,
        rotationX:0,
        y:0,
      }
    });

    $('html, body').animate({
      scrollTop: $(thisPerson).offset().top - 100
    },300);

    tl.to(deets, {height:deetHeightTo}, 'mobilize');
    tl.to(img, {height:imgHeightTo}, 'mobilize');
    tl.to(plainName, {height:0}, 'mobilize');
    // tl.to(hName, {}, 'mobilize+=0.2');
    tl.to(title, {}, 'mobilize+=0.2');
    tl.to(advice, {}, 'mobilize+=0.24');
    tl.to(link, {}, 'mobilize+=0.28');
    tl.to(image, {onComplete:function() {
      $(thisPerson).addClass('theOpenOne')}
    }, 'mobilize+=0.22');
    return tl;
}

const creativeMobileAnimationLeave = (thisPerson) => {
  let image = $(thisPerson).find(".mobile-single-creative-image");
  let hName = $(thisPerson).find(".mobile-name-hidden");
  let pName = $(thisPerson).find(".plainName");
  let title = $(thisPerson).find(".mobileFeaturedTitle");
  let advice = $(thisPerson).find(".mobile-featured-advice");
  let link = $(thisPerson).find(".mobile-website-link");
  let deets = $(thisPerson).find('.mobileDetailsContainer');
  let img = $(thisPerson).find('.mobileImageContainer');
  let plainName = $(thisPerson).find('.plainName');
  let thisPname = $(thisPerson).find('.plainName');
  let pNameHeightTo = $(thisPname).attr('data-high');

  let tl = new gsap.timeline({
    defaults:{
      ease:"back.in(0.6)",
      transformOrigin:"100% 100% 0",
      duration:0.3,
      opacity:0,
    }
  });

  tl.to([title,link], {rotationX:-30,y:75,transformOrigin:"0% 100% 0"}, 'mobilize');
  tl.to(advice, {rotationX:30,y:75}, 'mobilize');
  // tl.to(hName, {rotationX:30}, 'mobilize');
  tl.to(image, {rotationX:10}, 'mobilize');
  tl.to(deets, {height:0}, 'mobilize+=0.2');
  tl.to(img, {height:0}, 'mobilize+=0.2');
  tl.to(plainName, {height:'auto'}, 'mobilize+=0.2');
  tl.to(plainName, {height:pNameHeightTo, opacity:1, rotationX:0, y:0, onComplete:function() {
    $(thisPerson).removeClass('theOpenOne')}
  }, 'mobilize+=0.2');

  return tl;
}


$(window).on("load", function() {

  if($(window).width() <= 1024) {
    // Set Everything Up
    creativeInfoSetup();
    setupEachCreatives();

    $('.single-creative-title').on('click',function() {

      // Make sure it's not the nominate link
      if($(this).hasClass('nominate-link')) {
        return false;
      } else {
        // don't do anything if it's already open
        if($(this).hasClass('theOpenOne')) {
          creativeMobileAnimationLeave($(this));
        } else {
          //Add theOpenOne is done via GSAP call back above / in this function
          creativeMobileAnimationEnter($(this));
        }
      }

    });//On Click
  }//1024 Size Check
});//Window Load Check
