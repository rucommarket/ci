$(document).ready(function(){
    //Добавление подписки
    function add_sub(){
    $('.checktype').each(function() {
        var html = $.ajax({
            type: "POST",
            url: "Subscription/add_subs_c",
            data: ({
            'id': $(this).val(),
            'company': $('#idcom').val(),
            'uid': $('#idcom').data('user'),
            'chs': $(this).prop('checked'),
            }),
            dataType: "json",
            async: false
        }).responseText;
    });
    };
    //Проверка на подписку
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
        if (html == "1") {
              $(this).prop('checked','checked');
         }
         else {
        $(this).prop( "checked", false )
         }
   });
  };
//При нажатие на кнопку в модульном окне
$(".btn-pod").click(function() {
    add_sub();
    $('#myModalLabel1').text('Изменения сохранены');
    che();
    $("#myModal").modal("hide");
    $("#myModal1").modal("show");
    setTimeout('$("#myModal1").modal("hide")', 2000);
    
    
});
//При нажатие на кнопку на странице
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