<?php
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = 'root';
const DB_NAME = 'agri_bazaar';

// const DB_HOST = 'localhost';
// const DB_USER = 'gowrav';
// const DB_PASS = 'gowrav';
// const DB_NAME = 'agri_bazaar';

// Create connection
$conn = new MySQLi(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

if( $_GET["phone"] || $_GET["crop"] ) {
    
    // User Auth and Login
	$sql = "SELECT * FROM sellers as s1 where s1.phone = " . $_GET['phone'];
	$result = $conn->query($sql);
	if ($result->num_rows == 1) {
        // 		output data of each row
        while($row = $result->fetch_assoc())
        {
			$userid =  $row["id"];
			$username =  $row["name"];
			$phone =  $row["phone"];
            $profilePic =  $row["profilePic"];
            $profilePic =  $row["profilePic"];            
		}
        session_start();
        $_SESSION["phone"] = $_GET["phone"];
        $_SESSION["category"] = $_GET["crop"];
        
	}
	else{
        // echo "User error..! Unique User not Found.!";
        // exit();
    }

}
else {
	echo "Invalid Request";
	exit();
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

</style>
        
<body>

    <!--conatiner starts here...........  -->
    <div class="container-fluid" style="background-color:ghostwhite;  margin-top:50px;">
        <!--userInfo goes here..........-->
        <div class="row userInfo" style="padding: 10px;margin:10px;  ">
            <div class="col-sm-12 col-md-12 col-lg-12 userInfo_col" style="margin-bottom: 10px;padding-top: 25px;" >
                <button type="button" data-toggle="modal" data-target=".updata_data" class="btn btn-circle-lg btn-primarypi" style="margin:-30px;border:1px solid #26c6da;background-color:aliceblue;"><span class="glyphicon glyphicon-edit" style="margin:18px;"></span> </button>
            <div class="col-sm-12 col-md-12 col-lg-12 userInfo_name" style="text-align:center;margin-bottom:25px; text-align: -webkit-center;">
                <h4 style="font-size:50px;"><?php echo $username;?></h4>
            </div>
            
            <div class="col-sm-12 col-md-12 col-lg-12 userInfo_img">
                <img class="img-circle img-responsive center-block" src="<?php echo $profilePic; ?>" style="width:125px;height:125px;">
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 userInfo_mobile" style="text-align:center;margin-bottom:25px;margin-top: 2px; text-align: -webkit-center;">
                <h4 id="mobile_no"   style="font-size:50px;"><?php echo $phone;?></h4>
            </div>
            </div>
        </div><!--userInfo ends here..........-->
        

        <!--sticky user info goes here.........-->
        <div class="col-sm-12 col-md-12 col-lg-12 sticky sticky_div"  style="z-index:1;padding-top:20px;   margin-bottom: 10px;">
            <div class="row" id="user_detail" style="display:none;">
                <div class="col-sm-6 col-md-6 col-lg-6 sticky_div_name" style="text-align:center;">
                    <h4  style="font-size:50px;"><?php echo $username;?>Y</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 sticky_div_mobile" style="text-align:center;">
                    <h4 style="font-size:50px;"><?php echo $phone;?></h4>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h4 id="location" style="text-align: center;"></h4>
                </div>
            </div>
            <div class="row ">
                <div class="col-sm-6 col-md-6 col-lg-6 listing" style="font-size:36px;text-align:center;">
                    <h2 style="font-size:45px;">Listings</h2>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 orders" style="font-size:36px;text-align:center;">
                    <h2 style="font-size:45px;">Orders</h2>
                </div>
                <!-- <div class="col-sm-12 col-md-12 col-lg-12" style="text-align:center;color:#26c6da;border-bottom:1px solid grey;">
                    <h6 class="location"></h6>
                </div> -->
            </div>      
        </div><!--sticky user info Ends here.........-->





            
    <!--product listing Goes  here...........-->
        <div class="col-sm-12 col-md-12 col-lg-12 listing_view" style="padding-right:0px;padding-left:0px;margin-bottom: 10px;padding-top: 25px;">
            <!-- <div class="col-sm-12 col-md-12 col-lg-12 list_view_child" style="margin-bottom:25px;">   -->
                <!-- <div class="container list_view_childContainer" style="padding-right:0px;padding-left:0px;">  -->
                 <?php

                // User Product List Fetch
                $sql1 = "SELECT pro1.id as pro_id,
                                sub1.name as sub_name ,
                                subloc1.sub_name as subloc_name ,
                                var1.name as var_name ,
                                varloc1.var_name as varloc1_name ,
                                submedia1.fileURL as submedia_imageurl,
                                pro1.price as pro_price

                                        FROM products as pro1 
                                        join subcategories as sub1 on sub1.id = pro1.sub_id
                                        join subcategorymedia as submedia1 on submedia1.sub_id = sub1.id
                                        join categories as cat1 on sub1.cat_id = cat1.id 
                                        join varieties as var1 on var1.id = pro1.var_id
                                        left join subcategories_loc as subloc1 on subloc1.sub_id = pro1.sub_id
                                        left join varieties_loc as varloc1 on varloc1.var_id = pro1.var_id
                                        where pro1.seller_id = $userid AND pro1.isActive = 1";

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
                                                echo '<img class="img-circle img-responsive" src="'.$row1[submedia_imageurl].'" style="width:150px;height:150px;">';
                                                echo '<div class="list_view_imgOverlap" style="width:100%;height:140%;position:absolute;border-right:2px solid #ABABAB;top:-15px;margin-left:-40%; transform:skewX(-10deg);">';
                                                echo '</div>';
                                            echo '</div>';

                                            echo '<div class="col-sm-5 col-md-5 col-lg-5 list_view_ProductName" style="color:#26c6da;text-align:center;">';
                                            echo '<h3 class="product_category">'.$row1["sub_name"].'</h3>';
                                                    echo '<span style="color:grey;">';
                                                    echo '<h4 class="breed" >'.$row1["var_name"].'</h4>';
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
                            // echo '';
                        echo '</div>';
                    echo '</div>';
                    }
                }
                    
