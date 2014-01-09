$(document).ready(function() {
    $(".header").scrollToFixed();
    $('.status_footer').tabSlideOut({
        tabHandle: '.handle', //class of the element that will be your tab
        pathToTabImage: share_image, //path to the image for the tab
        imageHeight: '50px',   //height of tab image
        imageWidth: '50px',  //width of tab image
        tabLocation: 'bottom',  //side of screen where tab lives, top, right, bottom, or left
        speed: 300, //speed of animation
        action: 'click', //options: 'click' or 'hover', action to trigger animation
        topPos: null,  //position from the top
        fixedPosition: true,  //options: true makes it stick(fixed position) on scroll
        onLoadSlideOut: true
    });
    
    //window.setInterval(get_status, 6000);

    $('textarea, input[type=text]').avro({"bangla":false}, function(isB){
        if(isB) {
            $('#kb').html("Bangla")
            $('#kb2').html("English")

        } else {
            $('#kb').html("English")
            $('#kb2').html("Bangla")
        }
    });

});

function insert_status()
{
    var text = $('#share').val();
    $.post( base_url + "ajax/insert_status", {"status":text},function( data ) {
        //data.status
    },'json');
    get_status();
}
function get_status()
{
    $.get( base_url + "ajax/get_status", function( data ) {
        $( "#status_list" ).html( data );
    });
}
function get_comments(status_id) {
    var obj = $( "#comment_"+status_id );
    $.get( base_url + "ajax/get_comments/"+status_id, function( data ) {
        $( "#comment_"+status_id ).html( data );
    });

    console.log(obj.css('display'));
}
function send_comment(status_id) {
    var comment = $("#comment_text_"+status_id).val();
    var data = {comment: comment, status_id: status_id}
    $.post( base_url + "ajax/send_comment", data, function(data){
        get_comments(status_id);
    });
}
