<?php
    if(session_id() == '') {
        session_start();
    }else{
        session_unset();
        session_destroy();
        echo'<script>window.location="login"</script>';
    }

?>