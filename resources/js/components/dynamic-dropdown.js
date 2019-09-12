$('select[name="department"]').on('change', function(){
  var id = $(this).val();
  if(id) {
    $.ajax({
      url: '/supervisors/get/'+id,
      type:"GET",
      dataType:"json",
      success:function(data) {
        $('select[name="supervisor"]').empty();
        $.each(data, function(key, value) {
          $('select[name="supervisor"]').append('<option value="'+ value +'">' + value + '</option>');
        });
      }
    });
  } else {
    $('select[name="state"]').empty();
  }
});
