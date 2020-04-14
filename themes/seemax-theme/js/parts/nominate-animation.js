const closeNom = () => {
	let tl = new gsap.timeline({});
	let fullForm = $('.nominateForm');
	let title = $('.nominateToggle');
	let paras = $(fullForm).find('p');
	let form = $(fullForm).find('form');
	let formInfo = $('.wpcf7-response-output');
	let	uniTime = 0.15;
	let	uniEase = Back.easeIn.config(1);

	$('.nominateToggle').removeClass("nomOpen");
	tl.set(fullForm, {zIndex:1});
	tl.to(paras, {duration:uniTime, x:'121%', opacity:0, ease:uniEase, stagger:{amount:uniTime/2}}, "nomClose");
	tl.to(form, {duration:uniTime, x:75, ease:uniEase}, "nomClose");
	tl.to(formInfo, {duration:uniTime, opacity:0, x:75, ease:uniEase}, "nomClose");
	tl.to(title, {duration:uniTime*2, opacity:0.5, ease:uniEase}, "nomClose");
}

const openNom = () => {
	let tl = new gsap.timeline({});
	let fullForm = $('.nominateForm');
	let title = $('.nominateToggle');
	let paras = $(fullForm).find('p');
	let form = $(fullForm).find('form');
	let formInfo = $('.wpcf7-response-output');
	let	uniTime = 0.2;
	let	uniEase = Back.easeIn.config(1);
	let	uniEase2 = Back.easeOut.config(1);

	$('.nominateToggle').addClass("nomOpen");
	tl.set(fullForm, {zIndex:100});
	tl.to(title, {duration:uniTime, opacity:1, ease:uniEase}, "nomOpen");
	tl.to(formInfo, {duration:uniTime, x:0, opacity:1, ease:uniEase}, "nomClose");
	tl.to(form, {duration:uniTime, x:0, ease:uniEase}, "nomClose");
	tl.to(paras, {duration:uniTime, x:0, opacity:1, ease:uniEase2, stagger:{amount:uniTime/2}}, "nomOpen+=0.28");

	return tl;
}
