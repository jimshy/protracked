<?php 
 $selected_data=$_POST['data'];
 $category=$_POST['category'];
 $check_data=json_decode($_POST['check_data']);

        $url = "https://dummyjson.com/products?limit=100";
        $json = file_get_contents($url);
        $json_data = json_decode($json, true);
        $array_rating=array();
        $array_key=array();
        foreach ($json_data["products"] as $key => $value) {  
                    if($value["category"]==$category){
                        if (count($check_data)!=0){
                            if(in_array($value["brand"],$check_data)){
                            // array_push($array_category,$value["rating"]);
                            $array_rating[]=array("rating"=>$value["rating"],"title"=>$value["title"],"price"=>$value["price"],"discountpercentage"=>$value["discountPercentage"],"thumbnail"=>$value["thumbnail"],"id"=>$value["id"]);            
                    
                            }
                    }
                    else{$array_rating[]=array("rating"=>$value["rating"],"title"=>$value["title"],"price"=>$value["price"],"discountpercentage"=>$value["discountPercentage"],"thumbnail"=>$value["thumbnail"],"id"=>$value["id"]);}
             }
            
        }
        switch ($selected_data) {
          case "Price (High to Low)":
            $sort_variable="price";
            $sort_order=SORT_DESC;
            break;
          case "Price (Low to High)":
            $sort_variable="price";
            $sort_order=SORT_ASC;
            break;
          case "Discount(High to Low)":
            $sort_variable="discountpercentage";
            $sort_order=SORT_DESC;
            break;
          case "Discount(Low to High)":
            $sort_variable="discountpercentage";
            $sort_order=SORT_ASC;
            break;
          case "Rating (High to Low)":
            $sort_variable="rating";
            $sort_order=SORT_DESC;
            break;
          case "Rating (Low to High)":
            $sort_variable="rating";
            $sort_order=SORT_ASC;
            break;
          default:
          $sort_variable="";
          $sort_order="";
        }
            if($sort_variable!=""){
                $array_key=array_column($array_rating, $sort_variable);
                array_multisort($array_key, $sort_order,$array_rating);    
                for($i=0;$i<sizeof($array_rating);$i++){
                priceInterface($array_rating[$i]['thumbnail'],$array_rating[$i]['title'],$array_rating[$i]['price'],$array_rating[$i]['discountpercentage'],$array_rating[$i]['id'],$array_rating[$i]['rating']);
                }
              }
              else{
                $array_key=$array_rating;
                for($i=0;$i<sizeof($array_rating);$i++){
                  priceInterface($array_rating[$i]['thumbnail'],$array_rating[$i]['title'],$array_rating[$i]['price'],$array_rating[$i]['discountpercentage'],$array_rating[$i]['id'],$array_rating[$i]['rating']);
                  }
              }
            
            
        

        function priceInterface($thumbnail,$title,$price,$discount,$id_product,$rating){
?>
<div class="col-lg-4 col-md-6 col-sm-12 pb-1" >
            <div class="card product-item border-0 mb-4">
            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0" >
                <div style=" max-width: 100%"><center>
                <img style="object-fit: contain; height: 200px;" src="<?php echo $thumbnail?>" alt="">
                </center>
                </div>
            </div>
            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                <h6 class="text-truncate mb-3">
                  <?php echo $title?></h6>
                <div class="d-flex justify-content-center">
                <h6 style="color:green" class="ml-2"><?php echo $discount?>% Off</h6><h6 class="text-muted ml-2"><del><?php echo $price?></del></h6><h6 class="ml-2">&dollar;<?php echo round($price*(100-$discount)/100)?></h6>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light border">
                <a  data-value="<?php echo $id_product?>"  class="add-to-cart-button btn btn-sm text-dark p-0 pointer " >
                <i  class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                <a   class=" btn btn-sm text-dark p-0 pointer " >
                <i  class="fas fa-star text-primary mr-1"></i><?php echo $rating?></a>
            </div>
        </div>
        </div>
<?php



        }
        
        ?>
                        

                        