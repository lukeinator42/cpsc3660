<?php


include('./templates/helpers/header.php');

include('./templates/helpers/sidebar.php');

require_once './db/config.php';


if(!isset($_SESSION["username"])&&!(isset($_GET["action"])&&$_GET["action"]=='login')) {

	include("./templates/login.php");

} else if (!empty($_GET['action'])) {  
    $action = $_GET['action'];  
    $action = basename($action);  
    
    if (!file_exists("./templates/$action.php"))  
        $action = "index";  
    
    if ($action == 'header' || $action == 'footer' || $action == 'sidebar') 
        $action = "index"; 
    
    include("./templates/$action.php");  
} else {  
    include("./templates/index.php");  
}  



include('./templates/helpers/footer.php');

?>