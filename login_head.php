<?php
  session_start();
  if( isset( $_SESSION[ 'uid' ] ) ) {
    $jb_login = TRUE;
  }
?>