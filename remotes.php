<?php
ob_start();

include 'page/header.php';
session_start();
if (!isset($_SESSION['login'])) {

    header('Location: login.php');
    //  exit();
} else {
    
}
?>

<script>
    repeatAjax();
    function repeatAjax() {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                //setTimeout(repeatAjax, 5000); //After completion of request, time to redo it after a second
            }
        }
        xmlhttp.open("GET", "get_result_send.php", true);
        xmlhttp.send();
    }

    /*
    function Update_off(id) {
        Update_air_on();
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                
             repeatAjax();
                // setTimeout(Update_back(id), 10);
            }
        }
        xmlhttp.open("GET", "page/process.php?status=off&bid=" + id, true);
        xmlhttp.send();
        return false;
    }*/
    function Update_off(id) {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                repeatAjax();
                setTimeout(function() {
                    Update_airoff(id);
                }, 1500);
            }
        }
        xmlhttp.open("GET", "page/process.php?status=off&bid=" + id, true);
        xmlhttp.send();
        return false;
    }
    
    /*
    function Update_on(id) {
         Update_air_on();
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               repeatAjax();
                //setTimeout(Update_back(id), 10);
                //setTimeout(Update_off(id), 1000);
            }
        }
        xmlhttp.open("GET", "page/process.php?status=on&bid=" + id, true);
        xmlhttp.send();
        return false;
    }
    */
   function Update_on(id) {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              repeatAjax();
               //setTimeout(Update_off(id), 1500);
               setTimeout(function() {
                    Update_airoff(id);
                }, 1500);
            }
        }
        xmlhttp.open("GET", "page/process.php?status=on&bid=" + id, true);
        xmlhttp.send();
        return false;
    }
    
    function Update_airoff(id) {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                repeatAjax();
                // setTimeout(Update_back(id), 10);
            }
        }
        xmlhttp.open("GET", "page/process.php?status=off&off=air&bid=" + id, true);
        xmlhttp.send();
        return false;
    }
    
   
    

    function Update_off2(id , room_id) {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                repeatAjax();
                // setTimeout(Update_back(id), 10);
                setTimeout(function() {
                    Update_airoff(id);
                }, 1500);
            }
        }
        xmlhttp.open("GET", "page/process.php?status=off&bid=" + id, true);
        xmlhttp.send();
        return false;
    }
    
    function Update_off_air_by_lam2(id , room_id) {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                repeatAjax();
                // setTimeout(Update_back(id), 10);
            }
        }
        xmlhttp.open("GET", "page/process.php?status=off&bid=" + id + "&room_id="+room_id, true);
        xmlhttp.send();
        return false;
    }
    
    
    
    
    function Update_on2(id , room_id) {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                repeatAjax();
                //setTimeout(Update_back(id), 10);
                setTimeout(function() {
                    Update_airoff(id);
                }, 1500);
            }
        }
        xmlhttp.open("GET", "page/process.php?status=on&bid=" + id, true);
        xmlhttp.send();
        return false;
    }



