  $(document).ready(function() {
    $('#myForm').submit(function(e) {
      e.preventDefault();
      $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: $(this).serialize(),
        dataType: 'json',
        success: function(data) {
          if (data.success) {
            alert('Message sent successfully!');
          } else {
            alert('Error: ' + data.errors);
          }
        }
      });
    });
  });