$(document).ready(function(){
    function readData(data) {
        $contents = data.contents
        $text = '';
        for (i = 0; i < $contents.length; i++) {
	    $new_ = '';
            $text = $text + '<div class="col2 estate-items"><section><a href="'
            + $contents[i].href + '" /target="_blank">'
            + '<p class="img newproperty-info-img"><img src="' + $contents[i].img + '" alt="" />'
            +'</p><div class="cate-' + $contents[i].cate_room_style + '">' + $contents[i].room_style + '</div><h3>'
            + $contents[i].estate_name
            + $new_  + '</h3><p class="info-message">'
            + $contents[i].event_comment + '</p></a></section></div>';
        }
        $('#maincontent .multiple-items').html($text);

        var wid = $(window).width();
        if( wid > 480 ){
            $("document").ready(function(){
              $('#maincontent .multiple-items').slick({
                infinite: true,
                dots:false,
                swipe:true,
                slidesToShow: 4,
                slidesToScroll: 1
              });
            });
        }
    }

    $.ajax({
        type: "GET",
        url: "http://fdk.starmica-r.co.jp/toppage",
        dataType: "jsonp",
        success: function(data){
            readData(data)
        },
        error: function (xhr, ajaxOptions, thrownError) {
          alert(xhr.status);
          alert(thrownError);
        }
    })
});
