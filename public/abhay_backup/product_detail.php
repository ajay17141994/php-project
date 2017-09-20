<?php
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = 'root';
const DB_NAME = 'agri_bazaar';

// Create connection
$conn = new MySQLi(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$productid=$_POST['product_id'];
    // User Auth and Login
	$deatilsql = "SELECT pro1.id as pro_id,
                                sub1.name as sub_name ,
                                subloc1.sub_name as subloc_name ,
                                var1.name as var_name ,
                                varloc1.var_name as varloc1_name ,
                                submedia1.fileURL as submedia_imageurl,
                                pro1.price as pro_price,
                                availDate,
                                expiryDate,
                                totalQty
                             

                                        FROM agri_bazaar.products as pro1 
                                        join agri_bazaar.subcategories as sub1 on sub1.id = pro1.sub_id
                                        join agri_bazaar.subcategorymedia as submedia1 on submedia1.sub_id = sub1.id
                                        join agri_bazaar.categories as cat1 on sub1.cat_id = cat1.id 
                                        join agri_bazaar.varieties as var1 on var1.id = pro1.var_id
                                        left join agri_bazaar.subcategories_loc as subloc1 on subloc1.sub_id = pro1.sub_id
                                        left join agri_bazaar.varieties_loc as varloc1 on varloc1.var_id = pro1.var_id
                                        where pro1.id = $productid";
                                    $result = $conn->query($deatilsql);
                                    
                                    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {              
                  echo '<button type="button" data-dismiss="modal" class="btn btn-circle-lg btn-primarypi" style="border:1px solid #26c6da;background-color:aliceblue;"><span class="glyphicon glyphicon-remove" style="margin:18px;"></span> </button>';
                      echo '<div class="row" style="margin:10px">';
                          echo '<div class="col-sm-12 col-md-12 col-lg-4 ">';
                                  echo '<div class="col-sm-12 col-md-12 col-lg-12  header" style="min-height:200px;">';
                                        // <!-- Swiper -->
                                              echo '<div class="swiper-container">';
                                                  echo '<div class="swiper-wrapper ">';
                                                      echo '<div class="swiper-slide"><img class="img-responsive" src="images/vegetables-vegetable-basket-harvest-garden.jpg"></div>';
                                                      echo '<div class="swiper-slide"><img class="img-responsive" src="images/tomato-cluster-ripening.jpg"></div>';
                                                      echo '<div class="swiper-slide"><img class="img-responsive" src="images/h2p70p.jpg"></div>';
                                                      echo '<div class="swiper-slide"><img class="img-responsive" src="images/14509_original.jpg"></div>';
                                                      echo '<div class="swiper-slide"><img class="img-responsive" src="images/70118736-vegetables-wallpapers.jpg"></div>';
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
                                      echo '<p style="text-align:center;float:right"><img class="img-circle img-responsive center-block" src="images/airyspot_ahmad_faizal_yahya_102522.jpg" style="margin-top:-220px;width:200px; height:200px;border:5px solid white;"></p>';
                                  echo '</div>';
                                  echo '<div class="col-sm-12 col-md-12 col-lg-12 " style="z-index:10;margin-top:50px;min-height:100px;text-align:center;float:right">';
                                      echo '<h3 class="name" style="font-size:45px;text-align:right;">'.$row["sub_name"].'</h3>';
                                      echo '<h5 style="font-size:45px;text-align:right;">'.$row["var_name"].' </h5><hr style="width:50%;height:2px;">';
                                  echo '</div>';
                                //   echo '<!-- <div class="col-sm-12 col-md-12 col-lg-12" style="min-height:100px;text-align:center">'
                                //       echo '<h6 class="description" style="font-size:22px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</h6>'
                                //   echo '</div> -->'
                                  echo '<div class="col-sm-6 col-md-6 col-lg-12" style="z-index:10;min-height:100px;text-align:center">';
                                      echo '<h4 style="color:#26c6da;font-size:45px;">QUANTITY </h4>';
                                      echo '<h5 class="quantity" style="font-size:45px;">'.$row["totalQty"].'</h5><hr style="width:50%;height:2px;">';
                                  echo '</div>';
                                  echo '<div class="col-sm-6 col-md-6 col-lg-12" style="z-index:10;min-height:100px;text-align:center">';
                                      echo '<h4 style="color:#26c6da;font-size:45px;">PRICE</h4>';
                                      echo '<h5 class="price" style="font-size:45px;">&#x20b9; '.$row["pro_price"].'</h5><hr style="width:50%;height:2px;">';
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
                                      echo '<input type="button" class="btn btn-outline-primary" name="RequestOrder" value="Request Order" style="width:100%;height:120px;font-size:50px;border: 1px solid #26c6da;background-color: aliceblue;">';
                                      echo '<input type="hidden" name="product_id" value="'.$row["id"].'">';
                                      echo '<input type="hidden" name="product_id" value="'.$row["prefQtyScale"].'">';
                                  echo '</div>';
                         echo ' </div>';
                      echo '</div>'   ;
    }
//     if(isset($_GET["RequestOrder"])) {
//     $sql = "INSERT INTO orders (id, pro_id, buyer_id, reqOn, reqQty, prefQtyScale, isVerified, isActive, isFulfilled, fulfilledOn, isEditable, updatedOn)
// VALUES (1, '$row['id']', 1, '$row['expiryDate']', 10, $row['prefQtyScale'], 0, 1, 0, '$row['expiryDate']', 0, '$row['expiryDate']')";
// }
}



?>