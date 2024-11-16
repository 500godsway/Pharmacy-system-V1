$(document).ready(function (){
    //alertify.success('res.message');

    $(document).on('click', '.pIncreament', function(){

        var $quantityInput = $(this).closest('.quanitityBox').find('.qty');
        var $orderId = $(this).closest('.quanitityBox').find('.ordersId').val();
        var currentValue = parseInt($quantityInput.val());

        if(!isNaN(currentValue)) {
            var qtyVal = currentValue + 1;
            $quantityInput.val(qtyVal);
            quantityIncDec($orderId, qtyVal);
        }
    });

    $(document).on('click', '.pDecreament', function(){

        var $quantityInput = $ (this).closest('.quanitityBox').find('.qty');
        var $orderId = $(this).closest('.quanitityBox').find('.ordersId').val();
        var currentValue = parseInt($quantityInput.val());

        if (!isNaN(currentValue) && currentValue > 1) {
            var qtyVal = currentValue - 1;
            $quantityInput.val(qtyVal);
            quantityIncDec($orderId, qtyVal);
        }
    });
    function quantityIncDec($orId, $qty){
        
        $.ajax({
            type: "POST",
            url: "../includes/salesOrderAdd.php",
            data: {
                'orderIncDec': true,
                'orderId': $orId,
                'quantity': $qty                
            },
            success: function (response){

                var res = JSON.parse(response);

                if(res.status == 200) {
                    $('#orderArea').load(' #OrderContent');
                    alertify.success(res.message)
                }else{
                    $('#orderArea').load(' #OrderContent');
                    alertify.error(res.message);
                }
            }
        });
    }


    // continue to create order

    $(document).on('click', '.proceedToOrder', function () {

        var user = $('#user').val();
        //var area = $('#area').val();
        
        

        if(user == '' ){
            swal("User", "You must provide the user making the request","warning");
            return false;
        }

        var data = {
            'proceedToRequestBtn' : true,
            'user' : user,
            //'area' : area,

        };

        $.ajax({
            type: "POST",
            url: "../includes/requisationAdd.php",
            data: data,
            success: function (response){
                    var res = JSON.parse(response);

                    if(res.status == 200 ){
                        window.location.href = "../products/requisation-summery.php";
                    }else if (res.status == 404) {
                        swal(res.message, res.message, res.status_type, {
                            buttons:{
                                catch: {
                                    text: "Add Customer",
                                    value: "catch"
                                },
                                cancel: "Cancel"
                            }
                        })
                        .then((value) =>{
                            switch(value){
                                case "catch":
                                        $('#addCustomerModal').modal('show');
                                    //console.log('Pop the customer add modal');
                                    break;
                                    default:
                            }
                        });
                    } else{
                        swal(res.status, res.message, res.status_type);
                    }
            }
        });
    });
    // continue to create order end


    $(document).on('click', '#saveRequest', function()
    {

        $.ajax({
            type: "POST",
            url: "../includes/requisationAdd.php",
            data: {
                'saveRequest' : true,
                //'quantity' : quantity,
            },
            success: function (response){
                var res = JSON.parse(response);

                if(res.status == 200 ){
                    window.location.href = "../products/products.php";
                }else{
                    window.location.href = "../products/products.php";
                }
            }
        });
    });
 
    // continue to create request

    $(document).on('click', '.continueToOrder', function () {

        var username = $('#username').val();
        //var area = $('#area').val();
        
        

        if(username == '' ){
            swal("User", "You must provide the user making the request","warning");
            return false;
        }
        var data = {
            'continueToOrderBtn' : true,
            'username' : username,
            //'area' : area,

        };

        $.ajax({
            type: "POST",
            url: "../includes/salesOrderAdd.php",
            data: data,
            success: function (response){
                    var res = JSON.parse(response);

                    if(res.status == 200 ){
                        window.location.href = "../sales/orders-summery.php";
                    }else if (res.status == 404) {
                        swal(res.message, res.message, res.status_type, {
                            buttons:{
                                catch: {
                                    text: "Add Customer",
                                    value: "catch"
                                },
                                cancel: "Cancel"
                            }
                        })
                        .then((value) =>{
                            switch(value){
                                case "catch":
                                        $('#addCustomerModal').modal('show');
                                    //console.log('Pop the customer add modal');
                                    break;
                                    default:
                            }
                        });
                    } else{
                        swal(res.status, res.message, res.status_type);
                    }
            }
        });
    });
    // continue to create order end


    $(document).on('click', '#saveSalesOrder', function()
    {

        $.ajax({
            type: "POST",
            url: "../includes/salesOrderAdd.php",
            data: {
                'saveSalesOrder' : true
            },
            success: function (response){
                var res = JSON.parse(response);

                if(res.status == 200 ){
                    window.location.href = "../sales/salesOrdersList.php";
                }else{
                    window.location.href = "../sales/salesOrdersList.php";
                }
            }
        });
    });
 
});


 