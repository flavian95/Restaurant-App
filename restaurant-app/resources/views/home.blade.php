
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sushi Sapporo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<div class="mx-auto" style="max-width: 1240px;">   
 <nav class="d-flex align-items-center justify-content-between p-3 bg-white"> 
  <img src="{{ asset('images/hero.png') }}" 
       alt="Hero Image" 
       class="img-fluid"
       style="max-height: 60px;">
  <p class="m-0 text-center fw-semibold fs-4 flex-grow-1">
      Sushi Sapporo Takeaway Boston
  </p>
  <button class="btn text-white fw-bold rounded-pill px-4 py-2" 
          style="background-color:#dc3545;"
          onmouseover="this.style.backgroundColor='black'"
          onmouseout="this.style.backgroundColor='#dc3545'">
      Order Online
  </button>
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
                <button class="btn text-white fw-bold rounded-pill px-4 py-2 me-1" 
                style="background-color:#dc3545;"
                onmouseover="this.style.backgroundColor='black'"
                onmouseout="this.style.backgroundColor='#dc3545'">
                Order Online
                </button>
                <button class="btn fw-bold rounded-pill px-4 py-2 ms-1"
                style="background-color:#fff; color:#111;"
                onmouseover="this.style.backgroundColor='#111'; this.style.color='#fff';"
                onmouseout="this.style.backgroundColor='#fff'; this.style.color='#111';">
                View menu
                </button>
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

<section class="d-flex">
    <!-- <div>
      <h4>Location</h4> -->
      <div class="google-maps" style="width: 50%; height: 400px;"></div> 
    <!-- </div> -->
    <div>
      <h4>Sushi Sapporo Authentic Sushi</h4>
      <div class="d-flex">
        <p>CLOSED NOW</p>
        <p>Closes at 9:30 PM</p>
      </div>
    <div class="d-flex">
        <i class="fa-solid fa-location-dot"></i>
        <p>Somewhere in Boston</p>
    </div>
    <div class="d-flex">
        <i class="fa-solid fa-phone"></i>
        <p>012233445577</p>
    </div>
    <div>
        <div class="d-flex">
            <i class="fa-solid fa-bag-shopping"></i>
            <p>Pickup</p>
        </div>
        <div class="d-flex">
            <i class="fa-solid fa-motorcycle"></i>
            <p>Delivery</p>
        </div>
    </div>
    <div>
        <h4>Hours of Operation</h4>
        <div class="d-flex">
            <p>Monday- Sunday</p>
            <p>11:00 AM - 10:00 PM</p>
        </div>
    </div>
</section>
<footer>
    <p>Sushi Sapporo Authentic Sushi &#174;</p>
    <div>
        <a href="#">Menu</a>
        <a href="#">Terms and Conditions</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Cokkie Policy</a>
    </div>
</footer>

</div>
<script src="{{ asset('js/maps.js') }}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&callback=initMap&v=weekly"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>