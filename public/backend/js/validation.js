$(document).ready(function () {
    $('#section').click(function () {
          var section_name = $('#section_name').val();
          if (section_name == '' )
          {
            $('.section_name_error').text('Section name is required.');
            return false;
          }
          else
          {
              return true;
          }
    });
});
