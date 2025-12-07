
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Sushi Sapporo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<style>
    @media (max-width: 400px) {
    .menu-card {
        padding: 0 !important;
    }

    .menu-card .row {
        flex-direction: column !important;
        text-align: center;
    }

    .menu-card .col-8 {
        text-align: center !important;
    }

    .menu-card .d-flex.align-items-center {
        justify-content: center !important; 
    }

    .menu-card .col-4 {
        text-align: center !important;
        margin-top: 10px;
    }
}

@media (min-width: 765px) and (max-width: 995px) {
    .menu-card .row {
        flex-direction: column !important;
        text-align: center;
    }

    .menu-card .col-8 {
        text-align: center !important;
    }

    .menu-card .d-flex.align-items-center {
        justify-content: center !important; 
    }

    .menu-card .col-4 {
        text-align: center !important;
        margin-top: 10px;
    }

    .l1{
      position: relative !important;
      top: 27px !important;
    }

    .l2{
      position: relative !important;
      top: 54px !important;
    }
}

</style>
<body>
<div class="container">  
    <div class="container mt-5">
  <div class="row align-items-center">

    <div class="col-md-6 ms-3">
      
      <h1 class="mb-3">Sushi Sapporo - Menu</h1>

      <div class="mb-2">
        <span class="me-2 fw-semibold">Store Information</span>
        <span class="badge bg-danger badge-open">CLOSED NOW</span>
        <span class="text-muted text-open">• Closes at 9:30 pm</span>
      </div>

      <div class="mb-2">
        <i class="fa-solid fa-location-pin me-2"></i>
        <a href="https://www.google.com/maps/search/?api=1&query=42.351423,-71.064984" target="_blank">
        231 Tremont St, Boston
        </a>
      </div>


      <div class="mb-2">
       <i class="fa-solid fa-phone me-2"></i>
       <a href="tel:012233445577">012233445577</a>
      </div>


    </div>

    <div class="col-md-5 d-flex justify-content-end align-items-start mt-1">

      <a href="{{ route('cart.view') }}" 
         class="me-1 btn text-white fw-bold rounded-pill px-4 py-2"
         style="background-color:#dc3545;"
         onmouseover="this.style.backgroundColor='black'"
         onmouseout="this.style.backgroundColor='#dc3545'"> View Cart
        <i class="fa-solid fa-basket-shopping"></i>
        <span id="cart-count" 
          class="badge bg-dark ms-2"
          style="font-size: 0.8rem;">0</span>
      </a>

@if (Auth::check())
    <form action="{{ route('logout') }}" method="POST" class="d-inline">
    @csrf
    <button type="submit"
        class="ms-1 btn fw-bold rounded-pill px-4 py-2 border border-2 border-dark"
        style="background-color:#fff; color:#111;"
        onmouseover="this.style.backgroundColor='#111'; this.style.color='#fff';"
        onmouseout="this.style.backgroundColor='#fff'; this.style.color='#111';">
        Logout
        <i class="fa-solid fa-right-from-bracket"></i>
    </button>
</form>
@else
    <a href="{{ route('login.perform') }}"
        class="ms-1 btn fw-bold rounded-pill px-4 py-2 border border-2 border-dark"
        style="background-color:#fff; color:#111;"
        onmouseover="this.style.backgroundColor='#111'; this.style.color='#fff';"
        onmouseout="this.style.backgroundColor='#fff'; this.style.color='#111';">
        Login
        <i class="fa-solid fa-right-to-bracket"></i>
    </a>
@endif

@if (Auth::check())
    <a href="{{ route('dashboard.show') }}"
        class="ms-1 btn fw-bold rounded-pill px-4 py-2 border border-2 border-dark"
        style="background-color:#fff; color:#111;"
        onmouseover="this.style.backgroundColor='#111'; this.style.color='#fff';"
        onmouseout="this.style.backgroundColor='#fff'; this.style.color='#111';">
        Dashboard
        <i class="fa-solid fa-gauge"></i>
    </a>
@endif

    </div>

  </div>
</div>