?>
<button type="button" class="btn btn-info btn-circle post_product" style="border:0px solid transparent;" data-toggle="modal" data-target=".product_decription" ><i class="glyphicon glyphicon-plus plus_icon" ></i></button>
</div>
                    
<!-- Modal for  updating mobile no and location goes here....... -->
<div class="modal fade updata_data" id="myModal" role="dialog">
    <div class="modal-dialog " style="width:100%;">
        <div class="modal-content" style="margin:100px;margin-top:20%;box-shadow: 10px 10px 5px ;">
        <div class="modal-body">
            <button type="button" data-dismiss="modal" class="btn btn-circle-lg btn-primarypi" style="border:1px solid #26c6da;background-color:aliceblue;"><span class="glyphicon glyphicon-remove" style="margin:18px;"></span> </button>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12" style="text-align:center;text-align:-webkit-center;">
                    <div class="form-group" >
                        <h4 class="update_label" >Mobile NO.</h4>
                        <div class='input-group update_input_group' >
                            <input type='number' class="form-control update_input" name="phone_no" id="phone_no" placeholder="Phone" />
                        </div>
                    </div>
                    <div class="form-group" >
                        <h4 class="update_label">Location</h4>
                        <div class='input-group update_input_group'>
                                <input type='text' class="form-control update_input" name="location_input" id="pac-input" placeholder="location" /> 
                            <!-- <input id="pac-input" class="controls" type="text" placeholder="Search Box">  -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="    margin-top: 40px;min-height:45px;text-align:center">
                <button type="button" class="btn btn-outline-primary" style="width:100%;height:120px;font-size:50px;border: 1px solid #26c6da;background-color: aliceblue;">Update</button></div>
            </div>
        </div>             
        </div>
    </div>
</div><!-- Modal for  updating mobile no and location Ends here....... -->



