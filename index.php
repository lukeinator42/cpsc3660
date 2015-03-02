<?php


include('./templates/header.html');

include('./templates/sidebar.html');

if (!empty($_GET['action'])) {  
    $action = $_GET['action'];  
    $action = basename($action);  
    if (file_exists("./templates/$action.html")  
        $action = "index";  
    if ($action == 'header' || $action == 'footer') 
        $action = "index"; 
    include("./templates/$action.html");  
} else {  
    include("./templates/index.html");  
}  


include('./templates/footer.html');

?>