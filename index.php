<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Protracked</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>    <!-- Include the Sweet Alert CSS file -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

    <!-- Include the Sweet Alert JavaScript file -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">PROTRACKED</span></h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">0</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
            
            </div>
            <div class="col-lg-9">
                
            </div>
        </div>
    </div>
    <!-- Navbar End -->


   


    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Product Listing Start -->
            <div class="col-lg-3 col-md-12">
            <div class="border-bottom mb-4 pb-4">
            <?php include "category.php";
                ?>
            </div>
            
                <!-- Filter by Brand Start -->

                <div class="border-bottom mb-4 pb-4" id="brand_id" style="display:none">
                    <h5 class="font-weight-semi-bold mb-4">Filter by Brand</h5>
                    
                    <form role="form" id="checkbox_page">
 
 
                </form>
                </div>
                
                <!-- Filter by Brand End -->
                
       
            </div>
            <!-- Product Listing End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="">
                                <div class="input-group">
                                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                </nav>
                                </div>
                            </form>
                            
                            <div class="dropdown ml-4" id="sort_id" style="display:none">

                            <select class="form-select" id="sort_by_id" aria-label="Default select example">
                            <option selected>Sort by</option>
                            <option value="Rating (Low to High)" >Rating (Low to High)</option>
                            <option value="Rating (High to Low)">Rating (High to Low)</option>
                            <option value="Discount(Low to High)">Discount(Low to High)</option>
                            <option value="Discount(High to Low)">Discount(High to Low)</option>
                            <option value="Price (Low to High)">Price (Low to High)</option>
                            <option value="Price (High to Low)">Price (High to Low)</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    
                  
            </div>
            <div class="row pb-3" id="product_interface">
                
            <?php
                $url = "https://dummyjson.com/products?limit=100";
                $json = file_get_contents($url);
                $json_data = json_decode($json, true);
                $array_rating=array();
                $array_key=array();
                
                foreach ($json_data["products"] as $key => $value) {
                    ?>
                     <div class="col-lg-4 col-md-6 col-sm-12 pb-1" > 
 <div class="card product-item border-0 mb-4">
            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0" >
                <div style=" max-width: 100%"><center>
                <img style="object-fit: contain; height: 200px;" src="<?php echo $value["thumbnail"]?>" alt="">
                </center>

                </div>
            </div>
            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                <h6 class="text-truncate mb-3"><?php echo $value["title"]?></h6>
                <div class="d-flex justify-content-center">
                <h6 style="color:green" class="ml-2"><?php echo $value["discountPercentage"]?>% Off</h6><h6 class="text-muted ml-2"><del><?php echo $value["price"]?></del></h6><h6 class="ml-2">&dollar;<?php echo round($value["price"]*(100-$value["discountPercentage"])/100)?></h6>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light border">
                <a  data-value="<?php echo $value["stock"]?>" id="add-to-cart-button" class="add-to-cart-button1 btn btn-sm text-dark p-0 pointer " >
                <i  class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                <a   class=" btn btn-sm text-dark p-0 pointer " >
                <i  class="fas fa-star text-primary mr-1"></i><?php echo $value["rating"]?></a>

            </div>
        </div> 
                    </div> 

                    
                    
                    
                    <?php
                }
                ?>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <input type="hidden" id="hidden_category" value="">
<script>
     
    $("#product_interface").on('click',".add-to-cart-button",function () {
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
               
            });  
        
    });
    
    

</script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/ecommerce.js"></script>
</body>

</html>