<?php 
if(!empty($_SESSION["phone"]))
{

}
else{
    ?>
<!-- Modal for seller/buyers details if mobile no is not registered goes here....... -->
<div class="modal fade enter_data" id="myModal" role="dialog">
    <div class="modal-dialog " style="width:100%;">
        <div class="modal-content" style="margin:100px;margin-top:20%;box-shadow: 10px 10px 5px ;">
            <div class="modal-body">
                <button type="button" onclick="show()" data-dismiss="modal" class="btn btn-circle-lg btn-primarypi" style="border:1px solid #26c6da;background-color:aliceblue;"><span class="glyphicon glyphicon-remove" style="margin:18px;"></span> </button>
                
                <form class="" method="post" action="#">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12" style="text-align:center;text-align:-webkit-center;">
                        <div class="form-group" >
                            <h4 class="update_label" >Name</h4>
                            <div class='input-group update_input_group' >
                                <input type='text' class="form-control update_input enterData_size" name="name" id="name" placeholder="name"  style="width:650px;"/>
                            </div>
                        </div>
                        
                        <div class="form-group " >
                            <h4 class="update_label" >Mobile NO.</h4>
                            <div class='input-group update_input_group' >
                                <input type='text' class="form-control update_input enterData_size" name="userphone_no" id="userphone_no" placeholder="Phone" style="width:650px;" />
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 product_formalign">
                            <h4 class="update_label">User Type</h4>
                            <div class="select_join" >
                                <select name="userType" id="userType">
                                    <option value="Seller">Seller</option>
                                    <option value="Buyer">Buyer</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group" >
                            <h4 class="update_label">Zip Code</h4>
                            <div class='input-group update_input_group'>
                                    <input type='text' class="form-control update_input enterData_size" id="pincode" onchange="pincode_address()" name="location_input"  placeholder="location"  style="width:650px;"/> 
                                <!-- <input id="pac-input" class="controls" type="text" placeholder="Search Box">  -->
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 product_formalign">
                            <h4 class="update_label">Place</h4>
                            <div class="select_join" >
                                <select name="places" id="places">
                                        <option value="places">places</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 product_formalign">
                            <h4 class="update_label">Taluk</h4>
                            <div class="select_join" >
                                <select name="taluk" id="taluk">
                                        <option value="taluk">taluk</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 product_formalign">
                            <h4 class="update_label">District</h4>
                            <div class="select_join" >
                                <select name="district" id="district">
                                        <option value="district">district</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 product_formalign">
                            <h4 class="update_label">State</h4>
                            <div class="select_join" >
                                <select name="state" id="state">
                                        <option value="state">state</option>
                                </select>
                            </div>
                        </div>

                        <input type='hidden'  id="latitude"  name="latitude"  /> 
                        <input type='hidden'  id="longitude"  name="longitude"  /> 

                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6" style="    margin-top: 40px;min-height:45px;text-align:center">
                    <input type="submit" onclick="display()" data-dismiss="modal" class="btn btn-outline-primary" name="submit" value="Submit" style="width:100%;height:120px;font-size:50px;border: 1px solid #26c6da;background-color: aliceblue;"></div>
                    <div class="col-sm-6 col-md-6 col-lg-6" style="    margin-top: 40px;min-height:45px;text-align:center">
                    <button type="button" onclick="show()" data-dismiss="modal" class="btn btn-outline-primary" style="width:100%;height:120px;font-size:50px;border: 1px solid #26c6da;background-color: aliceblue;">Cancel</button></div>
                </div>
                </form>

            </div>             
        </div>
    </div>
</div><!-- Modal for seller/buyers details if mobile no is not registered Ends here....... -->
<?php
}
?>




<!-- Modal for posting the product -->
<div class="modal fade product_decription" id="myModal" role="dialog">
    <div class="modal-dialog " style="width:100%;">
        <div class="modal-content" style="margin:50px;box-shadow: 10px 10px 5px ;">
        <div class="modal-body" >
            <button type="button" data-dismiss="modal" class="btn btn-circle-lg btn-primarypi" style="border:1px solid #26c6da;background-color:aliceblue;"><span class="glyphicon glyphicon-remove" style="margin:18px;"></span> </button>
                <div class="row">
                    <form class="" method="post" action="#">
                        <?php echo $_POST["subcategory"]; ?>
                    <div class="col-sm-12 col-md-12 col-lg-12 product_formalign">
                        <h4 class="update_label">category</h4>
                        <div class="select_join" >
                            <select name="category" id="category">
                                <?php
                                echo "<option value=".$_SESSION["category"].">".$_SESSION["category"]."</option>";
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 product_formalign">
                        <h4 class="update_label">Sub category</h4>
                        <div class="select_join" >
                            <select name="Subcategory" id="Subcategory">
                                <?php
                                if(!empty($_SESSION["category"])) {
                                    // echo "inside gone";
                                    $cropname=$_SESSION["category"];
                                    // echo $cropname;
                                    $subcategorysql = "SELECT name FROM subcategories where cat_id=(SELECT id FROM categories where name='".$cropname."')";
                                    $subcategoryresult = $conn->query($subcategorysql);
                                    if ($subcategoryresult->num_rows > 0) {
                                        while($row = $subcategoryresult->fetch_assoc()) {
                                    echo "<option value=".$row["name"].">".$row["name"]."</option>";
                                        }
                                            session_start();
                                            if(isset($_POST['Subcategory'])){
                                                $_SESSION['Subcategory'] = $_GET['Subcategory'];
                                                echo $_SESSION['Subcategory'];
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

                        <h4 class="update_label">Breed</h4>
                    <!-- <div class="selected-item"> -->
                        <div class="select_join" >
                            <select name="breed" id="breed">
                                <option value="">select</option>
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
                                    <!-- <option value="B2">ton</option> -->
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









<script src="js/index.js"></script>

<script>
      function initAutocomplete() {
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

        });
      }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANuAEjaeYjIi9kq41i6FFJboS1Teltj6U&libraries=places&callback=initAutocomplete"
         async defer></script>

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
    })

    $(".orders").click(function(){
        $(".listing").css('background-color','white');
        $(".listing").css('color','grey');
        $(".orders").css('background-color','grey');
        $(".orders").css('color','white');
    })// fixed panel selection between listing and orders Ends here.........
