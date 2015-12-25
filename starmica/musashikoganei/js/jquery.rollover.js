function initRollOverImages() {
	var image_cache = new Object();
	$("#header .right .btn img,#globalnavi li img,#container .content-info li img,#content-top-banner li img,#footer .item1 p.btn img,#banner-area .nairanbox li img").not("[src*='_on.']").each(function(i) {
		var imgsrc = this.src;
		var dot = this.src.lastIndexOf('.');
		var imgsrc_on = this.src.substr(0, dot) + '_on' + this.src.substr(dot, 4);
		image_cache[this.src] = new Image();
		image_cache[this.src].src = imgsrc_on;
		$(this).hover(
			function() { this.src = imgsrc_on; },
			function() { this.src = imgsrc; }
		);
	});
}
$(document).ready(initRollOverImages);