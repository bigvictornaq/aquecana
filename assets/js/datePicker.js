$(document).ready(function() {
    var date_input=$('input[name="fecha"]'); //Nestra fecha, el input tiene como nombre  "fecha"
    var container=$('.modal-body').length>0 ? $('.modal-body').parent() : "body";
    var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
    date_input.datepicker(options)
});