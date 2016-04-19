<?php

include 'page/config.php';


?>

<?php

$sql = "SELECT * FROM box";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $bid = $row['bid'];
        $title = $row['type'];
        $status = $row['status'];
        $status_air = $row['status_air'];
        $is_lamp = $row['is_lamp'];
       // if($is_lamp == 0){
            if ($status_air == 1) {
            //color: #383838;
                $bg = ' style="background: #fff; color: #383838; " ';
                
                
            } else {
               
                
                $bg = ' style="background: #000;" ';
            }
       /* }else {
        
        
            if ($status_air == 1) {
            
            
                //$bg = ' style="background: #000; color: #383838; " ';
                // update color to white when open a lamp
                $bg = ' style="background: #FFF; color: #000;" ';
                
            } else {
               
               //$bg = ' style="background: #fff; " ';
               // update color to black when off a lamp
               $bg = ' style="background: #000; color: #383838;" ';
            }
            

            
        }*/

        echo '<div  class="lamp1" id="cal' . $bid . '" ' . $bg . '>' . $title .'<br/>'.$bid. '</div>';
    }
}
?>
