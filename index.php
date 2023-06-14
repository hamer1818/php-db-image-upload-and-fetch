<?php
require_once("config.php");
require_once("dbconnect.php");
require_once("resimgetir.php");

$db=new DBConnect();
$sql="SELECT * FROM hastalar";
$data=$db->fetchAllData($sql);
?>
<!DOCTYPE html>
<html lang="TR-tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Hasta bilgilerini ve Fotoğraflarını getir</title>
    <style>
        #hastaresim{
            margin-left: 50px;
        }
        .hasta{
            cursor: pointer;
        }
        .resimSlayt{
            object-fit: contain;
            width: 600px;
            height: 400px;
            margin-bottom: 50px;
        }
        body{
            width: 1500px;
            margin: auto;
            text-align: center;
        }
    </style>
</head>
<body class="bg-dark text-light">
    
<!-- tablo kısmı -->
<table border="1" width="500" class="table table-dark table-striped">
    <thead><tr>
        <td>ID</td>
        <td>İsim</td>
        <td>İşlemler</td>
    </tr></thead>
<?php
$len=($data == null)?0:count($data);
    for($i=0; $i < $len; $i++){ ?>
        <tr>
            <form action="index.php" method="post">
            <td class='hasta' style='cursor:pointer'>
            <input type="hidden" value=<?php echo $data[$i]['hastaid'];?> name="hastid">
            <input type="submit" value=<?php echo $data[$i]['hastaid']?>></td>
            </form>
            <td><?php echo $data[$i]['adi']?></td>
            <td><a href="hastaresim.php?hastaid=<?php echo $data[$i]['hastaid']; ?>">Resim Yükle</a></td>
        <tr>
    <?php }?>
</table>
<?php
if($kullaniciResimleri == null){
    echo "Kullanıcı resimlerini görmek için ID numaralarında tıklayınız.";
    exit;
}else{ ?>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <?php for($i=1; $i < count($kullaniciResimleri); $i++){ ?>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to=<?php echo $i; ?> aria-label="Slide <?php echo $i+1; ?>"></button>
    <?php } ?>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src=<?php echo $kullaniciResimleri[0]["resimbilgisi"] ?>  class="d-block w-100 resimSlayt" alt="...">
    </div>
    <?php for($i=1; $i < count($kullaniciResimleri); $i++){ ?>
    <div class="carousel-item">
      <img src=<?php echo $kullaniciResimleri[$i]["resimbilgisi"]; ?> class="d-block w-100 resimSlayt" alt="...">
    </div>
    <?php } ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<?php }    
?>
<h1>Hasta Bilgileri</h1>
<table border="1" width="500" class="table table-dark table-striped">
    <thead>
        <tr>
            <td>Hasta ID</td>
            <td>Adı</td>
            <td>Soyadı</td>
            <td>Email</td>
            <td>Telefon</td>
            <td>TC No</td>
            <td>Adres</td>
            <td>Cinsiyet</td>
        </tr>
    </thead>
    <tbody>
<tr>
    <td><?php echo $hastaBilgileri['hastaid']?></td>
    <td><?php echo $hastaBilgileri['adi']?></td>
    <td><?php echo $hastaBilgileri['soyadi']?></td>
    <td><?php echo $hastaBilgileri['email']?></td>
    <td><?php echo $hastaBilgileri['tlf']?></td>
    <td><?php echo $hastaBilgileri['tcno']?></td>
    <td><?php echo $hastaBilgileri['adres']?></td>
    <td><?php echo $hastaBilgileri['cinsiyet']?></td>
</tr>
</tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>