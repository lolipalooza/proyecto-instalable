<?php
    if(isset($_GET['id'])){
        $idenlace = $_GET['id'];
        include ("config.php");
        $mysqli = new mysqli($dbserver, $dbuser, $dbpass, $dbname);
        /* check connection */
        if($mysqli->connect_errno > 0){
            die('Unable to connect to database [' . $db->connect_error . ']');
        }
        $mysqli->set_charset("utf8");
        $query = "SELECT * FROM sist_enlaces WHERE id = '$idenlace' ORDER BY id ASC";
        $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
        $row = $result->fetch_assoc();
        echo json_encode($row);
        // CLOSE CONNECTION
        mysqli_close($mysqli);

    }
?>
