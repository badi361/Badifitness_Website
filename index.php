<?php
    include("data.php");
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Web Tasarımı Dersi Ödev</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

      <header>
          <a href="javascript:void(0);" onclick="ac();" id="acdgm">☰</a>
          <a href="javascript:void(0);" onclick="kapat();" id="kapatdgm">☰</a>
      </header>

      <aside id="menu">
        <ul>
          <li><a href="#Hakkimizda">Hakkımızda</a></li>
          <li><a href="#Anasayfa">Ana Sayfa</a></li>
          <li><a href="#Hizmetlerimiz">Hizmetlerimiz</a></li>
          <li><a href="#Ekibimiz">Ekibimiz</a></li>
          <li><a href="#Blog">Blog</a></li>
          <li><a href="#Referanslarimiz">Referanslarımız</a></li>
          <li><a href="#iletisim">İletişim</a></li>

        </ul>
      </aside>

      <main id="icerik">
        <section id="Anasayfa">
          <h1>Badifitness</h1>
          <hr>
          <div class="temizle"></div>
          <?php
                $sorgu = $baglan->query("select * from Anasayfa");
                $satir = $sorgu->fetch_object();
                echo $satir->acıklama;
          ?>
          
          <div class="temizle"></div>
        </section>
        
        <section id="Hakkimizda">
          <h2>Hakkımızda</h2>
          <hr>
          <div class="temizle"></div>
          <?php
                $sorgu = $baglan->query("select * from Hakkımızda");
                $satir = $sorgu->fetch_object();
                echo $satir->acıklama;
          ?>
         </section>

        <section id="Hizmetlerimiz">
          <h2>Hizmetlerimiz</h2>
          <hr>
          <div class="temizle"></div>
          <?php
                $sorgu = $baglan->query("select * from Hizmetlerimiz");
                $satir = $sorgu->fetch_object();
                echo $satir->aciklama;
          ?>
        </section>

        <section id="Ekibimiz">
          <h2>Ekibimiz</h2>
          <hr>
          <div class="temizle"></div>
          <?php
            $sorgu = $baglan->query("select * from Ekibimiz");
            while ($satir = $sorgu->fetch_object())
            {
                $resim = substr($satir->foto, 3);
                echo "<div class='galeri'>
                <a href='$resim' class='resimler' rel='group2' title='$satir->baslik'><img src='$resim' alt='galeri'></a>
                <h4> $satir->baslik </h4>
              </div>";
            }
          ?>
          <div class="galeri">
            <a href="img/1.jpg" class="resimler" rel="group2" title="Galeri"><img src="img/1.jpg" alt="galeri"></a>
          </div>
          
          <div class="temizle"></div>
        </section>

        <section id="Blog">
          <h2>Bloglarımız</h2>
          <hr>
          <div class="temizle"></div>
          <?php
                $sorgu = $baglan->query("select * from Blog");
                $satir = $sorgu->fetch_object();
                echo $satir->aciklama;
          ?>
        </section>

        <section id="Referanslarimiz">
          <h2>Referanslarımız</h2>
          <hr>
          <div class="temizle"></div>
          <?php
                $sorgu = $baglan->query("select * from Referanslarımız");
                $satir = $sorgu->fetch_object();
                echo $satir->aciklama;
          ?>
        </section>

        <section id="iletisim">
          <h2>İletişim</h2>
          <hr>
          <div class="temizle"></div>
          <form method="post" action="">
          <iframe src="https://www.google.com/maps/d/u/0/embed?mid=158nSIkthfhorKpech33vl51DoLtDNEg&ehbc=2E312F" width="640" height="480"></iframe>            <input type="text" name="adsoyad" id="adsoyad" required>

            <label for="telefon">Telefon</label>
            <input type="tel" name="telefon" id="telefon">

            <label for="eposta">E-posta</label>
            <input type="email" name="eposta" id="eposta">

            <label for="mesaj">Mesaj</label>
            <textarea name="mesaj" id="mesaj"></textarea>

            <button type="submit">Mesaj Gönder</button>
          </form>
        </section>
        
      </main>

      <script src="js/jquery-1.4.3.min.js"></script>
      <script src="js/jquery.fancybox-1.3.4.js"></script>
    <script>
        $("a.resimler").fancybox();

        function ac() {
            document.getElementById("menu").style.display = "block";
            document.getElementById("icerik").style.paddingLeft = "350px";
            document.getElementById("acdgm").style.display = "none";
            document.getElementById("kapatdgm").style.display = "block";
        }

        function kapat() {
            document.getElementById("menu").style.display = "none";
            document.getElementById("icerik").style.paddingLeft = "50px";
            document.getElementById("acdgm").style.display = "block";
            document.getElementById("kapatdgm").style.display = "none";
        }
    </script>  

    </body>
</html>