<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hope UI | Responsive Bootstrap 5 Admin Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="{{ asset('assets/css/core/libs.min.css') }}" />

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/hope-ui.min.css?v=1.0.3') }}" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css?v=1.0.3') }}" />
  </head>
  <body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <!-- loader END -->

    <div class="wrapper">
      <section class="login-content">
        <div class="row m-0 align-items-center bg-white vh-100">
          <div class="col-md-6">
            <div class="row justify-content-center">
              <div class="col-md-10">
                <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                  <div class="card-body">
                    <a href="../dashboard/index.html" class="navbar-brand d-flex align-items-center mb-3">
                      <!--Logo start-->
<!--                       <svg width="30" class="" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                        <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                        <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                        <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                      </svg> -->
                      <svg xmlns="http://www.w3.org/2000/svg" width="30"height="30"fill="currentColor" class="bi bi-heart-pulse" viewBox="0 0 16 16">
                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053.918 3.995.78 5.323 1.508 7H.43c-2.128-5.697 4.165-8.83 7.394-5.857q.09.083.176.171a3 3 0 0 1 .176-.17c3.23-2.974 9.522.159 7.394 5.856h-1.078c.728-1.677.59-3.005.108-3.947C13.486.878 10.4.28 8.717 2.01zM2.212 10h1.315C4.593 11.183 6.05 12.458 8 13.795c1.949-1.337 3.407-2.612 4.473-3.795h1.315c-1.265 1.566-3.14 3.25-5.788 5-2.648-1.75-4.523-3.434-5.788-5"/>
                        <path d="M10.464 3.314a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.5a.5.5 0 0 0 0 1H4a.5.5 0 0 0 .416-.223l1.473-2.209 1.647 4.118a.5.5 0 0 0 .945-.049l1.598-5.593 1.457 3.642A.5.5 0 0 0 12 9h3.5a.5.5 0 0 0 0-1h-3.162z"/>
                      </svg>
                                            
                      <!--logo End-->
                      <h4 class="logo-title ms-3">Citas medicas</h4>
                    </a>
                    <h2 class="mb-2 text-center">Iniciar sesion</h2>
                    <p class="text-center">Inicia sesion para mantenerte conectado.</p>
                    <form action="{{route('login')}}" method="post">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label for="email" class="form-label">Correo electronico</label>
                            <input type="email" class="form-control" id="email" aria-describedby="email" placeholder=" ">
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" aria-describedby="password" placeholder=" ">
                          </div>
                        </div>
                        <div class="col-lg-12 d-flex justify-content-between">
                          <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="customCheck1">
                            <label class="form-check-label" for="customCheck1">Recordarme</label>
                          </div>
                          <a href="recoverpw.html">Olvidaste tu contraseña?</a>
                        </div>
                      </div>
                      <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Inicar sesion</button>
                      </div>
                      <p class="text-center my-3">O iniciar sesion con otras cuentas</p>
                      <div class="d-flex justify-content-center">
                        <ul class="list-group list-group-horizontal list-group-flush">
                          <li class="list-group-item border-0 pb-0">
                            <a href="#"><img src="{{ asset('assets/images/brands/fb.svg') }}" alt="fb"></a>
                          </li>
                          <li class="list-group-item border-0 pb-0">
                            <a href="#"><img src="{{ asset('assets/images/brands/gm.svg') }}" alt="gm"></a>
                          </li>
                          <li class="list-group-item border-0 pb-0">
                            <a href="#"><img src="{{ asset('assets/images/brands/im.svg') }}" alt="im"></a>
                          </li>
                          <li class="list-group-item border-0 pb-0">
                            <a href="#"><img src="{{ asset('assets/images/brands/li.svg') }}" alt="li"></a>
                          </li>
                        </ul>
                      </div>
                      <p class="mt-3 text-center">
                        No tienes una cuenta? <a href="sign-up" class="text-underline">Registrate aqui.</a>
                      </p>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="sign-bg">
              <svg width="280" height="230" viewBox="0 0 431 398" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g opacity="0.05">
                  <rect x="-157.085" y="193.773" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 -157.085 193.773)" fill="#3B8AFF"/>
                  <rect x="7.46875" y="358.327" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 7.46875 358.327)" fill="#3B8AFF"/>
                  <rect x="61.9355" y="138.545" width="310.286" height="77.5714" rx="38.7857" transform="rotate(45 61.9355 138.545)" fill="#3B8AFF"/>
                  <rect x="62.3154" y="-190.173" width="543" height="77.5714" rx="38.7857" transform="rotate(45 62.3154 -190.173)" fill="#3B8AFF"/>
                </g>
              </svg>
            </div>
          </div>
          <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
            <img src="{{ asset('assets/images/auth/01.png') }}" class="img-fluid gradient-main animated-scaleX" alt="images">
          </div>
        </div>
      </section>
    </div>

    <!-- Required Library Bundle Script -->
    <script src="{{ asset('assets/js/core/libs.min.js') }}"></script>

    <!-- External Library Bundle Script -->
    <script src="{{ asset('assets/js/core/external.min.js') }}"></script>

    <!-- App Script -->
    <script src="{{ asset('assets/js/hope-ui.js') }}" defer></script>
  </body>
</html>
