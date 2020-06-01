//**  **///
(function(){
  //write code here
      $('#list_data_table').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true
    });
})();  

//** data mask **///
(function(){
    $("[data-mask]").inputmask();
})();  

//******** Datepicker ********//
(function () {
   $('.hearingDate').datepicker({
      autoclose: true
    });

})();
    



//******** icheck ********//
$(function () {
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });
});