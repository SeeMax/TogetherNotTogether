const closeAbout = () => {
	let tl = new gsap.timeline();
	let about = $('.aboutArea');
	let title = $('.aboutToggle');
	let subTitle = $(about).find('h2');
	let aboutP = $(about).find('p');
	let emailBtn = $('.aboutEmailButtonArea');
	let singleLink = $(about).find('.aboutSingleLink');
	let uniTime = 0.3;
	let uniEase = Back.easeIn.config(0.5);
	let uniEase2 = Back.easeOut.config(0.5);

	$('.aboutToggle').removeClass("aboutOpen");
	tl.set(about, {zIndex:1});
	tl.to(title, {duration:uniTime, opacity:0.5, ease:uniEase}, "menuClose");
	tl.to(aboutP, {duration:uniTime, x:"121%", opacity:0, ease:uniEase, stagger:{amount:uniTime/2}}, "menuClose");
	tl.to(emailBtn, {duration:0.2, x:"121%", opacity:0, ease: uniEase2, stagger: {amount:uniTime}}, "menuClose+=0.1");
	tl.to(subTitle, {duration:0.2, x:"121%", opacity:0, ease: uniEase2, stagger: {amount:uniTime}}, "menuClose+=0.11");
	tl.to(singleLink, {duration:0.15, x:"121%", opacity:0, ease:uniEase, stagger:{amount:uniTime/3}}, "menuClose+=0.11");

	return tl;
}


const openAbout = () => {
	let tl = new gsap.timeline();
	let about = $('.aboutArea');
	let title = $('.aboutToggle');
	let subTitle = $(about).find('h2');
	let aboutP = $(about).find('p');
	let emailBtn = $('.aboutEmailButtonArea');
	let singleLink = $(about).find('.aboutSingleLink');
	let uniTime = 0.15;
	let uniEase = Back.easeIn.config(0.5);
	let uniEase2 = Back.easeOut.config(0.5);

	$('.aboutToggle').addClass("aboutOpen");
	tl.set(about, {zIndex:100});
	tl.to(title, {duration:uniTime, opacity:1, ease:uniEase}, "menuOpen");
	tl.to(aboutP, {duration:0.2, x:"0%", opacity:1, ease: uniEase2, stagger: {amount:uniTime/2}}, "menuOpen+=0.2");
	tl.to(emailBtn, {duration:0.2, x:"0%", opacity:1, ease: uniEase2, stagger: {amount:uniTime}}, "menuOpen+=0.25");
	tl.to(subTitle, {duration:0.2, x:"0%", opacity:1, ease: uniEase2, stagger: {amount:uniTime}}, "menuOpen+=0.27");
	tl.to(singleLink, {duration:0.2, x:"0%", opacity:1, ease: uniEase2, stagger: {amount:uniTime/3}}, "menuOpen+=0.27");

	return tl;
}
