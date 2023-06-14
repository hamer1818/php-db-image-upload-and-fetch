<?php
$tcno=$_GET["hastaid"];
// echo $tcno;
?>

<!DOCTYPE html>
<html lang="TR-tr">
  <head>
    <meta charset="UTF-8" />
    <meta name="referrer" content="no-referrer-when-downgrade">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/style.css" />
    <title>Resim Yükleme</title>
    <style>
      .container{
        text-align: center;
      }
    </style>
  </head>
  <body class="bg-dark text-light">
    <div class="msg">
      Aşağıdaki Düğmeye Tıklayarak ya da Resmi Sürükleyip Beyaz Alana Bıraktıktan sonra Yükle butonuna basıp Yükleme Yapabilirsiniz.
    </div>
    <div class="container">
      <form action="resimkaydet.php" method="post" enctype="multipart/form-data">
      <input type="file" id="upload-button" multiple accept="image/*" name="resim" id="resim"/>
      <label for="upload-button"><i class="fa-solid fa-upload"></i>&nbsp; Dosya Seç</label>
      <div id="error"></div>
      <div id="image-display"></div>
      <input type="hidden" name="hastaid" value="<?php echo $tcno;?>">
      <button type="submit" id="upload-button" class="btn btn-secondary">Yükle</button>
      </form>



    </div>


     <input type="hidden" id="tcno" value="<?php echo $tcno;?>">
    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="application/javascript" src="js/script.js"></script>
    <!-- <script type="application/javascript" src="js/jquery.resizeImg.js"></script> -->
  </body>
</html>
