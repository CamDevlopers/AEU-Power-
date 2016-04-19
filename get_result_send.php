<?php
include 'page/config.php';
?>



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

