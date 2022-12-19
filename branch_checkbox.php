<?php
      $category = $_POST['var'];    
      $url = "https://dummyjson.com/products?limit=100";
      $json = file_get_contents($url);
      $json_data = json_decode($json, true);
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




