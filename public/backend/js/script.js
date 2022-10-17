$(document).ready(function() {
    $(document).on('click', '.status', function() {
        var status = $(this).children('i').attr('status');
        var record = $(this).attr('record');
        var record_id = $(this).attr('record_id');
        $.ajax({
            url: '/update-status-' + record,
            type: 'post',
            data: { status: status, record_id: record_id },
            success: function(response) {
                if (response.status == 1) {
                    $('#status-' + record_id).html("<i class='fas fa-2x fa-toggle-on' status='active'></i>");
                    $.notify(
                        "Status active successfully.",
                        "success", { position: "top right" }
                    );

                } else {
                    $('#status-' + record_id).html("<i class='fas fa-2x fa-toggle-off' status='inactive'></i>");
                    $.notify(
                        "Status inactive successfully.",
                        "success", { position: "top right" }
                    );
                }
            },
            error: function(response) {
                alert('Problem');
            }
        })
    });
    $(document).on('keyup', '#current_password', function() {
        var current_password = $(this).val();
        $.ajax({
            url: '/check-current-password',
            method: 'post',
            data: { current_password: current_password },
            success: function(res) {
                if (res == true) {
                    $('.match_password').removeClass('text-danger');
                    $('.match_password').addClass('text-success');
                    $('.match_password').text('Matched Password');
                } else {
                    $('.match_password').addClass('text-danger');
                    $('.match_password').text('Password does not match');

                }
            },
            error: function() {
                alert('Problem');
            }

        });
    })
})