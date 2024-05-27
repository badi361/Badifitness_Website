<?php
    session_start();
    include("data.php");

    if ($_SESSION["giris"] != sha1(md5("var")) || $_COOKIE["kullanici"] != "msb")
    {
        header("Location: cikis.php");
    }

    $islem = $_GET["islem"];

    if ($islem == "sil") {
        $id = $_GET["id"];
        $sorgu = $baglan->query("delete from Ekibimiz where (id='$id')");
        echo "<script> window.location.href='ekibimiz.php'; </script>";
    }

    if ($islem == "ekle") {
        $baslik = $_POST["baslik"];
        $resim = "img/".$_FILES["foto"]["name"];
        move_uploaded_file($_FILES["foto"]["tmp_name"], $resim);
        $sorgu = $baglan->query("insert into Ekibimiz (baslik,foto) values ('$baslik','../$resim')");
        echo "<script> window.location.href='ekibimiz.php'; </script>";
    }

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Yönetim Paneli Ekibimiz</title>
</head>
<body style="text-align:center;">

    <div style="text-align:center;">
    <a href="anasayfa.php">ANA SAYFA</a> - <a href="hakkimizda.php">HAKKIMIZDA</a> -
    <a href="ekibimiz.php">EKİBİMİZ</a> - <a href="hizmetlerimiz.php">HİZMETLERİMİZ</a> -
    <a href="referanslarimiz.php">REFERANSLARIMIZ</a> - <a href="blog.php">BLOG</a> -
    <a href="iletisim.php">İLETİŞİM</a> - <a href="cikis.php" onclick="if (!confirm('Çıkış Yapmak İstediğinize Emin Misiniz?')) return false;">ÇIKIŞ</a>
    <br><hr><br><br>
    </div>

    <table width="100%" border="1">
        <tr align="center">
            <th>S. No</th>
            <th>Başlık</th>
            <th>Sil</th>
        </tr>
        <?php
            $sirano = 0;
            $sorgu = $baglan->query("select * from Ekibimiz");
            while ($satir = $sorgu->fetch_object()) {
                $sirano++;
                echo "<tr align='center'>
                <td>$sirano</td>
                <td>$satir->baslik</td>
                <td><a href='ekibimiz.php?islem=sil&id=$satir->id'>Sil</td>
                </tr>";
            }
        ?>
    </table>

    <br><br>

    <form action="ekibimiz.php?islem=ekle" enctype="multipart/form-data" method="post">
        <b>Başlık:</b><input type="text" size="20" name="baslik"> 
        <b>Resim:</b><input type="file" name="foto"> 
        <input type="submit" value="Kaydet">
    </form>



    

</body>
</html>