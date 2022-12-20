<a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" >
                    <?php
$json_data = $_SESSION["product_data"];
$array_category=array();
foreach ($json_data["products"] as $key => $value) {  
    array_push($array_category,$value["category"]);

}
 $unique=array_unique($array_category);

foreach ($unique as $value) {
    ?><a data-value="<?php echo $value?>" class="category_a nav-item nav-link" style="cursor:pointer"><?php echo $value?></a><?php
}

?>
                        
                    
            
                    </div>
                </nav>