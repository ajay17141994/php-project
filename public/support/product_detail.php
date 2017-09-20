<?php
require_once './../config-db.php';
session_start();

// Create connection
$conn = new MySQLi(DB_HOST, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($conn, 'utf8');
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$productid=$_POST['product_id'];
    // User Auth and Login
	$deatilsql = "SELECT        pro1.id as pro_id,
                                pro1.latitude  as pro_latitude  ,
                                pro1.longitude as pro_longitude ,
                                sub1.name as sub_name ,
                                subloc1.sub_name as subloc_name ,
                                scale1.symbol as qty_symbol,
                                scale2.symbol as price_symbol,
                                var1.name as var_name ,
                                varloc1.var_name as varloc_name ,
                                submedia1.fileURL as submedia_imageurl,
                                promedia1.fileURL as promedia_imageurl,
                                pro1.price as pro_price,
                                pro1.seller_id as pro_seller_id,
                                availDate,
                                expiryDate,
                                totalQty
                                FROM agri_bazaar.products as pro1 
                                        left join agri_bazaar.productmedia as promedia1 on pro1.id = promedia1.pro_id
                                        join agri_bazaar.subcategories as sub1 on sub1.id = pro1.sub_id
                                        join agri_bazaar.subcategorymedia as submedia1 on submedia1.sub_id = sub1.id
                                        join agri_bazaar.categories as cat1 on sub1.cat_id = cat1.id 
                                        join agri_bazaar.varieties as var1 on var1.id = pro1.var_id
                                        join agri_bazaar.scale as scale1 on scale1.id = pro1.prefQtyScale
                                        join agri_bazaar.scale as scale2 on scale2.id = pro1.prefPriceScale
                                        left join agri_bazaar.subcategories_loc as subloc1 on subloc1.sub_id = pro1.sub_id
                                        left join agri_bazaar.varieties_loc as varloc1 on varloc1.var_id = pro1.var_id
                                        where pro1.id = $productid";
    //echo ($deatilsql);                           
    $result = $conn->query($deatilsql);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {              
                  echo '<button type="button" data-dismiss="modal" class="btn btn-circle-lg btn-primarypi" style="border:1px solid #26c6da;background-color:aliceblue;"><span class="glyphicon glyphicon-remove" style="margin:18px;"></span> </button>';
                      echo '<div class="row" style="margin:10px">';
                          echo '<div class="col-sm-12 col-md-12 col-lg-12 ">';
                                  echo '<div class="col-sm-12 col-md-12 col-lg-12  header" style="min-height:200px;">';
                                        // <!-- Swiper -->
                                              echo '<div class="swiper-container">';
                                                  echo '<div class="swiper-wrapper ">';
                                                  if(isset($row["promedia_imageurl"]))
                                                    echo '<div class="swiper-slide"><img class="img-responsive" src="'.$row["promedia_imageurl"].'"></div>';
                                                  if(isset($row["submedia_imageurl"]))
                                                    echo '<div class="swiper-slide"><img class="img-responsive" src="https://maps.googleapis.com/maps/api/staticmap?center=' . $row["pro_latitude"] .',' . $row["pro_longitude"] .'&zoom=14&size=400x400&key=AIzaSyA2_K7RS6zdFah_Llge09tKsbiLRx3CceA'.'"></div>';
                                                  echo '<div class="swiper-slide"><img class="img-responsive" src="'.$row["submedia_imageurl"].'"></div>';
                                                  echo '</div>';
                                                    // <!-- Add Arrows -->
                                                  echo '<div class="swiper-button-next"></div>';
                                                  echo '<div class="swiper-button-prev"></div>';
                                              echo '</div>    ';
                                            // <!-- Initialize Swiper -->
                                              echo '<script>';
                                                  echo '$(document ).ready(function() {';
                                                  echo 'var swiper = new Swiper(".swiper-container", {';
                                                          echo 'initialSlide: 0,';
                                                          echo 'autoplay:2000,';                               
                                                          echo 'nextButton:".swiper-button-next",';
                                                          echo 'prevButton: ".swiper-button-prev",';
                                                          echo 'slidesPerView: 1,';
                                                          echo 'paginationClickable: true,';
                                                          echo ' spaceBetween: 30,';
                                                          echo 'loop: true,';
                                                          echo 'autoplay: 2500,';
                                                          echo 'autoplayDisableOnInteraction: false';
                                                      echo '});';

                                                    
                                                      echo '$(".detail").on("shown.bs.modal", function(e) {';
                                                      echo 'swiper.update();';
                                                      echo 'var $invoker = $(e.relatedTarget);';
                                                      echo 'swiper.slideTo($invoker.data("slider"));';
                                                      echo 'swiper.update();';
                                                      echo '});';
                                                    

                                                      echo '}); '  ;
                                              echo '</script>';
                                  echo '</div>';
                                  echo '<div style="position:absolute;background-color:white;    background-color: white;height: 500px;width: 100%;transform: skewY(-10deg);z-index: 5;top: 400px;"></div>';
                                  echo '<div class="col-sm-12 col-md-12 col-lg-12" style="z-index:10;z-index: 99;">';
                                      echo '<p style="text-align:center;float:right"><img class="img-circle img-responsive center-block" src="'.$row["submedia_imageurl"].'" style="margin-top:-220px;width:200px; height:200px;border:5px solid white;"></p>';
                                  echo '</div>';
                                  echo '<div class="col-sm-12 col-md-12 col-lg-12 " style="z-index:10;margin-top:50px;min-height:100px;text-align:center;float:right">';
                                      echo '<h3 class="name" style="font-size:45px;text-align:right;">'; echo (($_SESSION["lang"]!="en" && $row["subloc_name"]!=null)? $row["subloc_name"] : $row["sub_name"]);'</h3>';
                                      echo '<h5 style="font-size:45px;text-align:right;">'; echo (($_SESSION["lang"]!="en" && $row["varloc_name"]!=null)? $row["varloc_name"] : $row["var_name"]); echo ' </h5><hr style="width:50%;height:2px;">';
                                  echo '</div>';
             
                                  echo '<div class="col-sm-6 col-md-6 col-lg-12" style="z-index:10;min-height:100px;text-align:center">';
                                      echo '<h4 style="color:#26c6da;font-size:45px;">QUANTITY </h4>';
                                      echo '<h5 class="quantity" style="font-size:45px;">'.$row["totalQty"] ." " . $row["qty_symbol"] .'</h5><hr style="width:50%;height:2px;">';
                                  echo '</div>';
                                  echo '<div class="col-sm-6 col-md-6 col-lg-12" style="z-index:10;min-height:100px;text-align:center">';
                                      echo '<h4 style="color:#26c6da;font-size:45px;">PRICE</h4>';
                                      echo '<h5 class="price" style="font-size:45px;">' . $row["price_symbol"]. " " . $row["pro_price"]. " / " . $row["qty_symbol"] .'</h5><hr style="width:50%;height:2px;">';//&#x20b9;
                                  echo '</div>';
                                  echo '<div class="col-sm-6 col-md-6 col-lg-12" style="z-index:10;min-height:100px;text-align:center">';
                                      echo '<h4 style="color:#26c6da;font-size:45px;">POSTED ON </h4>';
                                      echo '<h5 class="posted_on" style="font-size:45px;">'.$row["availDate"].'</h5><hr style="width:50%;height:2px;">';
                                  echo '</div>';
                                  echo '<div class="col-sm-6 col-md-6 col-lg-12" style="z-index:10;min-height:100px;text-align:center">';
                                      echo '<h4 style="color:#26c6da;font-size:45px;">EXPIRES ON </h4>';
                                      echo '<h5 class="expires_on" style="font-size:45px;">'.$row["expiryDate"].'</h5>';
                                  echo '</div>';
                                  echo '<div class="col-sm-12 col-md-12 col-lg-12" style="    margin-top: 40px;min-height:45px;text-align:center">';
                                      if("buyer" == $_SESSION["usertype"])
                                        {
                                            echo '<script>';
                                                echo 'function placeOrder() {';
                                                echo '$("#ord_pro_id").val(' . $row["id"] . ' ");';
                                                echo '$("#ord_buyer_id").val(' . $_SESSION["id"] . ' ");';
                                                echo '$("#ord_reqQty").val(' . $row["totalQty"] . ' ");';
                                                echo '$("#ord_prefQtyScale").val(' . $row["prefQtyScale"] . ' ");';
                                                echo 'document.getElementById("orderform").submit();';                           
                                                echo '}';
                                            echo '</script>';
                                            echo '<input type="button" onclick="placeOrder();" class="btn btn-outline-primary" name="RequestOrder" value="Request Order" style="width:100%;height:120px;font-size:50px;border: 1px solid #26c6da;background-color: aliceblue;">';
                                        }
                                  echo '</div>';
                         echo ' </div>';
                      echo '</div>'   ;
    }

}



?>