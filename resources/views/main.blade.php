<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UMKM Bakso</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/ea590c57b3.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" type="image/jpg" href="img/logo.png"/>

  <script type="text/javascript">
    let btn = document.getElementById ("btt");

    window.onscroll = function () {
      scrollFunction();
    };

    function scrollFunction() {
      if( document.body.scrollTop > 20 ||
      document.documentElement.scrollTop > 20) {
        btt.style.display = "block";
      } else{
        btt.style.display = "none";
      }
    }
  </script>

</head>

<body>
  @include('partials.navbar')

  <!--Container for welcoming message-->
  <div class="container" id="home">
    <img src="img/bg.png" width="500" class="rounded float-end mt-5 ms-3">
    
    <div class="container mt-5">
      <span class="badge text-bg-secondary"><i class="fa-solid fa-thumbs-up"></i> Our Best Sales</span>

      <h1 class="display-1">SELAMAT DATANG!</h1>

      <p class="me-5">
        Pondok Bakso Marem dan Mie Ayam Pak Rebo merupakan warung yang menyediakan beberapa jenis makanan dan minuman seperti mie, bakso dan nasi yang pasti akan menggugah selera. Berikut ini adalah makanan yang kami rekomendasikan 
      </p>
    </div> <br>

    <div class="d-flex jusitfy-content-around gap-5 mx-5q">
      @foreach ($headers as $header)
      <div class="card h-110" style="width: 12rem;">
        <img src="{{asset('storage/images/' . $header->image)}}" class="card-img-top" alt="image-photo">

        <div class="card-img-overlay">
          <p class="card-text float-end"> <i class="fa-solid fa-heart" style="color: #ff0000;"></i></p>
        </div>

        <div class="card-body">
          <h5 class="card-title">{{ $header->name }}</h5>
        </div>
      </div> 
      @endforeach

    </div>
  </div>
  <!--End of Container for welcoming message-->

  <br><br><br>

  <!--Menu container-->
  <div id="menu">
    <h1 class="display-5 text-center">-- MENU --</h1> <br>
    
    @foreach ($productCategories as $productCategory)
    <div class="container justify-content-between">
      <p class="text-left">{{ $productCategory->name }}</p>  

      <div class="row row-cols-1 row-cols-md-6 g-4">
        @if (count($productCategory->products) > 0)
          @foreach ($productCategory->products as $product)
          <div class="col">
            <div class="card h-100 bg-color" style="width: 10rem;">
              <img src="{{asset('storage/images/' . $product->image)}}" class="card-img-top ctm-img" alt="image-photo">

              <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">Rp.{{ $product->price }}</p>
              </div>
            </div>
          </div>
          @endforeach
        @endif
      </div>
    </div>
      <br>
    @endforeach
  </div>
  <!-- End of This is menu container -->

  <!-- This is about container -->
  <div class="container" id="about">
    <div class="container">
      <h1 class="display-3 text-center">- PONDOK BAKSO MAREM -</h1>
      <img src="img/bg.png" alt="" width="550" class="float-start rounded m-5">
      <p class="lead custom-text">Pondok Bakso Marem dan Mie Ayam Pak Rebo merupakan salah satu usaha UMKM yang sudah berdiri sejak tahun 2010 hingga saat ini. <br> <br>
      Kedua usaha ini bergerak pada bidang kuliner sehingga mampu memberikan kontribusi pada keberagaman kuliner di Batam dan menawarkan pengalaman makan yang memuaskan bagi para pelanggan dengan cita rasanya tersendiri. <br><br>
      Mereka juga menawarkan Produk dan jasanya baik secara offline maupun online ( pengantaran ke rumah ) melalui aplikasi E-Commers.</p>
    </div>
  </div> <br><br>
  <!-- End of This is about container -->

  <!-- Footer -->
  <footer class="text-center text-lg-start bg-body-tertiary text-muted" id="contact">

  <!-- Section: Links  -->
  <section class="p-2">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-1">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 custom-margin">
            <img src="img/logo.png" alt="" class="custom-logo">
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 custom-margin2">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mt-5 mb-4">
            contact us
          </h6>

          <p class="text-uppercase">
            komplek taman baloi mas garden <br>
            blok e.20 
            baloi indah, kec. lubuk baja, <br>
            kota batam,  kepulauan riau 29432<br><br>
            +62 813 7220 0566
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 custom-margin2">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mt-5">
            opening schedule
          </h6>
          
          <p class="text-uppercase">
            <i class="fa-solid fa-clock"></i> 07:00 - 22:00 <br><br>
            <i class="fa-solid fa-calendar"></i> Monday-Sunday
          </p> <br>
        </div>
      </div>
        <!-- Grid column -->
    </div>
    <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    <div class="container d-inline custom col-md-3 col-lg-4 col-xl-5" >
      <a href="https://gofood.co.id/batam/restaurant/pondok-bakso-marem-pak-rebo-baloi-mas-garden-5fd014de-b2f2-4138-93c5-3429cabacae1">
        <img class="mx-3"  src="img/gofood-logo.png" alt="gofood">
      </a>
      
      <a href="https://r.grab.com/g/6-20240610_003010_b75ef17bce0e6577_MEXMPS-IDGFSTI0000148e">
        <img class="mx-3" src="img/grab-logo.png" alt="grabfood">
      </a>

      {{-- untuk shopee food tidak ada outlet nya di aplikasi --}}
      <img class="mx-3" src="img/shopee-logo.jpeg" alt="shopeefood">

      <a href="https://wa.me/+6281372200566">
        <img class="mx-3" src="img/whatsapp-logo.jpeg" alt="whatsapp">
      </a>
      <img class="mx-3" src="img/halal-logo.jpeg" alt="halal">
    </div>
  </div>
  </footer>
  <!-- Footer -->

  <a href="#">
    <button type="button" class="btn btn-danger btn-floating" id="btt">
      <i class="fas fa-arrow-up"></i>
    </button>
  </a>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>