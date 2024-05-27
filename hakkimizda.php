<?php
    session_start();
    include("data.php");
    if ($_SESSION["giris"] != sha1(md5("var")) || $_COOKIE["kullanici"] != "msb")
    {
        header("Location: cikis.php");
    }
    if ($_POST) {
        $acıklama = $_POST["acıklama"];
        $sorgu = $baglan->query("delete from Hakkımızda");
        $sorgu = $baglan->query("insert into Hakkımızda (acıklama) values ('$acıklama')");
        if($sorgu)
        {
            echo "<script> window.location.href='hakkimizda.php'; </script>";
        }
        else
        {
            echo "<script> alert('HATA: KAYIT YAPILAMADI');
            window.location.href='hakkimizda.php'; </script>";
        }
    }

    $sorgu = $baglan->query("select * from Hakkımızda");
    $satir = $sorgu->fetch_object();

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Yönetim Paneli Hakkımızda</title>
</head>
<body 
    <div style="text-align:center;">
    <a href="anasayfa.php">ANA SAYFA</a> - <a href="hakkimizda.php">HAKKIMIZDA</a> -
    <a href="ekibimiz.php">EKİBİMİZ</a> - <a href="hizmetlerimiz.php">HİZMETLERİMİZ</a> -
    <a href="referanslarimiz.php">REFERANSLARIMIZ</a> - <a href="blog.php">BLOG</a> -
    <a href="iletisim.php">İLETİŞİM</a> - <a href="cikis.php" onclick="if (!confirm('Çıkış Yapmak İstediğinize Emin Misiniz?')) return false;">ÇIKIŞ</a>
    <br><hr><br><br>
    </div>

    <form action="" method="post">
        <b>İçerik:</b><br><br>
        <textarea style="width:80%;height:300px;" name="acıklama"><?php echo $satir->acıklama ?></textarea><br><br>
        <input type="submit" value="Kaydet">
    </form>
</body>
</html>