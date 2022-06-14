<?php 
define('USERKEY', "a12345z");
define("URLLENGTH", 5);
define("SITEURL", "http://localhost/url?u=");
define("PATH", "data");


function limparPost($txtUsekey){    
    $txtUsekey = trim($txtUsekey);
    $txtUsekey = stripslashes($txtUsekey);
    $txtUsekey = htmlspecialchars($txtUsekey);
    return $txtUsekey;
}
