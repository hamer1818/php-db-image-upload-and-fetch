<?php
require_once("config.php");
require_once("dbconnect.php");


$resim = $_FILES["resim"]["tmp_name"];

$hastaid=$_POST["hastaid"];

$base64_resim = base64_encode(file_get_contents($resim));
echo $base64_resim;


$db=new DBConnect();
$sql="INSERT INTO resimler VALUES($hastaid,'data:image/jpeg;base64,$base64_resim')";
$db->sqlExec($sql);
?>
<script type="text/javascript">
setTimeout(function(){
    window.location.href = "index.php";
}, 100); // 3 saniye (3000 milisaniye)
</script>




