$(document).ready(function(){
    $(".close a").click(function(){
        parent.jQuery.fancybox.close();
    });
})

function goBack()
{
    window.location.href = "contact/contact_step1";
}