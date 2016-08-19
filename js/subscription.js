$(document).ready(function(){
    
    function add_sub {
        var html = $.ajax({
            type: "POST",
            url: "Subscription/get_subs_c",
            data: ({
            'id': $(this).val(),
            'company': $('#idcom').val(),
            'uid': $('#idcom').data('user'),
            }),
            dataType: "json",
            async: false
        }).responseText;
    };
    
  function che() {
  $('.checktype').each(function() {
        var html = $.ajax({
            type: "POST",
            url: "Subscription/get_subs_c",
            data: ({
            'id': $(this).val(),
            'company': $('#idcom').val(),
            'uid': $('#idcom').data('user'),
            }),
            dataType: "json",
            async: false
        }).responseText;
$('#myModalLabel1').text($('#myModalLabel1').text()+' '+html);
   if (html == "1") {
        $(this).prop('checked','checked');
    }
    else {
        $(this).prop( "checked", false )
    }
  });
  };
  $(".btn-pod").click(function() {
che();
});
$(".btn-pd").click(function() {
    //открыть модальное окно с id="myModal"
    $("#myModal").modal('show');
    comp_n = $(this).data('comp');
    $("#idcom").val($(this).data('compid'));
    comp_id = $("#idcom").val();
    $('#myModalLabel').text(comp_id+'| '+comp_n);
    $('#myModalLabel1').text();
    $('.btn-pod').attr('data-compnp',comp_id);
    che();
            
  });

});