<?php


include('./templates/helpers/header.html');

include('./templates/helpers/sidebar.html');

require_once './db/config.php';

if (!empty($_GET['action'])) {  
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



include('./templates/helpers/footer.html');

?>