<?php 
 $id=$_POST['data'];
        $url = "https://dummyjson.com/products?limit=100";
        $json = file_get_contents($url);
        $json_data = json_decode($json, true);
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