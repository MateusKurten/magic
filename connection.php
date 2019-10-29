<?php
    function DBConnect(){
        $link = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die (mysqli_error($link));
        mysqli_set_charset($link, DB_CHARSET);

        return $link;
    }

    function DBClose($link){
        mysqli_close($link) or die(mysqli_error($link));   
    }

?>