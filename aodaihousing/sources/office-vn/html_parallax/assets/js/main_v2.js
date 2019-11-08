jQuery(window).load(function(){
	var isiDevice = /ipad|iphone|ipod/i.test(navigator.userAgent.toLowerCase());
	var isAndroid = /android/i.test(navigator.userAgent.toLowerCase());
	var isBlackBerry = /blackberry/i.test(navigator.userAgent.toLowerCase());
	var isWindowsPhone = /windows phone/i.test(navigator.userAgent.toLowerCase());
	var isWebOS = /webos/i.test(navigator.userAgent.toLowerCase());

	endScroll = 7000;
    
	if(!isAndroid && isiDevice==false && isBlackBerry==false && isWindowsPhone==false && isWebOS==false){
		var s = skrollr.init({
			constants:{
				end: endScroll
			},
			render: function(data){
				//console.log(data.curTop);
			}
		});
	}
})

(function (){
    var els = [	'section', 'article', 'hgroup', 'header', 'footer', 'nav', 'aside', 
	'figure', 'mark', 'time', 'ruby', 'rt', 'rp' ];
    for (var i=0; i<els.length; i++){
        document.createElement(els[i]);
    }
})();

















