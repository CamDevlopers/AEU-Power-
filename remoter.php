<?php
include 'page/config.php';
header('Content-type: text/html; charset=utf-8');
?>
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Remote</title>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap.js"></script>

        <link href="css/receive.css" rel="stylesheet" />
        <link href='https://fonts.googleapis.com/css?family=Fasthand' rel='stylesheet' type='text/css'>
        <style>
            body {
                font-family: 'Fasthand', serif;

            }
        </style>
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
                        setTimeout(repeatAjax, 1); //After completion of request, time to redo it after a second
                    }
                }
                xmlhttp.open("GET", "get_result.php", true);
                xmlhttp.send();
            }
        </script>


    </head>
    <body>

        <div class="container" style="">

            <div class="row">
                <div class="col-lg-12" id="txtHint" style="background: red;">
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
                            if ($is_lamp == 0) {
                                if ($status_air == 1) {
                                    
                                    $bg = ' style="background: #0000FF; color: #383838; " ';
                                } else {
                                    $bg = ' style="background: #000; " ';
                                    
                                }
                            } else {
                                if ($status == 1) {
                                    $bg = ' style="background: #000; color: #383838; " ';
                                } else {
                                    
                                    $bg = ' style="background: #000; " ';
                                }
                            }

                            echo '<div  class="lamp1" id="cal' . $bid . '" ' . $bg . '>' . $title . '<br/>' . $bid . '</div>';
                        }
                    }
                    ?>


                </div>
            </div>
            <div style="clear: both;"></div>
        </div>
            <center>
                <input type="text" name="lamp_entry" id="lamp_entry">
            </center>
            
    </body>

    <script type="text/javascript">
        $("#lamp_entry").focus();

        $(document).on("keyup","#lamp_entry",function(){
            var index_lamp = $(this).val();

            if(index_lamp.length==2){
               if(index_lamp=='12'){
                    Update_on(2);
               }else if(index_lamp=='13'){
                    Update_off(3);
               }else if(index_lamp=='21'){
                    Update_on(5);
               }else if(index_lamp=='23'){
                    Update_off(6);
               }else if(index_lamp=='31'){
                    Update_on(8);
               }else if(index_lamp=='32'){
                    Update_off(9);
               }else if(index_lamp=='41'){
                    Update_on(11);
               }else if(index_lamp=='42'){
                    Update_off(12);
               }else if(index_lamp=='51'){
                    Update_on(14);
               }else if(index_lamp=='52'){
                    Update_off(15);
               }else if(index_lamp=='61'){
                    Update_on(17);
               }else if(index_lamp=='62'){
                    Update_off(18);
               }else if(index_lamp=='71'){
                    Update_on(20);
               }else if(index_lamp=='72'){
                    Update_off(21);
               }else if(index_lamp=='73'){
                    Update_on(22);
               }else if(index_lamp=='74'){
                    Update_off(23);
               }else if(index_lamp=='81'){
                    Update_on(25);
               }else if(index_lamp=='82'){
                    Update_off(26);
               }else if(index_lamp=='83'){
                    Update_on(27);
               }else if(index_lamp=='84'){
                    Update_off(28);
               }
            }
        });

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
    </script>

</html>