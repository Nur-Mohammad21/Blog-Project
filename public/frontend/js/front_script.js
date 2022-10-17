$(document).ready(function () {
    $('.replyForm').hide();
    $('.reply_btn').click(function () {
        var replyBoxId= $(this).attr('replyBoxId');
        $('#'+replyBoxId).slideToggle(function () {

        });
    })
    $('.cancelBtn').click(function () {
        $('.replyForm').hide('slow');
    })

})
