$("#brand-all").click(function () {
    $(".check").prop('checked', $(this).prop('checked'));
});

    $(".category_a").click(function () {
        $("#sort_id").show();
        $("#brand_id").show();

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
                    check_data:jsonString
                },
                success: function (response) {
                    console.log(response);

                    $("#product_interface").html(response);
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
    $(".check").click(function () {
        var categ=$('#hidden_category').val();        ;
        var data=$('#sort_by_id :selected').val();        
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
                    check_data:jsonString
                },
                success: function (response) {
                    console.log(response);

                    $("#product_interface").html(response);
                // You will get response from your PHP page (what you echo or print)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
                }
            });        
          
    });

    $("#sort_by_id").on('change',function () {
        var categ=$('#hidden_category').val();        ;
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
                    check_data:jsonString
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
        var id=$(this).data("value");

        $.ajax({
                url: "add_to_cart_prompt_message.php",
                type: "post",
                data: {
                    data:id
                   
                },
                success: function (response) {
                    if(response==true){
                        Swal.fire({
                            title: 'hurry!',
                            text: "only a few items left",
                            icon: 'warning',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Buy'
                          });
                          
                                              }
                                              else{
                                                  Swal.fire({
                            title: 'Item added to Cart',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Go to Cart'
                          });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
                }
            });  
        
    });
    
 
  