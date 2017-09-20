<?php
// Starting session
require_once 'config-db.php';
session_start();

// Create connection
$conn = new MySQLi(DB_HOST, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($conn, 'utf8');
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

if(isset($_SESSION["usertype"]) && ($_SESSION["usertype"]=="seller")){
   // Use Session to fetch Data
}else{
     // Destroying session
     header("Location: ./index.php");
     die();    
}

?>

<html>
    <head>
        <title>
        </title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!--SWIPPER MINIFIED FILES starts here; CSS, JQUERY, JS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script> <!--SWIPPER MINIFIED FILES ends here; CSS, JQUERY, JS -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="js/functionCalls.js"></script>
        <link rel = "stylesheet" type = "text/css" href = "css/index_view2.css" />
         <link rel = "stylesheet" type = "text/css" href = "css/index_view.css" />  
        
<style>
    body{
        background-color: ghostwhite;
    }

            .product_category
            {
                font-size: 45px;
                color:#545454;
            }

            .breed
            {
                font-size: 45px;
                color:#ABABAB;
            }
            .heading
            {
                font-size: 45px;
                color:#545454;
                border-bottom:2px solid grey;
                background-color:#FFFFFF;
            }
            .post_product
            {
                width:150px;
                height:150px;
                position: fixed;
                bottom: 20px;
                right: 50px;
                z-index: 99;
                border: none;
                outline: none;
                color: white;
                cursor: pointer;
                padding: 15px;
                border-radius: 50%;
                background-color: #CDCAB9;
                border: 0px solid transparent;

            }
            .plus_icon
            {
                position :absolute;
                top:40px;
                left:48px;
                font-size: 65px;
                color: black;
            }
            .post_button
            {   
                background-color: aliceblue;
                border-color: #26c6da;
                font-size: 45px;
            }
            .product_form
            {
                font-size: 32px;
            }

            .btn {
                font-size: 32px;
                border: 1px solid #CDCAB9;
                background-color: #CDCAB9;
            }
            .dropdown > span {
                font-size: 26px;
            }
            .price
            {
                font-size: 50px;;
            }
            #googlemaps { 
                height: 70%; 
                width: 100%; 
            z-index: 0; /* Set z-index to 0 as it will be on a layer below the modal form */
            }


</style>

</head>

