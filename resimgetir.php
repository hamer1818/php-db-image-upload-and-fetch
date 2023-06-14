<?php
require_once("config.php");
require_once("dbconnect.php");

$hastid = $_POST["hastid"];

// $hastaid=$_POST["hastaid"];
$hastaid= $hastid;
$db=new DBConnect();
$sql="SELECT resimbilgisi FROM resimler WHERE hastaid=$hastaid";
$kullaniciResimleri=$db->fetchAllData($sql);         
$sql = "SELECT * FROM hastalar WHERE hastaid=$hastaid";
$hastaBilgileri=$db->fetchData($sql);


?>





