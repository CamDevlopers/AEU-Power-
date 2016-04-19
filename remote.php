<?php
include 'page/header.php';
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
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                        setTimeout(repeatAjax, 1); //After completion of request, time to redo it after a second
                    }
                }
                xmlhttp.open("GET", "get_result.php", true);
                xmlhttp.send();
            }
            
            function Update_off(id) {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        repeatAjax();
                       // setTimeout(Update_back(id), 10);
                    }
                }
                xmlhttp.open("GET", "process.php?status=off&bid=" + id, true);
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
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        repeatAjax();
                        //setTimeout(Update_back(id), 10);
                    }
                }
                xmlhttp.open("GET", "process.php?status=on&bid=" + id, true);
                xmlhttp.send();
                return false;
            }

            
            
        </script>


    </head>
    <body>

        <div class="container">

            <?php //echo "hi";?>
            <div class="row">
                <div class="col-xs-12">
                    <h3>Remote</h3>	
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-3">

                        <form class="form-horizontal">


                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <?php
                                   

                                    $sql = "SELECT * FROM box";
                                    $result = $con->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $bid = $row['bid'];
                                            $title = $row['title'];
                                            echo '<strong> ' . $title . '</strong> <a onclick="Update_on(' . $bid . ');" class="btn btn-default cal' . $bid . '"  id="on">ON</a>
                                            <a onclick="Update_off(' . $bid . ');" class="btn btn-default cal' . $bid . '"  id="on">OFF</a>
                                    <br/><br/>';
                                        }
                                    }
                                    ?>

                                </div>
                            </div>
                        </form>		

                    </div>
                    <div class="col-xs-9" id="txtHint" style="background: red;">


                        <?php
                        $sql = "SELECT * FROM box";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                $bid = $row['bid'];
                                $title = $row['title'];
                                $status = $row['status'];
                                if ($status == 1) {
                                    $bg = ' style="background: red; " ';
                                } else {
                                    $bg = "";
                                }
                                echo '<div  class="lamp1" id="cal' . $bid . '" ' . $bg . '>' . $title . '</div>';
                            }
                        }
                        ?>


                    </div>
                </div>

            </div>
        </div>
    </body>

</html>