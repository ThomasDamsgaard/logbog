$('select[name="supervisor"]').on('change', function(){
  const id = $(this).val().split('|', 2);
  if(id[1] == 1) {
    $.ajax({
      url: '/supervisors/active/get/'+ id,
      type:"GET",
      dataType:"json",
      success:function(data) {
        $('select[name="active"]').empty();
        $('select[name="active"]').append('<option selected value="1">Aktiv</option>');
        $('select[name="active"]').append('<option value="0">Inaktiv</option>');
      }
    });
  } else if (id[1] == 0){
    $.ajax({
      url: '/supervisors/active/get/'+ id,
      type:"GET",
      dataType:"json",
      success:function(data) {
        $('select[name="active"]').empty();
        $('select[name="active"]').append('<option value="1">Aktiv</option>');
        $('select[name="active"]').append('<option selected value="0">Inaktiv</option>');
      }
    });
  } else {
    $('select[name="active"]').empty();
    $('select[name="active"]').append('<option value="">Fejl - Kontakt Søren</option>');
  }
});

$('select[name="department_status"]').on('change', function(){
  const id = $(this).val().split('|', 2);
  console.log(id);
  if(id[1] == 1) {
    $.ajax({
      url: '/departments/active/get/'+ id,
      type:"GET",
      dataType:"json",
      success:function(data) {
        $('select[name="department_active"]').empty();
        $('select[name="department_active"]').append('<option selected value="1">Aktiv</option>');
        $('select[name="department_active"]').append('<option value="0">Inaktiv</option>');
      }
    });
  } else if (id[1] == 0){
    $.ajax({
      url: '/departments/active/get/'+ id,
      type:"GET",
      dataType:"json",
      success:function(data) {
        $('select[name="department_active"]').empty();
        $('select[name="department_active"]').append('<option value="1">Aktiv</option>');
        $('select[name="department_active"]').append('<option selected value="0">Inaktiv</option>');
      }
    });
  } else {
    $('select[name="department_active"]').empty();
    $('select[name="department_active"]').append('<option value="">Fejl - Kontakt Søren</option>');
  }
});
