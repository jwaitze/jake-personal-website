// this is for preventing crawlers from taking my information
var myPhone = '8'+'6'+'0'+' '+'5'+'0'+'5'+' '+'9'+'6'+'9'+'4';
var myEmail = 'Jake'+String.fromCharCode(64)+'Waitze'+'.net'

function addHiddenLinks() {
	var elements =  document.getElementsByClassName('hiddenPhoneLink');
	for(var i = 0; i < elements.length; i++)
		elements[i].href  += myPhone;

	elements =  document.getElementsByClassName('hiddenEmailLink');
	for(var i = 0; i < elements.length; i++)
		elements[i].href  += myEmail;
}

function addHiddenHTML() {
	var elements =  document.getElementsByClassName('hiddenPhone');
	for(var i = 0; i < elements.length; i++)
		elements[i].innerHTML  += myPhone;

	elements =  document.getElementsByClassName('hiddenEmail');
	for(var i = 0; i < elements.length; i++)
		elements[i].innerHTML  += myEmail;
}

function showMainBody() {
	document.getElementById('mainBody').style.display = 'block';
	document.getElementById('openBody').style.display = 'none';
}

function hideMainBody() {
	document.getElementById('mainBody').style.display = 'none';
	document.getElementById('openBody').style.display = 'block';
}

function showMobileMenu() {
	document.getElementById('mobileMenu').style.display = 'block';
}

function hideMobileMenu() {
	document.getElementById('mobileMenu').style.display = 'none';
}