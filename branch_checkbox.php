<?php
session_start();
$json_data = $_SESSION["product_data"];
      $category = $_POST['var'];    
      $array_category=array();
      foreach ($json_data["products"] as $key => $value) { 

          if($value["category"]==$category){
              array_push($array_category,$value["brand"]);
          }
      }
           ?>
          <div class="form-group">
          <div class="checkbox">
          <label>
          <input type="checkbox"  class="check productclass"  id="brand-all"  > Check All
          </label>
          <span class="badge border font-weight-normal">(<?php echo count($array_category)?>)</span>
          </div>
      <?php
      $count_value=array_count_values($array_category);
      foreach ($count_value as $key=>$value) {
          ?>
  <div class="checkbox">
  <label>
  <input type="checkbox" name="brand_name[]" class="check productclass" value="<?php echo $key?>" > <?php echo $key?>
  </label>
  <span class="badge border font-weight-normal">(<?php echo $value?>)</span>

  </div>
  <?php
      }
      ?>
      </div>
      <script>
var checkboxes = document.querySelectorAll('input[type=checkbox]');

// Iterate over the checkboxes
for (var i = 0; i < checkboxes.length; i++) {
  // Set the checked property to true
  checkboxes[i].checked = true;
}
 </script>
<script>
    $("#brand-all").click(function () {
    $(".check").prop('checked', $(this).prop('checked'));
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
                    check_data:jsonString,
                    category_click:"0"
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
</script>




