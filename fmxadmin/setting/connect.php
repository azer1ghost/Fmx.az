<?php

try{
    $db=new PDO("mysql:host=localhost;dbname=fmx",'root','4145124azer');
    $db->exec("set names utf8"); }

catch (PDOExpception $e) { echo $e->getMessage (); 
}

$sitename="http://localhost/fmx.az";

?>