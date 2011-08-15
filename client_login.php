<?php
    session_start();
    include('functions/general_functions.php');
    if(trim($_POST['username'] == '') or trim($_POST['password'] == ''))
    {
        $redir = $_SERVER['HTTP_REFERER'];
    	redirect($redir);        
    }
    
    include("functions/process_login_subscriber.php");
?>