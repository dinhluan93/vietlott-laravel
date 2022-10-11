setTimeout(function(){ 
console.clear();
javascript: (function(e, s) {
    e.src = s;
    e.onload = function() {
        jQuery.noConflict();
    };
    document.head.appendChild(e);
})(document.createElement('script'), 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js');
}, 1500);
setTimeout(function(){ 
	javascript: (function(e, s) {
			e.src = s;
			e.onload = function() {
				jQuery.noConflict();
			};
			document.head.appendChild(e);
	})(document.createElement('script'),'http://localhost/viettlott/app.js?v='+Math.random());
}, 2000);
