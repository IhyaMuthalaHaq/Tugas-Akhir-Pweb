<?php

include('include/header.php');
include('include/navbar.php');

if(isset($_SESSION['auth']))
{
    if(!isset($_SESSION['message'])){
        $_SESSION['message'] = "You are already logged In";
    }
    header("Location: Dashboard/index.php");
    exit(0);
}
?>
<div class="full-screen">
  <header id="home">
    <div class="overlay"></div>
    <video autoplay muted loop>
      <source src="img/v2.mp4" type="video/mp4" />
    </video>  
    <div class="intro">
      <h2>Welcome to <br> FAUNA SHPARE</h2>
      <p>Temukan Keanekaragaman Hewan di Seluruh Dunia
      </p>
    </div>
  </header>
  <main>
    <section id="about">
      <div class="inner-screen">
        <h2>About</h2>
        <p class="summary">
          FaunaSphere adalah sumber informasi terkini dan terlengkap mengenai kehidupan satwa liar. Dengan penuh antusias,
           kami membawa Anda ke dalam dunia yang kaya akan kehidupan, dari hutan belantara hingga lautan dalam.
        </p>
        <div class="fill-content">
          <p>
            Dengan ribuan artikel informatif dan foto, kami mengajak Anda untuk menggali lebih dalam ke dalam kehidupan setiap spesies hewan. 
            Mulai dari mamalia hingga reptil, dari serangga hingga burung, FaunaSphere memberikan wawasan mendalam tentang kehidupan setiap makhluk di planet ini.
          </p>
        </div>
      </div>
    </section>
    <section class="abuabu" id="support">
      <div class="layar-dalam support">
        <div>
          <img src="img/p1.png" />
          <h6>Donasi Keuangan</h6>
          <p>
            Setiap sumbangan yang Anda berikan akan membantu kami untuk terus menyajikan konten informatif dan mendukung upaya konservasi.
          </p>
        </div>
        <div>
          <img src="img/p2.png" />
          <h6>Bagikan Pengetahuan Anda</h6>
          <p>
            Jika Anda memiliki informasi atau pengalaman terkait pelestarian dan konservasi satwa liar, mari berbagi. Kontribusi Anda dapat memperkaya pengetahuan dan wawasan komunitas kami.
          </p>
        </div>
        <div>
          <img src="img/p3.png" />
          <h6>Terlibat dalam Aksi Konservasi:</h6>
          <p>
            Ikutilah kegiatan konservasi baik di tingkat lokal maupun global. Melalui partisipasi sebagai sukarelawan atau mendukung proyek-proyek pelestarian, kita dapat berperan aktif dalam menjaga keberlanjutan lingkungan.
          </p>
        </div>
      </div>
    </section>
  </main>
</div>
<?php
include('include/footer.php');
?>