<div style="background-image: url('{{ asset('images/menu.jpg') }}');">
<div class="d-flex justify-content-center align-items-center m-3">
    <h2 class="fs-1 text-white">Sushi</h2>
</div>

<div class="row row-cols-1 row-cols-md-2 g-4">

    <div class="col">
        <div class="card h-100 d-flex flex-column mb-4 shadow-sm border-0 p-3 menu-card"
        style="background-color: rgba(255,255,255,0.5);">
            <div class="row g-3 align-items-center flex-fill">
                <div class="col-8">
                    <h5 class="mb-1">Double Avocado</h5>
                    <p class="text-muted mb-2">Fresh rice 3 oz, avocado 2 oz, soy sauce, ginger and wasabi</p>
                    <div class="d-flex align-items-center">
                        <p class="fw-semibold mb-0 me-3">$8.95</p>
                        <button class="btn btn-light border rounded-circle p-2 add-to-cart"
                                data-id="1"
                                data-name="Double_avocado"
                                data-price="8.95"
                                data-image="/images/double-avocado.png">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <img src="{{ asset('images/double-avocado.png') }}" 
                         class="img-fluid rounded menu-img"
                         style="max-width:120px; border-radius:12px; object-fit:cover;">
                </div>
            </div>
        </div>
    </div>
     
    <div class="col">
        <div class="card h-100 d-flex flex-column mb-4 shadow-sm border-0 p-3 menu-card"
        style="background-color: rgba(255,255,255,0.5);">
            <div class="row g-3 align-items-center flex-fill">
                <div class="col-8">
                    <h5 class="mb-1">Salmon Avocado</h5>
                    <p class="text-muted mb-2">Fresh rice 3 oz,fresh salmon 2 oz, avocado 2 oz, soy sauce, ginger and wasabi</p>
                    <div class="d-flex align-items-center">
                        <p class="fw-semibold mb-0 me-3">$10.95</p>
                        <button class="btn btn-light border rounded-circle p-2 add-to-cart"
                                data-id="2"
                                data-name="Salmon_avocado"
                                data-price="10.95"
                                data-image="/images/salmon-avocado.png">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <img src="{{ asset('images/salmon-avocado.png') }}" 
                         class="img-fluid rounded menu-img"
                         style="max-width:120px; border-radius:12px; object-fit:cover;">
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card h-100 d-flex flex-column mb-4 shadow-sm border-0 p-3 menu-card"
        style="background-color: rgba(255,255,255,0.5);">
            <div class="row g-3 align-items-center flex-fill">
                <div class="col-8">
                    <h5 class="mb-1">Shrimp Avocado</h5>
                    <p class="text-muted mb-2">Fresh rice 3 oz, fresh shrimp 1.5 oz, avocado 1 oz, soy sauce, ginger and wasabi</p>
                    <div class="d-flex align-items-center">
                        <p class="fw-semibold mb-0 me-3">$11.95</p>
                        <button class="btn btn-light border rounded-circle p-2 add-to-cart"
                                data-id="3"
                                data-name="Shrimp_avocado"
                                data-price="11.95"
                                data-image="/images/shrimp-avocado.png">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="col-4 text-end l2">
                    <img src="{{ asset('images/shrimp-avocado.png') }}" 
                         class="img-fluid rounded menu-img"
                         style="max-width:120px; border-radius:12px; object-fit:cover;">
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card h-100 d-flex flex-column mb-4 shadow-sm border-0 p-3 menu-card"
        style="background-color: rgba(255,255,255,0.5);">
            <div class="row g-3 align-items-center flex-fill">
                <div class="col-8">
                    <h5 class="mb-1">Philadelphia</h5>
                    <p class="text-muted mb-2">Fresh rice 4 oz,fresh salmon 2 oz, cucumber 2 oz, Philadelphia heavy cream 0.5 oz, soy sauce, ginger and wasabi</p>
                    <div class="d-flex align-items-center">
                        <p class="fw-semibold mb-0 me-3">$14.95</p>
                        <button class="btn btn-light border rounded-circle p-2 add-to-cart"
                                data-id="4"
                                data-name="Philadelphia"
                                data-price="14.95"
                                data-image="/images/philadelphia.png">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <img src="{{ asset('images/philadelphia.png') }}" 
                         class="img-fluid rounded menu-img"
                         style="max-width:120px; border-radius:12px; object-fit:cover;">
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card h-100 d-flex flex-column mb-4 shadow-sm border-0 p-3 menu-card"
        style="background-color: rgba(255,255,255,0.5);">
            <div class="row g-3 align-items-center flex-fill">
                <div class="col-8">
                    <h5 class="mb-1">Raijin</h5>
                    <p class="text-muted mb-2">Fresh rice 3 oz, cucumber 2 oz, California sauce 0.5 oz, flour, wasaby, mayo, eel sauce, soy sauce, ginger and wasabi</p>
                    <div class="d-flex align-items-center">
                        <p class="fw-semibold mb-0 me-3">$18.95</p>
                        <button class="btn btn-light border rounded-circle p-2 add-to-cart"
                                data-id="5"
                                data-name="Raijin"
                                data-price="18.95"
                                data-image="/images/raijin.png">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <img src="{{ asset('images/raijin.png') }}" 
                         class="img-fluid rounded menu-img"
                         style="max-width:120px; border-radius:12px; object-fit:cover;">
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card h-100 d-flex flex-column mb-4 shadow-sm border-0 p-3 menu-card"
        style="background-color: rgba(255,255,255,0.5);">
            <div class="row g-3 align-items-center flex-fill">
                <div class="col-8">
                    <h5 class="mb-1">Tuna Avocado</h5>
                    <p class="text-muted mb-2">Fresh rice 3 oz, fresh tuna 2 oz, soy sauce, ginger and wasabi</p>
                    <div class="d-flex align-items-center">
                        <p class="fw-semibold mb-0 me-3">$17.95</p>
                        <button class="btn btn-light border rounded-circle p-2 add-to-cart"
                                data-id="6"
                                data-name="Tuna_avocado"
                                data-price="17.95"
                                data-image="/images/tuna-avocado.png">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="col-4 text-end l2">
                    <img src="{{ asset('images/tuna-avocado.png') }}" 
                         class="img-fluid rounded menu-img"
                         style="max-width:120px; border-radius:12px; object-fit:cover;">
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card h-100 d-flex flex-column mb-4 shadow-sm border-0 p-3 menu-card"
        style="background-color: rgba(255,255,255,0.5);">
            <div class="row g-3 align-items-center flex-fill">
                <div class="col-8">
                    <h5 class="mb-1">Kinkaku</h5>
                    <p class="text-muted mb-2">Fresh rice 6 oz,fresh salmon 2 oz, fresh shrimp 2 oz, Philadelphia heavy cream 1 oz, avocado 2 oz, soy sauce, ginger and wasabi</p>
                    <div class="d-flex align-items-center">
                        <p class="fw-semibold mb-0 me-3">$21.95</p>
                        <button class="btn btn-light border rounded-circle p-2 add-to-cart"
                                data-id="7"
                                data-name="Kinkaku"
                                data-price="21.95"
                                data-image="/images/kinkaku.png">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="col-4 text-end l1">
                    <img src="{{ asset('images/kinkaku.png') }}" 
                         class="img-fluid rounded menu-img"
                         style="max-width:120px; border-radius:12px; object-fit:cover;">
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card h-100 d-flex flex-column mb-4 shadow-sm border-0 p-3 menu-card"
        style="background-color: rgba(255,255,255,0.5);">
            <div class="row g-3 align-items-center flex-fill">
                <div class="col-8">
                    <h5 class="mb-1">Super Sushi</h5>
                    <p class="text-muted mb-2">Fresh rice 4 oz, tempura shrimp 3 oz, fried onion 1 oz, cucumber 0.5 oz, chivas 0.2 oz, basil mayo , curry mayo , soy sauce, ginger and wasabi</p>
                    <div class="d-flex align-items-center">
                        <p class="fw-semibold mb-0 me-3">$23.95</p>
                        <button class="btn btn-light border rounded-circle p-2 add-to-cart"
                                data-id="8"
                                data-name="Super_sushi"
                                data-price="23.95"
                                data-image="/images/super-sushi.png">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <img src="{{ asset('images/super-sushi.png') }}" 
                         class="img-fluid rounded menu-img"
                         style="max-width:120px; border-radius:12px; object-fit:cover;">
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card h-100 d-flex flex-column mb-4 shadow-sm border-0 p-3 menu-card "
        style="background-color: rgba(255,255,255,0.5);">
            <div class="row g-3 align-items-center flex-fill">
                <div class="col-8">
                    <h5 class="mb-1">Spicy Samurai Roll</h5>
                    <p class="text-muted mb-2">Fresh rice 3 oz,fresh tuna 2 oz, cucumber 1 oz, spicy yam yam sauce, sesame,  soy sauce, ginger and wasabi</p>
                    <div class="d-flex align-items-center">
                        <p class="fw-semibold mb-0 me-3">$25.95</p>
                        <button class="btn btn-light border rounded-circle p-2 add-to-cart"
                                data-id="9"
                                data-name="Spicy_samurai_roll"
                                data-price="25.95"
                                data-image="/images/spicy-samurai-roll.png">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="col-4 text-end l1">
                    <img src="{{ asset('images/spicy-samurai-roll.png') }}" 
                         class="img-fluid rounded menu-img"
                         style="max-width:120px; border-radius:12px; object-fit:cover;">
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card h-100 d-flex flex-column mb-4 shadow-sm border-0 p-3 menu-card"
        style="background-color: rgba(255,255,255,0.5);">
            <div class="row g-3 align-items-center flex-fill">
                <div class="col-8">
                    <h5 class="mb-1">Olympic</h5>
                    <p class="text-muted mb-2">Fresh rice 6 oz,fresh salmon 2 oz, cucumber 1 oz, tuna 2 oz, Philadelphia heavy cream 1 oz, avocado 1 oz, soy sauce, ginger and wasabi</p>
                    <div class="d-flex align-items-center">
                        <p class="fw-semibold mb-0 me-3">$30.95</p>
                        <button class="btn btn-light border rounded-circle p-2 add-to-cart"
                                data-id="10"
                                data-name="Olympic"
                                data-price="30.95"
                                data-image="/images/olympic.png">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <img src="{{ asset('images/olympic.png') }}" 
                         class="img-fluid rounded menu-img"
                         style="max-width:120px; border-radius:12px; object-fit:cover;">
                </div>
            </div>
        </div>
    </div>

 </div>

 <div class="d-flex justify-content-center align-items-center m-2">
    <h2 class="fs-1 text-white">Nigiri</h2>
