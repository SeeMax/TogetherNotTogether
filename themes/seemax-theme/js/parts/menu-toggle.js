if($(window).width() >= 1024) {
  // Close The Menu On Any Click that isn't part of the Menu
  $(document.body).on('click', function() {
    let masterTL = new gsap.timeline();
      masterTL.add(closeAbout(), "nomItUp");
      masterTL.add(closeMenu(), "nomItUp");
      masterTL.add(closeNom(), "nomItUp");
  });
}

$('.openNominate').on('click', function(e) {
  e.stopPropagation();
  let masterTL = new gsap.timeline();
  masterTL.add(openMenu(), "nomItUp");
  masterTL.add(openNom(), "nomItUp");
  masterTL.set($('.aboutToggle'), {opacity:0.5}, "nomItUp");
});

$('.menuSection').on('click', function(e) {
  e.stopPropagation();
});

// The Main Menu Opening
$('.menuToggle').on('click', function(e) {
  e.stopPropagation(); // this stops the event from bubbling up to the body

  if ($(this).hasClass("menuOpen")  && $('.nominateToggle').hasClass('nomOpen')) {

    let masterTL = new gsap.timeline();
		masterTL.add(closeNom(), "nomItUp");
		masterTL.add(closeMenu(), "nomItUp");
  }
  else if ($(this).hasClass("menuOpen") && $('.aboutToggle').hasClass('aboutOpen')) {

    let masterTL = new gsap.timeline();
		masterTL.add(closeAbout(), "nomItUp");
		masterTL.add(closeMenu(), "nomItUp");
  }
  else {

    let masterTL = new gsap.timeline();
		masterTL.add(openMenu(), "nomItUp");
    masterTL.add(openAbout(), "nomItUp");
  }
});

// Swap In the Nominate Form
$('.nominateToggle').on('click', function(e) {
  e.stopPropagation(); // this stops the event from bubbling up to the body

	if ($(this).hasClass("nomOpen")) {
    return;
	} else {
    $(this).addClass('nomOpen');
    $('.aboutToggle').removeClass("aboutOpen");
    let masterTL = new gsap.timeline();
		masterTL.add(openNom(), "nomItUp");
		masterTL.add(closeAbout(), "nomItUp");
	}
});

// Swap In the About Info
$(".aboutToggle").on('click', function(e) {
  e.stopPropagation(); // this stops the event from bubbling up to the body

	if ($(this).hasClass("aboutOpen")) {
    return;
  }
  else {
    $('.nominateToggle').removeClass('nomOpen');
    $(this).addClass("aboutOpen");
    let masterTL = new gsap.timeline();
		masterTL.add(closeNom(), "nomItUp");
		masterTL.add(openAbout(), "nomItUp");
  }
});

// Disable Scroll Via Jquery
$.fn.disableScroll = function() {
    window.oldScrollPos = $(window).scrollTop();

    $(window).on('scroll.scrolldisabler',function ( event ) {
       $(window).scrollTop( window.oldScrollPos );
       event.preventDefault();
    });
};

// ReEnable Scroll Via Jquery
$.fn.enableScroll = function() {
    $(window).off('scroll.scrolldisabler');
};


const closeMenu = () => {
	let tl = new gsap.timeline();
	let toggle = $(".menuToggle");
	let menu = $('.menuSection');
	let	ham1 = $(".hamTop");
	let ham2 = $(".hamMid");
	let	ham3 = $(".hamBot");
  let	hHam1 = $(".hovHamTop");
	let hHam2 = $(".hovHamMid");
	let	hHam3 = $(".hovHamBot");
	let h2 = $('.menuSectionToggle');
  let yellowSpans = $('.sub-spans');
  let header = $('.header');
	let uniTime = 0.3;
	let uniEase = Back.easeIn.config(0.5);
	let uniEase2 = Back.easeOut.config(0.5);

	$(toggle).removeClass("menuOpen");

  $(".wrapper").enableScroll();
	tl.to(menu, {duration:uniTime, x:"101%", ease:uniEase}, "menuClose+=0.1");
  tl.to(yellowSpans, {duration:uniTime, opacity:1, ease:uniEase}, "menuClose+=0.1");
	tl.to(h2, {duration:uniTime, x:"101%", opacity:0, ease:uniEase}, "menuClose");
	tl.to(ham1, {duration:uniTime/2, width:"100%", rotation:0, y:0, ease:uniEase}, "menuClose");
	tl.to(ham2, {duration:uniTime/2, x:0, width:"100%", ease:uniEase}, "menuClose");
	tl.to(ham3, {duration:uniTime/2, width:"100%", rotation:0, y:0, ease:uniEase}, "menuClose");
  tl.to(hHam1, {duration:uniTime/2, rotation:0, y:0, ease:uniEase}, "menuClose");
	tl.to(hHam2, {duration:uniTime/2, x:0, ease:uniEase}, "menuClose");
	tl.to(hHam3, {duration:uniTime/2, rotation:0, y:0, ease:uniEase}, "menuClose");

	return tl;
}


const openMenu = () => {
  let tl = new gsap.timeline();
	let toggle = $(".menuToggle");
	let menu = $('.menuSection');
	let	ham1 = $(".hamTop");
	let ham2 = $(".hamMid");
	let	ham3 = $(".hamBot");
  let	hHam1 = $(".hovHamTop");
	let hHam2 = $(".hovHamMid");
	let	hHam3 = $(".hovHamBot");
	let h2 = $('.menuSectionToggle');
  let header = $('.header');
  let yellowSpans = $('.sub-spans');
	let uniTime = 0.3;
	let uniEase = Back.easeIn.config(0.5);
	let uniEase2 = Back.easeOut.config(0.5);

	$(toggle).addClass("menuOpen");

  $(".wrapper").disableScroll();
  tl.to(menu, {duration:uniTime, x:"50%", ease: uniEase}, "menuOpen");
  tl.to(yellowSpans, {duration:uniTime, opacity:0, ease: uniEase}, "menuOpen");
	tl.to(h2, {duration:uniTime, x:"0%", opacity:1, ease: uniEase2}, "menuOpen+=0.15");
	tl.to(ham1, {duration:uniTime, rotation:405, y:2, width:10, ease: uniEase2}, "menuOpen");
	tl.to(ham2, {duration:uniTime, x:-7, width:'99%', ease: uniEase2}, "menuOpen");
	tl.to(ham3, {duration:uniTime, rotation:-405, y:-2, width:10, ease: uniEase2}, "menuOpen");
  tl.to(hHam1, {duration:uniTime, rotation:405, y:2, ease: uniEase2}, "menuOpen");
	tl.to(hHam2, {duration:uniTime, x:-7, ease: uniEase2}, "menuOpen");
	tl.to(hHam3, {duration:uniTime, rotation:-405, y:-2, ease: uniEase2}, "menuOpen");

	return tl;
}
