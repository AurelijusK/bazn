<?php
function isUserLogged() {
    if(isset($_SESSION['id'])) {
        return true;
    } else {
       return false;
    }
}
?>