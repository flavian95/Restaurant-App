
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sushi Sapporo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<style>
  @media (max-width: 400px) {
     .navigation{
       display: block !important;
     }

     .nav-div{
      display: flex;
      justify-content: center ;
      margin: 5px 0 5px 0 ;
     }
  }
</style>
<body>
<div class="mx-auto" style="max-width: 1240px;">   
 <nav class="d-flex align-items-center justify-content-between p-3 bg-white navigation"> 
  <div class="nav-div">
  <img src="{{ asset('images/hero.png') }}" 
       alt="Hero Image" 
       class="img-fluid"
       style="max-height: 60px;">
  </div>
  <p class="m-0 text-center fw-semibold fs-4 flex-grow-1">
      Sushi Sapporo Takeaway Boston
  </p>
  <div class="nav-div">
  <a href="{{ url('/menu') }}" 
   class="btn text-white fw-bold rounded-pill px-4 py-2"
   style="background-color:#dc3545;"
   onmouseover="this.style.backgroundColor='black'"
   onmouseout="this.style.backgroundColor='#dc3545'">
   Order Online
   </a>
   </div>
</nav>

 <section class="d-flex align-items-center" 
style="height: 100vh; 
background: linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.55)),
url('/images/main.jpg') center/cover no-repeat;">
    <div class="container text-white m-4">
        <div class="col-lg-8">
            <h1 class="display-3 fw-bold">Authentic Sushi Delivered Fresh</h1>

            <p class="lead mt-3">
                Welcome to Sushi Sapporo, your Boston destination for premium Japanese cuisine. 
                Enjoy meticulously crafted rolls, sashimi, and specialties made with the finest 
                ingredients. Fast, reliable delivery straight to your door—order online and 
                experience true sushi perfection.
            </p>

            <div class="mt-4">
                <a href="{{ url('/menu') }}" 
                class="btn text-white fw-bold rounded-pill px-4 py-2"
                style="background-color:#dc3545;"
                onmouseover="this.style.backgroundColor='black'"
                onmouseout="this.style.backgroundColor='#dc3545'">
                Order Online
                </a>
                <a href="{{ url('/menu') }}" 
                class="btn fw-bold rounded-pill px-4 py-2 ms-1"
                style="background-color:#fff; ; color:#111;"
                onmouseover="this.style.backgroundColor='#111'; this.style.color='#fff';"
                onmouseout="this.style.backgroundColor='#fff'; this.style.color='#111';">
                View Menu
                </a>
            </div>
        </div>
    </div>
 </section>

 <section class="py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="{{ asset('images/home-img.jpg') }}" 
                     class="img-fluid rounded shadow-sm"
                     alt="Thai & Sushi Fusion Dish">
            </div>

            <div class="col-md-6">
                <h2 class="fw-bold mb-3 ms-2" style="font-size: 2.5rem;">
                    Premium Sushi Crafted with Tradition & Creativity
                </h2>
                <p class="text-muted ms-2" style="font-size: 1.1rem; line-height: 1.7;">
                    Indulge in the art of authentic sushi made fresh daily by skilled chefs dedicated to 
                    quality and precision. Explore our diverse selection of handcrafted rolls, from classic 
                    favorites like California and Spicy Tuna to specialty creations layered with vibrant 
                    flavors and premium ingredients. Enjoy sashimi prepared with exceptional freshness, 
                    delightful appetizers such as seaweed salad and miso soup, and signature rolls 
                    designed to elevate your dining experience. Treat yourself to the perfect balance of 
                    tradition and innovation—available for pick up or quick delivery.
                </p>
            </div>

        </div>
    </div>
</section>

<section class="container py-4">
  <div class="row">
    
    <div class="col-md-7 mb-4">
      <h3 class="fw-bold mb-3">Location</h3>

      <div class="border rounded overflow-hidden" style="height: 360px;">
        <div class="google-maps w-100 h-100"></div>
      </div>
    </div>

    <div class="col-md-5">

      <h3 class="fw-bold">Sushi Sapporo Authentic Sushi</h3>

      <div class="d-flex align-items-center gap-2 mt-2">
        <span class="badge bg-danger">CLOSED NOW</span>
        <span class="text-muted">• Closes at 9:30 pm</span>
      </div>

      <div class="mb-2">
        <i class="fa-solid fa-location-pin me-2"></i>
        <a href="https://www.google.com/maps/search/?api=1&query=42.351423,-71.064984" target="_blank">
        231 Tremont St, Boston
        </a>
      </div>

      <div class="d-flex align-items-center mt-2">
        <i class="fa-solid fa-phone me-2 text-secondary"></i>
        <a href="tel:012233445577">012233445577</a>
      </div>

      <div class="d-flex mt-4">
        <button class="btn btn-dark w-50 me-2 d-flex justify-content-center align-items-center">
          <i class="fa-solid fa-bag-shopping me-2"></i> Pickup
        </button>
        <button class="btn btn-outline-dark w-50 d-flex justify-content-center align-items-center">
          <i class="fa-solid fa-motorcycle me-2"></i> Delivery
        </button>
      </div>

      <div class="mt-4 p-3 bg-light rounded">
        <h5 class="fw-bold mb-3">Hours of Operation (Takeout)</h5>

        <div class="d-flex justify-content-between">
          <span>Monday – Sunday</span>
          <span>11:00 AM – 10:00 PM</span>
        </div>
      </div>

    </div>

  </div>
</section>

<footer class="container mt-5 pt-4">
  <h4 class="fw-normal mb-3">Sushi Sapporo Authentic Sushi®</h4>
  <hr class="mb-4">

  <div class="d-flex flex-wrap gap-3 mb-4">
    <a href="{{url('/menu')}}" class="text-decoration-underline text-dark">Menu</a>
    <a href="{{url('/terms-and-conditions')}}" class="text-decoration-underline text-dark">Terms and Conditions</a>
    <a href="{{url('/privacy-policy')}}" class="text-decoration-underline text-dark">Privacy Policy</a>
    <a href="{{url('/cookies-policy')}}" class="text-decoration-underline text-dark">Cookies Policy</a>
  </div>
</footer>

</div>
<script src="{{ asset('js/maps.js') }}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&callback=initMap&v=weekly"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>