</script>
<script>
    console.log($("#div_id").val());
    </script>
    <script>
        $('#Subcategory').change(function(){
            console.log("insidegaya");
            var subcategory=$(this).val();
            $.ajax({
                url:"fetch_data.php",
                method:"POST",
                data:{subcategoryData:subcategory},
                dataType:"text",
                success:function(data)
                {
                $('#breed').append(data);
                }
            });
        });

       
</script>
<script>
        $('#breed').change(function(){
            console.log("insidegaya");
            var breed=$(this).val();
            $.ajax({
                url:"fetch_unit.php",
                method:"POST",
                data:{breed:breed},
                dataType:"text",
                success:function(data)
                {
                $('.quantityUnit').append(data);
                }
            });
        });

       
</script>
<script>
        $('#breed').change(function(){
            console.log("insidegaya");
            var breed=$(this).val();
            $.ajax({
                url:"fetch_priceunit.php",
                method:"POST",
                data:{breed:breed},
                dataType:"text",
                success:function(data)
                {
                $('.currency').append(data);
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
                url:"product_detail.php",
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
                url:"chk.php",
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
        var pincode=$("#pincode").val();
        console.log(pincode);
    $.ajax({
                url:"address.php",
                method:"POST",
                data:{Pincode:pincode},
                dataType:"json",
                success:function(data)
                {
                     for(var i=0;i<(data.PostOffice).length;i++)
                     {
                        $("#places").append('<option value="'+data.PostOffice[i].Name+'">'+data.PostOffice[i].Name+'</option>')
                        $("#taluk").html('<option value="'+data.PostOffice[i].Taluk+'">'+data.PostOffice[i].Taluk+'</option>')
                        $("#district").html('<option value="'+data.PostOffice[i].District+'">'+data.PostOffice[i].District+'</option>')
                        $("#state").html('<option value="'+data.PostOffice[i].State+'">'+data.PostOffice[i].State+'</option>')
                     }
                    // function GetLocation() {
                        var geocoder = new google.maps.Geocoder();
                        var address = document.getElementById("pincode").value;
                        geocoder.geocode({ 'address': address }, function (results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
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
</body>
</html>
<!-- <?php
// const DB_HOST = 'localhost';
// const DB_USER = 'root';
// const DB_PASS = 'root';
// const DB_NAME = 'agri_bazaar'; -->

// Create connection
// $conn = new MySQLi(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Check connection
// if ($conn->connect_error) {
// 	die("Connection failed: " . $conn->connect_error);
// }
// $name=$_POST["name"];
// $place=$_POST["places"];
// $taluk=$_POST["taluk"];
// $district=$_POST["district"];
// $state=$_POST["state"];
// $lat=$_POST["latitude"];
// $lon=$_POST["longitude"];
// $phone=$_POST["phone_no"];
// $addedon=date("Y/m/d h:i:s");
// $updatedon=date("Y/m/d h:i:s");

// if(isset($_POST['submitUser']))
// {
//     print_r("abhay");
//     echo "abhay kumar";
//     $query    = "INSERT INTO sellers (id,name, profilePic, place, taluka, district, state, latitude, longitude, phone, addedOn, updatedOn) 
//              VALUES(1, '$name','https://media.licdn.com/mpr/mpr/shrinknp_200_200/AAEAAQAAAAAAAAjgAAAAJGMxZDJiMmRiLTc3OWEtNDc1Mi05YTg1LTI2NzM4ZWI0ZjU1ZA.jpg', '$place', '$taluk', '$district', '$state', $lat, $lon, $phone, '$addedon', '$updatedon')";
// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();
// }

// ?>