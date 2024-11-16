// display data in modal
$(document).on("click",".view",function(){
    var medicineId = $(this).data('id');
    //var medicineId = $(this).data('id');

    $.ajax({
        type:"POST",
        data:{medicineId:medicineId},
        url: "../stock/includes/getMedicine.php",
        dataType:"text",
        success:function(response){
            $(".modal-body").html(response);
        },
        error:function(request, status, error){
            $(".modal-body").html(request.responseText);
        }
    })
});