<body>
    <!--conatiner starts here...........  -->
    <div class="container-fluid" style="background-color:ghostwhite;  margin-top:50px;">
        <!--userInfo goes here..........-->
        <div class="row userInfo" style="padding: 10px;margin:10px;  ">
            <div class="col-sm-12 col-md-12 col-lg-12 userInfo_col" style="margin-bottom: 10px;padding-top: 25px;" >
            <button type="button" data-toggle="modal" data-target=".updata_data" class="btn btn-circle-lg btn-primarypi" style="margin:-30px;border:1px solid #26c6da;background-color:aliceblue;"><span class="glyphicon glyphicon-edit" style="margin:18px;"></span> </button>
            <button type="button" class="btn btn-circle-lg-left btn-primarypi" onclick="setlocale();" style="margin:-30px;border:1px solid #26c6da;background-color:aliceblue;"><?php echo $_SESSION["lang"]; ?><span class="glyphicon glyphicon-globe" style="margin:18px;"></span> </button>
            <div class="col-sm-12 col-md-12 col-lg-12 userInfo_name" style="text-align:center;margin-bottom:25px; text-align: -webkit-center;">
                <h4 style="font-size:50px;"><?php echo $_SESSION["name"];?></h4>
            </div>
            
            <div class="col-sm-12 col-md-12 col-lg-12 userInfo_img">
                <img class="img-circle img-responsive center-block" src="<?php echo $_SESSION["profilepic"]; ?>" style="width:125px;height:125px;">
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 userInfo_mobile" style="text-align:center;margin-bottom:25px;margin-top: 2px; text-align: -webkit-center;">
                <h4 id="mobile_no" style="font-size:50px;"><?php echo $_SESSION["phone"];?></h4>
            </div>
            </div>
        </div><!--userInfo ends here..........-->
        


        <form method="POST" action="support/set_location.php" id="locationform">
        <input type="hidden" id="latitude" name="latitude" value="0" />
        <input type="hidden" id="longitude" name="longitude" value="0" />
        </form>

        <form method="POST" action="support/set_locale.php" id="localeform">
        <input type="hidden" name="language" value="en" />
        </form>


        
        <form method="POST" action="support/place_order.php" id="orderform">
        <input type="hidden" id="ord_pro_id" name="ord_pro_id" />
        <input type="hidden" id="ord_buyer_id" name="ord_buyer_id" />
        <input type="hidden" id="ord_reqOn" name="ord_reqOn" />
        <input type="hidden" id="ord_reqQty" name="ord_reqQty" />
        <input type="hidden" id="ord_prefQtyScale" name="ord_prefQtyScale" />
        </form>

        

        <!--sticky user info goes here.........-->
        <div class="col-sm-12 col-md-12 col-lg-12 sticky sticky_div"  style="z-index:1;padding-top:20px;   margin-bottom: 10px;">
            <div class="row" id="user_detail" style="display:none;">
                <div class="col-sm-6 col-md-6 col-lg-6 sticky_div_name" style="text-align:center;">
                    <h4  style="font-size:50px;"><?php echo $_SESSION["name"];?></h4>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 sticky_div_mobile" style="text-align:center;">
                    <h4 style="font-size:50px;"><?php echo $_SESSION["phone"];?></h4>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h4 id="location" style="text-align: center;"></h4>
                </div>
            </div>
            <ul id="myTab" class="nav nav-tabs">
                <li class="active col-sm-4" style="font-size:45px;text-align:center;"><a data-toggle="tab" href="#listingtab" data-slide-to="0">Listings</a></li>
                <li class=" col-sm-4" style="font-size:45px;text-align:center;"><a data-toggle="tab" href="#mapstab">Maps</a></li>
                <li class="col-sm-4" style="font-size:45px;text-align:center;"><a data-toggle="tab" href="#orderstab">Orders</a></li>
            </ul>

            <div class="tab-content">

                <div id="listingtab" class="tab-pane fade in active">
                    <div class="col-sm-12 col-md-12 col-lg-12 listing_view" style="padding-right:0px;padding-left:0px;margin-bottom: 10px;padding-top: 25px;">
                    <?php
                        // User Product List Fetch
                        $sql1 = "SELECT pro1.id as pro_id,
                                        sub1.name as sub_name ,
                                        subloc1.sub_name as subloc_name ,
                                        var1.name as var_name ,
                                        varloc1.var_name as varloc_name ,
                                        submedia1.fileURL as submedia_imageurl,
                                        pro1.latitude AS latitude,
                                        pro1.longitude AS longitude,
                                        pro1.price as pro_price
                                                FROM products as pro1 
                                                join subcategories as sub1 on sub1.id = pro1.sub_id
                                                join subcategorymedia as submedia1 on submedia1.sub_id = sub1.id
                                                join categories as cat1 on sub1.cat_id = cat1.id 
                                                join varieties as var1 on var1.id = pro1.var_id
                                                left join subcategories_loc as subloc1 on subloc1.sub_id = pro1.sub_id
                                                left join varieties_loc as varloc1 on varloc1.var_id = pro1.var_id
                                                where pro1.seller_id = " . $_SESSION["id"] . " AND pro1.isActive = 1";
        
                        $result1 = $conn->query($sql1);// echo $sql1;
                        if ($result1->num_rows > 0) {
                            // 		output data of each row
                            while($row1 = $result1->fetch_assoc())
                            {    
                                echo '<div class="col-sm-12 col-md-12 col-lg-12 list_view_child" id="'. $row1["pro_id"] .'" onclick=productDetail(this.id) style="margin-bottom:25px;">';  
                                    echo '<div class="container list_view_childContainer" style="padding-right:0px;padding-left:0px;">';
                                        echo '<div class="panel panel-default" data-toggle="modal" data-target=".detail" >';
                                            echo '<div class="panel-heading heading" style="color:#545454;background-color:#FFFFFF;">SKV ID: ' . $row1["pro_id"] .'</div>';
                                                echo '<div class="panel-body" style="margin-bottom: 30px;">';
                                                    echo '<div class="row">';
                                                        echo '<div class="col-sm-12 col-md-12 col-lg-12">';
                                                            
                                                            echo '<div class="col-sm-4 col-md-4 col-lg-4">';
                                                                echo '<img class="img-circle img-responsive" src="'.$row1[submedia_imageurl].'" style="width:150px;height:150px;"/>';
                                                                echo '<div class="list_view_imgOverlap" style="width:100%;height:140%;position:absolute;border-right:2px solid #ABABAB;top:-15px;margin-left:-40%; transform:skewX(-10deg);"></div>';
                                                            echo '</div>';
                                                                
                                                                echo '<div class="col-sm-5 col-md-5 col-lg-5 list_view_ProductName" style="color:#26c6da;text-align:center;">';
                                                                echo '<h3 class="product_category">'; echo (($_SESSION["lang"]!="en" && $row1["subloc_name"]!=null)? $row1["subloc_name"] : $row1["sub_name"]); echo '</h3>';
                                                                    echo '<span style="color:grey;">';
                                                                        echo '<h4 class="breed" >'; echo (($_SESSION["lang"]!="en" && $row1["varloc_name"]!=null)? $row1["varloc_name"] : $row1["var_name"]); echo '</h4>';
                                                                    echo '</span>';
                                                                echo '</div>';
                
                                                                echo '<div class="col-sm-3 col-md-3 col-lg-3">';
                                                                    echo '<div id="list_viewPrice_Tag">';
                                                                        echo '<div>&#x20b9; '.$row1["pro_price"].'/kg</div>';
                                                                    echo '</div>';
                                                                echo '</div>';

                                                    echo '</div>';
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            }
                        }
                    ?>
                    </div>
                </div>
                <div id="mapstab" class="tab-pane fade ">
                    <div id="googlemaps"></div>
                </div>
                <div id="orderstab" class="tab-pane fade">
                <div class="col-sm-12 col-md-12 col-lg-12 listing_view" style="padding-right:0px;padding-left:0px;margin-bottom: 10px;padding-top: 25px;">
                <?php
                        // User Product List Fetch
                        $sql1 = "SELECT ord1.id as ord_id,
                                        pro1.id as pro_id ,
                                        sub1.name as sub_name ,
                                        subloc1.sub_name as subloc_name ,
                                        var1.name as var_name ,
                                        varloc1.var_name as varloc_name ,
                                        submedia1.fileURL as submedia_imageurl,
                                        pro1.latitude AS latitude,
                                        pro1.longitude AS longitude,
                                        ord1.reqQty as ord_reqQty, 
                                        pro1.price as pro_price
                                        FROM products as pro1 
                                                join orders as ord1 on ord1.pro_id = pro1.id
                                                join subcategories as sub1 on sub1.id = pro1.sub_id
                                                join subcategorymedia as submedia1 on submedia1.sub_id = sub1.id
                                                join categories as cat1 on sub1.cat_id = cat1.id 
                                                join varieties as var1 on var1.id = pro1.var_id
                                                left join subcategories_loc as subloc1 on subloc1.sub_id = pro1.sub_id
                                                left join varieties_loc as varloc1 on varloc1.var_id = pro1.var_id
                                                where pro1.seller_id = " . $_SESSION["id"] . " AND pro1.isActive = 1 AND ord1.isActive = 1";
        
                        //$sql2 = $sql1;
                        $result1 = $conn->query($sql1);// echo $sql1;
                        if ($result1->num_rows > 0) {
                            // 		output data of each row
                            while($row1 = $result1->fetch_assoc())
                            {    
                                echo '<div class="col-sm-12 col-md-12 col-lg-12 list_view_child" id="'. $row1["ord_id"] .'" onclick=productDetail('.$row1["pro_id"].') style="margin-bottom:25px;">';  
                                    echo '<div class="container list_view_childContainer" style="padding-right:0px;padding-left:0px;">';
                                        echo '<div class="panel panel-default" data-toggle="modal" data-target=".detail" >';
                                            echo '<div class="panel-heading heading" style="color:#545454;background-color:#FFFFFF;">SKV ID: ' . $row1["ord_id"] .'</div>';
                                                echo '<div class="panel-body" style="margin-bottom: 30px;">';
                                                    echo '<div class="row">';
                                                        echo '<div class="col-sm-12 col-md-12 col-lg-12">';
                                                            
                                                            echo '<div class="col-sm-4 col-md-4 col-lg-4">';
                                                                echo '<img class="img-circle img-responsive" src="'.$row1[submedia_imageurl].'" style="width:150px;height:150px;"/>';
                                                                echo '<div class="list_view_imgOverlap" style="width:100%;height:140%;position:absolute;border-right:2px solid #ABABAB;top:-15px;margin-left:-40%; transform:skewX(-10deg);"></div>';
                                                            echo '</div>';
                                                                
                                                                echo '<div class="col-sm-5 col-md-5 col-lg-5 list_view_ProductName" style="color:#26c6da;text-align:center;">';
                                                                echo '<h3 class="product_category">'; echo (($_SESSION["lang"]!="en" && $row1["subloc_name"]!=null)? $row1["subloc_name"] : $row1["sub_name"]); echo '</h3>';
                                                                    echo '<span style="color:grey;">';
                                                                        echo '<h4 class="breed" >'; echo (($_SESSION["lang"]!="en" && $row1["varloc_name"]!=null)? $row1["varloc_name"] : $row1["var_name"]); echo '</h4>';
                                                                    echo '</span>';
                                                                echo '</div>';
                
                                                                echo '<div class="col-sm-3 col-md-3 col-lg-3">';
                                                                    echo '<div id="list_viewPrice_Tag">';
                                                                        echo '<div>&#x20b9; '.$row1["pro_price"].'/kg</div>';
                                                                    echo '</div>';
                                                                echo '</div>';

                                                    echo '</div>';
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            }
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    <!--sticky user info Ends here.........-->

<button type="button" class="btn btn-info btn-circle post_product" style="border:0px solid transparent;" data-toggle="modal" data-target=".product_decription" ><i class="glyphicon glyphicon-plus plus_icon" ></i></button>
</div>
                    
<!-- Modal for  updating mobile no and location goes here....... -->
<div class="modal fade updata_data" id="myModal" role="dialog">
    <div class="modal-dialog " style="width:100%;">
        <div class="modal-content" style="margin:100px;margin-top:20%;box-shadow: 10px 10px 5px ;">
        <div class="modal-body">
            <button type="button" data-dismiss="modal" class="btn btn-circle-lg btn-primarypi" style="border:1px solid #26c6da;background-color:aliceblue;"><span class="glyphicon glyphicon-remove" style="margin:18px;"></span> </button>
            <div class="row">
                 <form class="" method="post" action="#">
                <div class="col-sm-12 col-md-12 col-lg-12" style="text-align:center;text-align:-webkit-center;">
                    <div class="form-group" >
                        <h4 class="update_label" >Name</h4>
                        <div class='input-group update_input_group' >
                            <input type='text' class="form-control update_input" name="updateNAME" id="updateNAME" placeholder="" value="<?php echo $_SESSION["name"]; ?>" readonly/>
                            <span class="input-group-addon"  onclick="updateNAME()" style="width: 125px;"><i class="glyphicon glyphicon-edit" style="font-size: 50px;"></i></span>
                        </div>
                    </div>

                   <div class="form-group" >
                        <h4 class="update_label" >Mobile NO.</h4>
                        <div class='input-group update_input_group' >
                            <input type='number' class="form-control update_input" name="updateMOBILE" id="updateMOBILE" placeholder=""  value="<?php echo $_SESSION["phone"]; ?>" readonly/>
                            <span class="input-group-addon" onclick="updateMOBILE()" style="width: 125px;"><i class="glyphicon glyphicon-edit" style="font-size: 50px;"></i></span>
                        </div>
                    </div>

                    <div class="form-group" >
                        <h4 class="update_label">Location</h4>
                        <div class='input-group update_input_group'>
                            <input type='text' class="form-control update_input" name="updateLOCATION" id="pac-input" placeholder="" value="<?php echo $_SESSION["place"].", ".$_SESSION["taluka"].", ".$_SESSION["district"].", ".$_SESSION["state"]; ?>" readonly/> 
                            <span class="input-group-addon" onclick="updateLOCATION()" style="width: 125px;"><i class="glyphicon glyphicon-edit" style="font-size: 50px;"></i></span>
                        </div>
                    </div>

                    <div class="form-group" >
                        <h4 class="update_label">ZIP Code</h4>
                        <div class='input-group update_input_group'>
                            <input type='text' class="form-control update_input" name="updateZIP" id="updateZIP" placeholder="" /> 
                            <span class="input-group-addon" onclick="updateZIP()" style="width: 125px;"><i class="glyphicon glyphicon-search" style="font-size: 50px;"></i></span>
                        </div>
                    </div>

                    <div class="form-group" id="updateplace_form" style="display:none;">
                        <h4 class="update_label">Places</h4>
                        <div class='input-group update_input_group'>
                            <div class="select_join" >
                                <select name="places" id="places">
                                        <option value="places">places</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group"  id="updatetaluk_form" style="display:none;">
                        <h4 class="update_label">Taluk</h4>
                        <div class='input-group update_input_group'>
                            <div class="select_join" >
                                <select name="taluk" id="taluk">
                                        <option value="taluk">taluk</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group"  id="updatedistrict_form" style="display:none;">
                        <h4 class="update_label">District</h4>
                        <div class='input-group update_input_group'>
                            <div class="select_join" >
                                <select name="district" id="district">
                                        <option value="district">district</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group"  id="updatestate_form" style="display:none;">
                        <h4 class="update_label">State</h4>
                        <div class='input-group update_input_group'>
                            <div class="select_join" >
                                <select name="state" id="state">
                                        <option value="state">state</option>
                                </select>
                            </div>
                        </div>
                    </div>




                </div>
                </form>
                <div class="col-sm-12 col-md-12 col-lg-12" style="    margin-top: 40px;min-height:45px;text-align:center">
                    <input type="submit" name="updatedINFOsubmit" onclick="updatedINFO()" class="btn btn-primary btn-lg btn-block login-button" style="width:100%;height:120px;font-size:50px;border: 1px solid #26c6da;color:black;background-color: aliceblue;" value="Update"/> 
                    <!-- <button type="button" class="btn btn-outline-primary" style="width:100%;height:120px;font-size:50px;border: 1px solid #26c6da;background-color: aliceblue;">Update</button> -->
                </div>
            </div>
        </div>             
        </div>
    </div>
</div><!-- Modal for  updating mobile no and location Ends here....... -->




<!-- Modal for posting the product -->
<div class="modal fade product_decription" id="myModal" role="dialog">
    <div class="modal-dialog " style="width:100%;">
        <div class="modal-content" style="margin:50px;box-shadow: 10px 10px 5px ;">
        <div class="modal-body" >
            <button type="button" data-dismiss="modal" class="btn btn-circle-lg btn-primarypi" style="border:1px solid #26c6da;background-color:aliceblue;"><span class="glyphicon glyphicon-remove" style="margin:18px;"></span> </button>
                <div class="row">
                    <form class="" method="post" action="#">
                    <div class="col-sm-12 col-md-12 col-lg-12 product_formalign">
                        <h4 class="update_label">category</h4>
                        <div class="select_join" >
                            <select name="category" id="category">
                                <?php
                                echo "<option value=".$_SESSION["category"].">".$_SESSION["category"]."</option>";
                                if(empty($_SESSION["category"])) {
                                    $categorysql = "SELECT id,name FROM categories where isActive = true";
                                    $categoryresult = $conn->query($categorysql);
                                    if ($categoryresult->num_rows > 0) {
                                        while($row = $categoryresult->fetch_assoc()) {
                                    echo "<option value=".$row["id"].">".$row["name"]."</option>";
                                        }
                                            if(isset($_POST['category'])){
                                                $_SESSION['category'] = $_GET['category'];
                                                echo $_SESSION['category'];
                                            }
                                    }
                                    else{
                                        echo "<option value='No data'>No data</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 product_formalign">
                        <h4 class="update_label">Sub category</h4>
                        <div class="select_join" >
                            <select name="subcategory" id="subcategory">
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 product_formalign">

                        <h4 class="update_label">Breed</h4>
                    <!-- <div class="selected-item"> -->
                        <div class="select_join" >
                            <select name="breed" id="breed">
                            </select>
                        </div>
                <!-- </div> -->
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 product_formalign">
                        <div class="input-group input_box">
                            <h4 class="update_label">Quantity</h4>
                            <input type="number" name="quantity_input" class="form-control" id="quantity_input" placeholder="" aria-describedby="basic-addon1" style="min-height:125px;" >
                            <span class="input-group-addon input_span" id="basic-addon1" >
                                <select id="select_options " class="quantityUnit"  name="quantityUnit" style="    color: black;border: 0px;background-color: transparent;font-size: 45px;height: 100%;min-width: 175px;padding-left: 50px;" >
                                </select>
                            </span>
                    </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 product_formalign">
                    <div class="input-group input_box" >
                        <h4 class="update_label">Price</h4>
                            <input type="number" name="price_input" class="form-control" id="price_input" placeholder="" aria-describedby="basic-addon1" style="min-height:125px;">
                            <span class="input-group-addon input_span" id="basic-addon1" >
                                <select id="select_options" class="currency" name="currency" >
                                </select>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 product_formalign">
                        <div class="input-group date input_box " id='datetimepicker7' >
                            <h4 class="update_label">Posted on</h4>
                            <input type="datetime-local" name="posted_date" class="form-control" id="posted_date"  < placeholder="" aria-describedby="basic-addon1" style="min-height:125px;" >
                            <span class="input-group-addon input_span" id="basic-addon1" style="min-width: 175px;">
                                <span class="glyphicon glyphicon-calendar">
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 product_formalign">
                        <div class="input-group date input_box" id='datetimepicker8' >
                            <h4 class="update_label">Expires on</h4>
                            <input type="datetime-local" name="expiry_date" class="form-control" id="expiry_date" placeholder="" aria-describedby="basic-addon1" style="min-height:125px;">
                            <span class="input-group-addon input_span" id="basic-addon1" style="min-width: 175px;" >
                                <span class="glyphicon glyphicon-calendar">
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12" style="    margin-top: 40px;min-height:45px;text-align:center">
                            <input type="submit" name="submit1" onclick="retrieveDATA()" class="btn btn-primary btn-lg btn-block login-button" style="width:100%;height:120px;font-size:50px;border: 1px solid #26c6da;color:black;background-color: aliceblue;" value="Post"/> 
                            <!-- <button type="button" name="submit" class="btn btn-outline-primary" style="width:100%;height:120px;font-size:50px;border: 1px solid #26c6da;background-color: aliceblue;">Post</button>  -->
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  <!-- Modal for posting the product -->



<!-- Modal for full product detail goes here........... -->
<div class="modal fade detail" id="myModal" role="dialog">
    <div class="modal-dialog " style="width:100%;">
        <div class="modal-content" style="margin:50px;box-shadow: 10px 10px 5px ;">
            <div class="modal-body" id="productDetail_body">
        </div>
    </div>
</div><!-- Modal for full product detail goes here........... -->

  
<script src="js/place_search.js"></script>
  <script src="js/location.js"></script>      
  <!-- Include the Google Maps API library - required for embedding maps -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2_K7RS6zdFah_Llge09tKsbiLRx3CceA&libraries=places&callback=initAutocomplete"></script>

<?php
if(!isset($_SESSION["latitude"]) || !isset($_SESSION["longitude"])){
{
    echo '<script> getLocation(); </script>';
}
}
?>


<script>
    function updateNAME()
    {
        document.getElementById('updateNAME').removeAttribute('readonly');
    }

    function updateMOBILE()
    {
        // document.getElementById('updateMOBILE').removeAttribute('readonly');    
    }

    function updateLOCATION()
    {
        document.getElementById('pac-input').removeAttribute('readonly');   
    }

    function updateZIP()
    {
        pincode_address();  
        $("#updateplace_form").css('display','block');
        $("#updatetaluk_form").css('display','block');
        $("#updatedistrict_form").css('display','block');
        $("#updatestate_form").css('display','block');

    }
</script>


<script>

  function setlocale() {
    $("#language").val("kn");
    document.getElementById("localeform").submit();                             
    }


       
</script>


<script type="text/javascript">
    $(window).on('load',function(){
        $('.enter_data').modal('show');
    });

    function show()
    {
        $('.listing_view').css('display','block');
        $('.userInfo').css('display','block');
        $('.sticky_div').css('display','block');
        // $('.container-fluid').css('display','block');
    }
    // fixed panel selection between listing and orders goes here.........
    $(".listing").click(function(){
        $(".listing").css('background-color','grey');
        $(".listing").css('color','white');
        $(".orders").css('background-color','white');
        $(".orders").css('color','grey');
        $(".maps").css('background-color','white');
        $(".maps").css('color','grey');
    })

    $(".orders").click(function(){
        $(".listing").css('background-color','white');
        $(".listing").css('color','grey');
        $(".orders").css('background-color','grey');
        $(".orders").css('color','white');
        $(".maps").css('background-color','white');
        $(".maps").css('color','grey');
    })// fixed panel selection between listing and orders Ends here.........

    $(".maps").click(function(){
        $(".listing").css('background-color','white');
        $(".listing").css('color','grey');
        $(".maps").css('background-color','grey');
        $(".maps").css('color','white');
        $(".orders").css('background-color','white');
        $(".orders").css('color','grey');
    })// fixed panel selection between listing and orders Ends here.........

    
</script>

<script>

$('#category').change(function(){
    var category=$(this).val();
    $('#subcategory').empty(); // <<<<<< No more issue here
    $('#breed').empty(); // <<<<<< No more issue here
    $('#subcategory').append('<option disabled selected>Select an option</option>');
 
    $.ajax({
        url:"support/fetch_subcat.php",
        method:"POST",
        data:{categoryData:category},
        dataType:"text",
        success:function(data)
        {
        $('#subcategory').append(data);
        $('#subcategory').change();
        }
    });

  
});


$('#subcategory').change(function(){

            var subcategory=$(this).val();

            $('#breed').empty(); // <<<<<< No more issue here
            $('#breed').append('<option disabled selected>Select an option</option>');
            $('.quantityUnit').empty();
            $('.currency').empty();

            $.ajax({
                url:"support/fetch_variety.php",
                method:"POST",
                data:{subcategoryData:subcategory},
                dataType:"text",
                success:function(data)
                {
                    $('#breed').append(data);
                    $('#breed').change();
                }
            });
});
$('#breed').change(function(){
     var breed=$(this).val();
            $.ajax({
            url:"support/fetch_unit.php",
            method:"POST",
            data:{breed:breed},
            dataType:"text",
            success:function(data)
            {
                $('.quantityUnit').append(data);
                $('.quantityUnit').change();
            }
            });
});
$('#breed').change(function(){
    var breed=$(this).val();
            $.ajax({
                url:"support/fetch_price.php",
                method:"POST",
                data:{breed:breed},
                dataType:"text",
                success:function(data)
                {
                    $('.currency').append(data);
                    $('.currency').change();
                }
            });
          
    });

       
</script>
<script>
     function productDetail(clicked_id)
        {
            // alert(clicked_id);
            var productID=clicked_id;
            
            $.ajax({
                url:"support/product_detail.php",
                method:"POST",
                data:{product_id:productID},
                dataType:"text",
                success:function(data)
                {
                    $("#productDetail_body").html(data);
                }
            });
        }

</script>
<script>
    function display()
    {
        $("#name").val();
        $("#userphone_no").val();
        console.log($("#userphone_no").val());
        $("#userType").val();
        $("#pincode").val();
        $("#places").val();
        $("#taluk").val();
        $("#district").val();
        $("#state").val();
        var lati=($("#latitude").val());
         lat=(Number(lati)).toFixed(2)
        var long=($("#longitude").val());
         lon=(Number(long)).toFixed(2)
        var places=$("#places").val();
        $('#places').change(function(){
        var places=$("#this").val();
        });
        var taluk=$("#taluk").val();
        $('#taluk').change(function(){
        var taluk=$("#this").val();
        });      
        
        $.ajax({
                url:"support/chk.php",
                method:"POST",
                data:{name:$("#name").val(),phone_no:$("#userphone_no").val(),userType:$("#userType").val(),pincode:$("#pincode").val(),places:places,taluk:taluk,district:$("#district").val(),state:$("#state").val(),latitude:lat,longitude:lon},
                dataType:"text",
                success:function(data)
                {
                    console.log(data);
                }
            });
    }
    </script>

<script>
    function pincode_address()
    {
        var pincode=$("#updateZIP").val();
        console.log(pincode);
    $.ajax({
                url:"support/address.php",
                method:"POST",
                data:{Pincode:pincode},
                dataType:"json",
                success:function(data)
                {
                    // console.log(data);
                     for(var i=0;i<(data.PostOffice).length;i++)
                     {
                        $("#places").append('<option value="'+data.PostOffice[i].Name+'">'+data.PostOffice[i].Name+'</option>')
                        $("#taluk").html('<option value="'+data.PostOffice[i].Taluk+'">'+data.PostOffice[i].Taluk+'</option>')
                        $("#district").html('<option value="'+data.PostOffice[i].District+'">'+data.PostOffice[i].District+'</option>')
                        $("#state").html('<option value="'+data.PostOffice[i].State+'">'+data.PostOffice[i].State+'</option>')
                     }
                    // function GetLocation() {
                        var geocoder = new google.maps.Geocoder();
                        var address = document.getElementById("updateZIP").value;
                        geocoder.geocode({ 'address': address }, function (results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                // console.log(address);
                                var latitude = results[0].geometry.location.lat();
                                var longitude = results[0].geometry.location.lng();
                                $("#latitude").val(latitude);
                                $("#longitude").val(longitude);
                                console.log($("#latitude").val());
                                console.log($("#longitude").val());
                                // alert("Latitude: " + latitude + "\nLongitude: " + longitude);
                            } else {
                                alert("Request failed.")
                            }
                        });
                    // };
                }
            });
    }
</script>
<script>
// The latitude and longitude of your business / place
    var position = [<?php echo $_SESSION["latitude"];?>, <?php echo $_SESSION["longitude"];?>];
    $(document).ready(function() {
        var latLng = new google.maps.LatLng(position[0], position[1]);
        //var latlng = new google.maps.LatLng(-34.397, 150.644);
        var mapOptions = {
            zoom: 16, // initialize zoom level - the max value is 21
            streetViewControl: false, // hide the yellow Street View pegman
            scaleControl: false, // allow users to zoom the Google Map
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            disableDefaultUI:true,
            center: latLng
        };
        map = new google.maps.Map(document.getElementById('googlemaps'),
            mapOptions);

        //console.dir(map);
        google.maps.event.trigger(map, 'resize');

        $('a[href="#mapstab"]').on('shown', function(e) {
            google.maps.event.trigger(map, 'resize');
        });
        
        $('#myTab a[href="#mapstab"]').on('shown', function(){
            google.maps.event.trigger(map, 'resize');
            map.setCenter(latlng);
        });
        
        <?php
        $sql3 = "SELECT pro1.id as pro_id,
                                        sub1.name as sub_name ,
                                        subloc1.sub_name as subloc_name ,
                                        var1.name as var_name ,
                                        varloc1.var_name as varloc_name ,
                                        submedia1.fileURL as submedia_imageurl,
                                        pro1.latitude AS latitude,
                                        pro1.longitude AS longitude,
                                        pro1.price as pro_price
                                                FROM products as pro1 
                                                join subcategories as sub1 on sub1.id = pro1.sub_id
                                                join subcategorymedia as submedia1 on submedia1.sub_id = sub1.id
                                                join categories as cat1 on sub1.cat_id = cat1.id 
                                                join varieties as var1 on var1.id = pro1.var_id
                                                left join subcategories_loc as subloc1 on subloc1.sub_id = pro1.sub_id
                                                left join varieties_loc as varloc1 on varloc1.var_id = pro1.var_id
                                                where pro1.seller_id = " . $_SESSION["id"] . " AND pro1.isActive = 1";
                    
             
        $result3 = $conn->query($sql3);
        
        if ($result3->num_rows > 0) {
            while($row3 = $result3->fetch_assoc())
            {   
                // echo 'function updateGoogleMaps(){';
                echo 'var marker'.$row3["pro_id"].'= new google.maps.Marker({';
                echo 'position: new google.maps.LatLng(' . $row3["latitude"] . ',' . $row3["longitude"] . '),';
                echo 'map: map,';
                echo "title: '".$row3["sub_name"]."'";
                //echo 'animation:google.maps.Animation.Drop});';
                echo '});';
                echo 'map.setCenter(new google.maps.LatLng(' . $row3["latitude"] . ',' . $row3["longitude"] . '));';
                
                // echo 'console.dir(marker' .$row3["pro_id"]. ');';
            }
            echo "google.maps.event.trigger(map, 'resize');";
        }
        ?>
    });
    //google.maps.event.addDomListener(window, 'load', showGoogleMaps);
    // google.maps.event.addDomListener(window, 'load', updateGoogleMaps);
</script>


<script>


    function updatedINFO()
        {
            // alert(clicked_id);
            var updateNAME=$("#updateNAME").val();
            var updateMOBILE=$("#updateMOBILE").val();
            var updatePLACE=$("#places").val();
            var updateTALUK=$("#taluk").val();
            var updateDISTRICT=$("#district").val();
            var updateSTATE=$("#state").val();
            // var productID=clicked_id;
            
            $.ajax({
                url:"support/updatedINFO.php",
                method:"POST",
                data:{updateNAME:updateNAME, updateMOBILE:updateMOBILE, updatePLACE:updatePLACE, updateTALUK:updateTALUK, updateDISTRICT:updateDISTRICT, updateSTATE:updateSTATE},
                dataType:"text",
                success:function(data)
                {
                    console.log(data);
                }
            });
        }
</script>
</body>
</html>
