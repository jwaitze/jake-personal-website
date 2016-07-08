// this is for preventing crawlers from taking my information
var myPhone = '8'+'6'+'0'+' '+'5'+'0'+'5'+' '+'9'+'6'+'9'+'4';
var myEmail = 'Jake'+String.fromCharCode(64)+'Waitze'+'.net'

function addHiddenLinks() {
	document.getElementById('hiddenPhoneLink').href += myPhone;
	document.getElementById('hiddenEmailLink').href += myEmail;
}

function addHiddenHTML() {
	document.getElementById('hiddenPhone').innerHTML += myPhone;
	document.getElementById('hiddenEmail').innerHTML += myEmail;
}