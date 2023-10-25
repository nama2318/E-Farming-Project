<?php
    if(session_status() === PHP_SESSION_ACTIVE){
        session_unset();
        session_destroy();
        header("Refresh:0;");
        header("Location: ../login-usertype-selection.html");
    }
    header("Location: ../login-usertype-selection.html");
?>