</div>

 <div class="row row-cols-1 row-cols-md-2 g-4">

    <div class="col">
        <div class="card h-100 d-flex flex-column mb-4 shadow-sm border-0 p-3 menu-card"
        style="background-color: rgba(255,255,255,0.5);">
            <div class="row g-3 align-items-center flex-fill">
                <div class="col-8">
                    <h5 class="mb-1">Tuna Nigiri</h5>
                    <p class="text-muted mb-2">Nigiri (tuna) 2 oz, fresh rice 2 oz, soy sauce, ginger and wasabi</p>
                    <div class="d-flex align-items-center">
                        <p class="fw-semibold mb-0 me-3">$18.95</p>
                        <button class="btn btn-light border rounded-circle p-2 add-to-cart"
                                data-id="11"
                                data-name="Tuna_nigiri"
                                data-price="18.95"
                                data-image="/images/tuna-nigiri.png">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <img src="{{ asset('images/tuna-nigiri.png') }}" 
                         class="img-fluid rounded menu-img"
                         style="max-width:120px; border-radius:12px; object-fit:cover;">
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card h-100 d-flex flex-column mb-4 shadow-sm border-0 p-3 menu-card"
        style="background-color: rgba(255,255,255,0.5);">
            <div class="row g-3 align-items-center flex-fill">
                <div class="col-8">
                    <h5 class="mb-1">Salmon Nigiri</h5>
                    <p class="text-muted mb-2">Nigiri (salmon) 2 oz, fresh rice 2 oz, soy sauce, ginger and wasabi</p>
                    <div class="d-flex align-items-center">
                        <p class="fw-semibold mb-0 me-3">$21.95</p>
                        <button class="btn btn-light border rounded-circle p-2 add-to-cart"
                                data-id="12"
                                data-name="Salmon_nigiri"
                                data-price="21.95"
                                data-image="/images/salmon-nigiri.png">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <img src="{{ asset('images/salmon-nigiri.png') }}" 
                         class="img-fluid rounded menu-img"
                         style="max-width:120px; border-radius:12px; object-fit:cover;">
                </div>
            </div>
        </div>
    </div>

