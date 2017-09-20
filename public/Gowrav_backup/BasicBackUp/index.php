<?php

require_once 'config-db.php';

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
	}
	else{
        echo "User error..! Unique User not Found.!";
        exit();
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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.css"
    />
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <body>
        <div class="container" style="background-color:ghostwhite;  margin-top:50px;">
            <div class="row userInfo" style="padding: 10px;margin:10px;  ">
                <!-- <input id="pac-input" class="controls" type="text" placeholder="Search Box"> -->
                <div class="col-sm-12 col-md-12 col-lg-12 userInfo_col" style="margin-bottom: 10px;padding-top: 25px;">
                    <div class="col-sm-12 col-md-12 col-lg-12 userInfo_name" style="text-align:center;margin-bottom:25px; text-align: -webkit-center;">
                        <h4 style="font-size:35px;"><?php echo $username;
?></h4>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 userInfo_img">
                        <img class="img-circle img-responsive center-block" src="<?php echo $profilePic?>" style="width:125px;height:125px;">
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 userInfo_mobile" style="text-align:center;margin-bottom:25px;margin-top: 2px; text-align: -webkit-center;">
                    <h4 style="font-size:35px;"><?php echo $phone;
?></h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 listing_view" style="padding-right:0px;padding-left:0px;margin-bottom: 10px;padding-top: 25px;">
                <div class="col-sm-12 col-md-12 col-lg-12 list_view_child" style="margin-bottom:25px;">
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
                        echo '<div class="container list_view_childContainer" style="padding-right:0px;padding-left:0px;">';
                        echo '<div class="panel panel-default" data-toggle="modal" data-target=".detail">';
                        echo '<div class="panel-heading heading" style="color:#545454;background-color:#FFFFFF;">SKU : ' . $row1["pro_id"] .'</div>';
                        echo '<div class="panel-body" style="margin-bottom: 30px;">';
                        echo '<div class="row">';
                        echo '<div class="col-sm-12 col-md-12 col-lg-12">';
                        echo '<div class="col-sm-4 col-md-4 col-lg-4">';
                        echo '<img class="img-circle img-responsive" src="'.$row1[submedia_imageurl].'" style="width:150px;height:150px;">';
                        echo '<div style="width:100%;height:140%;position:absolute;border-right:2px solid #ABABAB;top:-15px;margin-left:-40%; transform:skewX(-10deg);"></div>';
                        echo '</div>';
                        echo '<div class="col-sm-5 col-md-5 col-lg-5" style="color:#26c6da;text-align:center;">';
                        if($_GET["lang"]==="kn" && !empty($row1["subloc_name"]))
                        {
                            echo '<h3 class="product_category">'.$row1["subloc_name"].'</h3>';
                        }
                        else
                        {
                            echo '<h3 class="product_category">'.$row1["sub_name"].'</h3>';
                        }
                        echo '<span style="color:grey;">';
                        if($_GET["lang"]==="kn" && !empty($row1["varloc1_name"]))
                        {
                            echo '<h4 class="breed">'.$row1["varloc1_name"].'</h4>';
                        }
                        else
                        {
                            echo '<h4 class="breed">'.$row1["var_name"].'</h4>';
                        }
                        echo '</span>';
                        echo '</div>';
                        echo '<div class="col-sm-3 col-md-3 col-lg-3">';
                        echo '<div id="list_viewPrice_Tag">';
                        echo '<div>&#x20b9;'.$row1["pro_price"].'</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                }else{
                    echo '<div class="container list_view_childContainer" style="padding-right:0px;padding-left:0px;">';
                    echo '<div class="panel panel-default" data-toggle="modal" data-target=".detail">';
                    echo '<div class="panel-heading heading" style="color:#545454;background-color:#FFFFFF;">No Product\'s Found</div>';
                    echo '<div class="panel-body" style="margin-bottom: 30px;">';
                    echo '<div class="row">';
                    echo '<div class="col-sm-12 col-md-12 col-lg-12">';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';     
                }
                ?>
            </div>
        </div>
        </div>
    </body>
</html>

<?php
$conn->close();
?>