</script>
<style>
    body {
        background: url(img/background.jpg) no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>
</head>
<body>
    <div class="container" style="text-align: right;">
        <a style="" href="profile.php">ផ្លាស់ប្ដូរ </a>   &nbsp;&nbsp;| &nbsp;&nbsp;
        <a style="color: red;" href="profile.php?logout=true">ចាកចេញ </a>


    </div>

    <div class="container">

        <?php //echo "hi";?>
        <div class="row">
            <div class="col-xs-12" style="text-align: center;">
                <h2 style="color: #0000D9;">កម្មវិធីបិទបើកភ្លើងតាមអុីុនធឺណែត</h2>	
            </div>
            <div class="col-xs-12">

                <div class="col-xs-12" id="txtHint" style="">

                    <?php
                    $lamp_status = 0;
$sql = "SELECT * FROM floor ORDER BY f_id ASC";
$result1 = $con->query($sql);
while ($row_floor = $result1->fetch_assoc()) {
    $floor_name = $row_floor['floor_name'];
    echo '<div style="clear: both;"></div><h3 style="color: #0000D9;font-weight: bold;">' . $floor_name . '</h3><div style="clear: both;"></div>';
    $f_id = $row_floor['f_id'];
    $rs = "SELECT * FROM room   WHERE floor_id = " . $f_id . " ";
    $rs = $con->query($rs);
    while ($row_room = $rs->fetch_assoc()) {
        $disable_lamp_btn_off = 0;
        $room_name = $row_room['room_name'];
        $room_id = $row_room['room_id'];
        echo '<div style="clear: both;"></div><h4>' . $room_name . '</h4><div style="clear: both;"></div>';
        $sql = "SELECT * FROM box   WHERE floor_id = " . $f_id . " AND  room_id = " . $room_id . " ORDER BY is_lamp DESC";
        $result = $con->query($sql);
        $sql2 = "SELECT * FROM box   WHERE floor_id = " . $f_id . " AND is_lamp = 0 AND status = 1 AND  room_id = " . $room_id . " ORDER BY is_lamp DESC";
        $result2 = $con->query($sql2);
        if($result2->num_rows > 0){
            $disable_lamp_btn_off = 1;
        }
        if ($result->num_rows > 0) {
            // output data of each row
            
            $img = '';
            $img2 = '';

            while ($row = $result->fetch_assoc()) {
                $bid = $row['bid'];
                $title = $row['title'];
                $status = $row['status'];
                $room_name = '<span style="padding: 4px; color: #272727;">' . $row['room_name'] . '</span><br/>';
                $type = '<span style="padding: 4px; color: #272727;">' . $row['type'] . '</span><br/>';
                $is_lamp = $row['is_lamp'];

                if ($is_lamp == 0) {

                    if ($status == 1) {

                        $bg = ' style="text-align: center;" ';
                        $img = '<img src="img/img_on.png" style="height: 80px;">';
                        $img2 = '<img src="img/air_on.png" style="height: 70px; margin-top:10px;  margin-bottom:14px;">';
                    } else {
                        $bg = ' style="text-align: center; background: #CCCCCC;" ';

                        $img = '<img src="img/img_off.png" style="height: 80px;">';
                        $img2 = '<img src="img/air_off.png" style="height: 70px; margin-top:10px; margin-bottom:14px;">';
                    }
                } else {
                    if ($status == 1) {
                        $lamp_status = 1;
                        $bg = ' style="text-align: center;" ';
                        $img = '<img src="img/img_on.png" style="height: 80px;">';
                        $img2 = '<img src="img/lamp_on.png" style="height: 80px; margin-top:2px;margin-bottom:10px;">';
                    } else {
                        $lamp_status = 0;
                        $bg = ' style="text-align: center; background: #CCCCCC;" ';
                        $img = '<img src="img/img_off.png" style="height: 80px;">';
                        $img2 = '<img src="img/lamp_off.png" style="height: 80px; margin-top:2px;margin-bottom:10px;">';
                    }
                }


                $btn_on = '';
                $btn_off = '';
                if ($is_lamp == 0) {
                    if ($lamp_status == 1) {
                        if ($status == 1) {
                            $btn_on = '<button  disabled class="btn_off btn-default cal' . $bid . '"  id="on">បើក</button>';
                            $btn_off = '<button onclick="Update_off(' . $bid . ');" class="btn btn-default cal' . $bid . '"  id="on">បិទ</button>';
                        }else {
                            $btn_on = '<button onclick="Update_on(' . $bid . ');" class="btn btn-default cal' . $bid . '"  id="on">បើក</button>';
                            $btn_off = '<button disabled class="btn_off btn-default cal' . $bid . '"  id="on">បិទ</button>';
                        }
                        //$btn_on = '<button onclick="Update_on(' . $bid . ');" class="btn btn-default cal' . $bid . '"  id="on">បើក</button>';
                        //$btn_off = '<button onclick="Update_off(' . $bid . ');" class="btn btn-default cal' . $bid . '"  id="on">បិទ</button>';
                    } else {
                        $btn_on = '<button  disabled class="btn_off btn-default cal' . $bid . '"  id="on">បើក</button>';
                        $btn_off = '<button disabled class="btn_off btn-default cal' . $bid . '"  id="on">បិទ</button>';
                    }
                } else {
                    if ($status == 1) {
                        $btn_on = '<button  disabled class="btn_off btn-default cal' . $bid . '"  id="on">បើក</button>';
                        //$btn_on = '<button  onclick="Update_on2(' . $bid . ' , ' . $room_id . ');" class="btn btn-default cal' . $bid . '"  id="on">បើក</button>';
                        $btn_off = '<button onclick="Update_off2(' . $bid . ' , ' . $room_id . ');" class="btn btn-default cal' . $bid . '"  id="on">បិទ</button>';
                    }else {
                        $btn_on = '<button onclick="Update_on2(' . $bid . ' , ' . $room_id . ');" class="btn btn-default cal' . $bid . '"  id="on">បើក</button>';
                        //$btn_off = '<button onclick="Update_off2(' . $bid . ' , ' . $room_id . ');" class="btn btn-default cal' . $bid . '"  id="on">បិទ</button>';
                        $btn_off = '<button disabled class="btn_off btn-default cal' . $bid . '"  id="on">បិទ</button>';
                    }
                    //$btn_on = '<button onclick="Update_on2(' . $bid . ' , ' . $room_id . ');" class="btn btn-default cal' . $bid . '"  id="on">បើក</button>';
                    if($disable_lamp_btn_off == 1){
                        $btn_off = '<button disabled class="btn_off btn-default cal' . $bid . '"  id="on">បិទ</button>';
                    }
                    
                }
                ?>

                <div  class="send_box" id="" <?php echo $bg; ?> > 
                    <div style="width: 40%; float: left; height: 180px; background: #999; padding-top: 0px;" >
                        <p style="margin: 7px">
                            <?php
                            echo $btn_on;
                            ?>
                        </p>
                        <?php echo $img; ?>

                        <p style="margin: 7px"><?php
                        echo $btn_off;
                        ?></p>
                    </div>
                    <div style="width: 60%;float: left; height: 200px; ">

                        <?php echo $room_name; ?>
                        <div style="clear: both;"></div>
                        <?php echo $bid; ?>
                        <div style="clear: both;"></div>
                        <?php echo $img2; ?>
                        <?php echo $type; ?>
                    </div>
                </div>
                <?php
            }
        }
    }
}
                    ?>


                </div>
            </div>

        </div>
        <div style="clear: both;"></div>
    </div>
</body>

</html>