</div>

<div class="d-flex justify-content-center align-items-center m-2">
    <h2 class="fs-1 text-white">Sushi Set</h2>
</div>

 <div class="row row-cols-1 row-cols-md-2 g-4">

    <div class="col">
        <div class="card h-100 d-flex flex-column mb-4 shadow-sm border-0 p-3 menu-card"
        style="background-color: rgba(255,255,255,0.5);">
            <div class="row g-3 align-items-center flex-fill">
                <div class="col-8">
                    <h5 class="mb-1">Tokyo Tuna Set</h5>
                    <p class="text-muted mb-2">Fresh rice 3 oz, fresh tuna 2 oz, soy sauce, ginger and wasabi 6 pc</p>
                    <p class="text-muted mb-2">Tuna nigiri 2 pc</p>
                    <div class="d-flex align-items-center">
                        <p class="fw-semibold mb-0 me-3">$68.95</p>
                        <button class="btn btn-light border rounded-circle p-2 add-to-cart"
                                data-id="13"
                                data-name="Tokyo_tuna_set"
                                data-price="68.95"
                                data-image="/images/tokyo-tuna-set.png">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="col-4 text-end l1">
                    <img src="{{ asset('images/tokyo-tuna-set.png') }}" 
                         class="img-fluid rounded menu-img"
                         style="max-width:120px; border-radius:12px; object-fit:cover;">
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card h-100 d-flex flex-column mb-4 shadow-sm border-0 p-3 menu-card"
        style="background-color: rgba(255,255,255,0.5);">
            <div class="row g-3 align-items-center flex-fill">
                <div class="col-8">
                    <h5 class="mb-1">Osaka Salmon Set</h5>
                    <p class="text-muted mb-2">Fresh rice 3 oz,fresh salmon 2 oz, avocado 2 oz, soy sauce, ginger and wasabi 6 pc</p>
                    <p class="text-muted mb-2">Salmon Nigiri 2 pc</p>
                    <div class="d-flex align-items-center">
                        <p class="fw-semibold mb-0 me-3">$78.95</p>
                        <button class="btn btn-light border rounded-circle p-2 add-to-cart"
                                data-id="14"
                                data-name="Osaka_salmon_set"
                                data-price="78.95"
                                data-image="/images/osaka-salmon-set.png">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <img src="{{ asset('images/osaka-salmon-set.png') }}" 
                         class="img-fluid rounded menu-img"
                         style="max-width:120px; border-radius:12px; object-fit:cover;">
                </div>
            </div>
        </div>
    </div>

