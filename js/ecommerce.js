    $(".category_a").click(function () {
       var categ=$(this).data("value");
      var data=$('#sort_by_id :selected').val();        
        var values = new Array();
        $.each($("input[name='brand_name[]']:checked"), function() {
        values.push($(this).val());
        });
        $('#hidden_category').val(categ);
   $.ajax({
        url: "branch_checkbox.php",
        type: "post",
        data: {
            var:categ  
        },
        success: function (response) {

            $("#checkbox_page").html(response);
            var jsonString = JSON.stringify(values);
            $.ajax({
                url: "productspage.php",
                type: "post",
                data: {
                    data:data,
                    category:categ,
                    check_data:jsonString,
                    category_click:"1"
                },
                success: function (response) {
                    console.log(response);

                    $("#product_interface").html(response);
                    $("#sort_id").show();
                    $("#brand_id").show();
                // You will get response from your PHP page (what you echo or print)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
                }
            });        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
    });
    $("#sort_by_id").on('change',function () {
        var categ=$('#hidden_category').val();        
        var data=$(this).val();        
          var values = new Array();
          $.each($("input[name='brand_name[]']:checked"), function() {
          values.push($(this).val());
          });
          var jsonString = JSON.stringify(values);
            $.ajax({
                url: "productspage.php",
                type: "post",
                data: {
                    data:data,
                    category:categ,
                    check_data:jsonString,
                    category_click:"0"
                },
                success: function (response) {

                    $("#product_interface").html(response);
                // You will get response from your PHP page (what you echo or print)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
                }
            });        
          
    });
    

    $(".add-to-cart-button1").click(function () 
    {
        var stock=$(this).data("value");
        if(stock<50)
        {
            Swal.fire({
            title: 'hurry!',
            text: "only a few items left",
            icon: 'warning',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Add to Cart'
        });

    }
            else{
            Swal.fire({
            title: 'Item added to Cart',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Go to Cart'
        });
     } 
        
    }); 

    $("#product_interface").on('click',".add-to-cart-button",function () {
        var stock=$(this).data("value");
        if(stock<50)
        {
            Swal.fire({
            title: 'hurry!',
            text: "only a few items left",
            icon: 'warning',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Add to cart'
        });

    }
            else{
            Swal.fire({
            title: 'Item added to Cart',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Go to Cart'
        });
     } 
        
    });
        
    
    
 
  