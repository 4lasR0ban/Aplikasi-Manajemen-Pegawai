<?php
    include("header.php");
?>

        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class="active" aria-current="true"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item">
                    <img src="assets/img/hutan2.JPG" alt="pic1" height="100%" width="100%">
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>VISI</h1>
                            <p>Menjadi Perusahaan Pengelola Hutan Berkelanjutan dan Bermanfaat Bagi Masyarakat</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/img/hutan1.JPG" alt="pic1" height="100%" width="100%">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>MISI</h1>
                            <p>Mengelola Sumberdata Hutan Secara Lestari</p>
                            <p>Peduli Kepada Kepentingan Masyarakat dan Lingkungan</p>
                            <p>Mengoptimalkan Bisnis Kehutanan dengan Prinsip Good Corporate Governance</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item active">
                    <img src="assets/img/pic3.JPG" alt="pic1" height="100%" width="100%">
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>Tata Nilai</h1>
                            <h3><strong>AKHLAK</strong></h3>
                            <p>Amanah, Kompeten, Harmonis, Loyal, Adptif, Kolaboratif</p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>

<?php
    include("footer.php");
?>