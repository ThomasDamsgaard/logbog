$('select[name="department"]').on('change', function(){
  const id = $(this).val().split('|', 1);
  if(id) {
    $.ajax({
      url: '/supervisors/get/'+ id,
      type:"GET",
      dataType:"json",
      success:function(data) {
        $('select[name="supervisor"]').empty();
        $.each(data, function(key, value) {
          $('select[name="supervisor"]').append('<option value="'+ key +'">' + value + '</option>');
        });
      }
    });
  } else {
    $('select[name="supervisor"]').append('<option value="">Fejl</option>');
  }
});
