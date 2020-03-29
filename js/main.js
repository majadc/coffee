/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
( function() {
	var isIe = /(trident|msie)/i.test( navigator.userAgent );

	if ( isIe && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var id = location.hash.substring( 1 ),
				element;

			if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
				return;
			}

			element = document.getElementById( id );

			if ( element ) {
				if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false );
	}
} )();



let indexCardsLinks = document.getElementsByClassName('index-cards__link');
for ( let item of indexCardsLinks) {
	var handler = function() {
		item.classList.remove('index-cards__link--preload');
		item.removeEventListener('mouseover', handler);
	};
	item.addEventListener('mouseover', handler);
}



//cookies
var agreeButton = document.getElementById('button-agree');
var privacyPolicyBlock = document.getElementById('privacy-policy');

agreeButton.addEventListener('click', function() {
	setCookie('name', 'majadc', 360);
	privacyPolicyBlock.classList.add('hidden');
});
function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime( d.getTime() + ( exdays*24*60*60*1000 ) );
	var expires = "expires=" + d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";" + expires + "path=/";
}

function getCookie(cname) {
	var name = cname + "=";
	var decodedCookie = decodeURIComponent(document.cookie);
	var ca = decodedCookie.split(';');
	for ( var i = 0; i < ca.length; i ++ ) {
		var c = ca[i];
		while ( c.charAt(0) == ' ' ) {
			c = c.substring(1);
		}
		if ( c.indexOf(name) == 0 ) {
			return c.substring(name. length, c.length);
		}
	}
	return "";
}
function checkCookie() {
	var username = getCookie("name");
	if ( username != "" ) {
		privacyPolicyBlock.classList.add('hidden');
	} else {
		privacyPolicyBlock.classList.remove('hidden');
	}
}
window.addEventListener('load', function () {
	checkCookie();
});
