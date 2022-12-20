<?php 
session_start();
$json_data = $_SESSION["product_data"];
 $id=$_POST['data'];
        $array_rating=array();
        $array_key=array();
        $status=false;
        foreach ($json_data["products"] as $key => $value) {  
                    if($value["id"]==$id){
                        if(($value["stock"])<50)
                        {
                            
                      $status=true;

                        }
                        else{
                            $status=false;

                        }
             }
            }
            echo $status;
            ?>