</div>

<div class="d-flex justify-content-center align-items-center m-2">
    <h2 class="fs-1 text-white">Beverages</h2>
</div>

 <div class="row row-cols-1 row-cols-md-2 g-4">

    <div class="col">
        <div class="card h-100 d-flex flex-column mb-4 shadow-sm border-0 p-3 menu-card"
        style="background-color: rgba(255,255,255,0.5);">
            <div class="row g-3 align-items-center flex-fill">
                <div class="col-8">
                    <h5 class="mb-1">Mineral Water</h5>
                    <p class="text-muted mb-2">Crisp, refreshing, naturally sparkling hydration.</p>
                    <div class="d-flex align-items-center">
                        <p class="fw-semibold mb-0 me-3">$3.95</p>
                        <button class="btn btn-light border rounded-circle p-2 add-to-cart"
                                data-id="15"
                                data-name="water"
                                data-price="3.95"
                                data-image="/images/water.png">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <img src="{{ asset('images/water.png') }}" 
                         class="img-fluid rounded menu-img"
                         style="max-width:120px; border-radius:12px; object-fit:cover;">
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card h-100 d-flex flex-column mb-4 shadow-sm border-0 p-3 menu-card"
        style="background-color: rgba(255,255,255,0.5);">
            <div class="row g-3 align-items-center flex-fill">
                <div class="col-8">
                    <h5 class="mb-1">Coffee</h5>
                    <p class="text-muted mb-2">Rich, aromatic, freshly brewed morning essential.</p>
                    <div class="d-flex align-items-center">
                        <p class="fw-semibold mb-0 me-3">$5.95</p>
                        <button class="btn btn-light border rounded-circle p-2 add-to-cart"
                                data-id="16"
                                data-name="Coffee"
                                data-price="5.95"
                                data-image="/images/coffee.png">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <img src="{{ asset('images/coffee.png') }}" 
                         class="img-fluid rounded menu-img"
                         style="max-width:120px; border-radius:12px; object-fit:cover;">
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card h-100 d-flex flex-column mb-4 shadow-sm border-0 p-3 menu-card"
        style="background-color: rgba(255,255,255,0.5);">
            <div class="row g-3 align-items-center flex-fill">
                <div class="col-8">
                    <h5 class="mb-1">Pepsi</h5>
                    <p class="text-muted mb-2">Classic, fizzy, sweet cola with bold flavor.</p>
                    <div class="d-flex align-items-center">
                        <p class="fw-semibold mb-0 me-3">$4.95</p>
                        <button class="btn btn-light border rounded-circle p-2 add-to-cart"
                                data-id="17"
                                data-name="Pepsi"
                                data-price="4.95"
                                data-image="/images/pepsi.jpg">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="col-4 text-end l1">
                    <img src="{{ asset('images/pepsi.jpg') }}" 
                         class="img-fluid rounded menu-img"
                         style="max-width:120px; border-radius:12px; object-fit:cover;">
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card h-100 d-flex flex-column mb-4 shadow-sm border-0 p-3 menu-card"
        style="background-color: rgba(255,255,255,0.5);">
            <div class="row g-3 align-items-center flex-fill">
                <div class="col-8">
                    <h5 class="mb-1">Homemade Lemonade</h5>
                    <p class="text-muted mb-2">Tart, sweet, freshly squeezed citrus delight.</p>
                    <div class="d-flex align-items-center">
                        <p class="fw-semibold mb-0 me-3">$6.95</p>
                        <button class="btn btn-light border rounded-circle p-2 add-to-cart"
                                data-id="18"
                                data-name="Lemonade"
                                data-price="6.95"
                                data-image="/images/lemonade.png">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <img src="{{ asset('images/lemonade.png') }}" 
                         class="img-fluid rounded menu-img"
                         style="max-width:120px; border-radius:12px; object-fit:cover;">
                </div>
            </div>
        </div>
    </div>


</div> 

</div>

<footer class="container mt-5 pt-4">
  <h4 class="fw-normal mb-3">Sushi Sapporo Authentic Sushi®</h4>
  <hr class="mb-4">

  <div class="d-flex flex-wrap gap-3 mb-4">
    <a href="{{url('/')}}" class="text-decoration-underline text-dark">Home</a>
    <a href="{{url('/terms-and-conditions')}}" class="text-decoration-underline text-dark">Terms and Conditions</a>
    <a href="{{url('/privacy-policy')}}" class="text-decoration-underline text-dark">Privacy Policy</a>
    <a href="{{url('/cookies-policy')}}" class="text-decoration-underline text-dark">Cookies Policy</a>
  </div>
</footer>
 
</div>
</body>
<script src="{{ asset('js/open.js') }}"></script>
<script src="{{ asset('js/menu.js') }}"></script>
</html>