$(document).ready(function (){
    //alertify.success('res.message');

    $(document).on('click', '.increament', function(){

        var $quantityInput = $(this).closest('.qtyBox').find('.qty');
        var $productId = $(this).closest('.qtyBox').find('.prodId').val();
        var currentValue = parseInt($quantityInput.val());

        if(!isNaN(currentValue)) {
            var qtyVal = currentValue + 1;
            $quantityInput.val(qtyVal);
            quantityIncDec($productId, qtyVal);
        }
    });
    $(document).on('click', '.decreament', function(){

        var $quantityInput = $ (this).closest('.qtyBox').find('.qty');
        var $productId = $(this).closest('.qtyBox').find('.prodId').val();
        var currentValue = parseInt($quantityInput.val());

        if (!isNaN(currentValue) && currentValue > 1) {
            var qtyVal = currentValue - 1;
            $quantityInput.val(qtyVal);
            quantityIncDec($productId, qtyVal);
        }
    });
   

    
    $(document).on('click', '.pIncreament', function(){

        var $quantityInput = $(this).closest('.qtyBox').find('.quantityInput');
        var $productId = $(this).closest('.qtyBox').find('.reqId').val();
        var currentValue = parseInt($quantityInput.val());

        if(!isNaN(currentValue)) {
            var qtyVal = currentValue + 1;
            $quantityInput.val(qtyVal);
            quantityIncDec($productId, qtyVal);
        }
    });

    $(document).on('click', '.pDecreament', function(){

        var $quantityInput = $ (this).closest('.qtyBox').find('.quantityInput');
        var $productId = $(this).closest('.qtyBox').find('.reqId').val();
        var currentValue = parseInt($quantityInput.val());

        if (!isNaN(currentValue) && currentValue > 1) {
            var qtyVal = currentValue - 1;
            $quantityInput.val(qtyVal);
            quantityIncDec($productId, qtyVal);
        }
    });

    function quantityIncDec($prodId, qty){
        
        $.ajax({
            type: "POST",
            url: "../admins/invoiceAdd.php",
            data: {
                'productIncDec': true,
                'productId': $prodId,
                'quantity': qty                
            },
            success: function (response){

                var res = JSON.parse(response);

                if(res.status == 200) {
                    $('#productArea').load(' #productContent');
                    alertify.success(res.message)
                }else{
                    $('#productArea').load(' #productContent');
                    alertify.error(res.message);
                }
            }
        });
    }

    // continue to create order

    $(document).on('click', '.proceedToPlace', function () {

        var cphone = $('#cphone').val();
        var transactionCode = $('#transactionCode').val();
        var pAmount = $('#pAmount').val();
        var balance = $('#balance').val();
        var payment_mode = $('#payment_mode').val();
        //console.log('proceedToPlace');

        if(payment_mode == ''){
            swal("Select Payment Mode", "Select your payment mode","warning");
            return false;
        }
        if(cphone == '' && !$.isNumeric(cphone)){
            swal("Enter Phone Number", "Enter Valid Phone Number","warning");
            return false;
        }

        var data = {
            'proceedToPlaceBtn' : true,
            'cphone' : cphone,
            'pAmount' : pAmount,
            'transactionCode' : transactionCode,
            'balance' : balance,
            'payment_mode': payment_mode,
        };
        $.ajax({
            type: "POST",
            url: "../admins/invoiceAdd.php",
            data: data,
            success: function (response){
                    var res = JSON.parse(response);

                    if(res.status == 200 ){
                        window.location.href = "../sales/invoice-summery.php";

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


    $(document).on('click', '#saveOrder', function()
    {

        $.ajax({
            type: "POST",
            url: "../admins/invoiceAdd.php",
            data: {
                'saveOrder' : true
            },
            success: function (response){
                var res = JSON.parse(response);

                if(res.status == 200 ){
                    swal("Success", "Order Place successfully","success");
                    window.location.href = "../sales/print.php";
                }else{
                    swal("User", "Failed to add Order","warning");
                }
            }
        });
    });
 
    

});

function printmyBillingArea() {

    var divContents = document.getElementById("myBillingArea").innerHTML;
    var a = window.open('','');
    a.document.write('<body style="font-family:fangsong; width:500px;">');
    a.document.write(divContents);
    a.document.write('</body></html>');
    a.document.close();
    a.print();
}
window.jsPDF = window.jspdf.jsPDF;
var docPDF = new jsPDF();

 function downloadPDF (invoiceNo) {
    var elementHTML = document.querySelector("#myBilingArea");
    docPDF.html(elementHTML,{
        callback: function(){
            docPDF.save(invoiceNo+'.pdf');
        },
        x: 15,
        y: 15,
        width: 170,
        windowWidth: 650
    });
    
 }

 // Sales order
 $(document).on('click', '.salesOderPlace', function () {

    var phone = $('#phone').val();
    var medicineName = $('#medicineName').val();
    var shippingStatus = $('#shippingStatus').val();
    var customer = $('#customer').val();
    var location = $('#location').val();
    //console.log('proceedToPlace');

    if(medicineName == ''){
        swal("Select Medicine", "Select medicine","warning");
        return false;
    }

    if(customer == '' ){
        swal("Enter customer", "Enter Customer name","warning");
        return false;
    }

    var data = {
        'continueToPlaceBtn' : true,
        'phone' : phone,
        'customer' : customer,
        'medicineName' : medicineName,
        'shippingStatus' : shippingStatus,
        'location': location,
    };

    $.ajax({
        type: "POST",
        url: "../admins/salesOrderAdd.php",
        data: data,
        success: function (response){
                var res = JSON.parse(response);

                if(res.status == 200 ){
                    window.location.href = "../sales/invoice-summery.php";

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

