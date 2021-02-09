<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fazenda Santa Luiza</title>
  <!-- Fonte -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
  <!-- Estilos -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('css/styles.css')}}"/>
 
  <!-- Scripts (jQuery não pode ser o slim que vem do Boostrap) -->
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!-- Font Awesome -->
  
  <script src="https://kit.fontawesome.com/d16df3d597.js" crossorigin="anonymous"></script>
  <!-- Progress Bar -->
 
  <script src="{{asset('js/progressbar.min.js')}}"></script>
  <!-- Parallax -->
  <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
</head>
<body>
  <header>
    <div class="container" id="nav-container">
      <!-- add essa class -->
      <nav class="navbar navbar-expand-lg fixed-top navbar-dark" >
        <a class="navbar-brand" href="{{ route('site.home.index') }}" style="font-size: 20px;">
          <img id="logo" class="rounded-circle" src="img/logo/logo_santa_luiza.jpg" alt="Fazenda Santa Luiza" style="width:50px;height:50px;"> Fazenda Santa Luiza
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-links" aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbar-links">
          <div class="navbar-nav">
            <a class="nav-item nav-link" id="home-menu" href="{{ route('site.home.index') }}">Home</span></a>
            <a class="nav-item nav-link" id="about-menu" href="{{ route('site.about') }}">Culturas</a>
          <a class="nav-item nav-link" id="services-menu" href="{{ route('site.products.index')}}">Fertilizantes</a>
            <a class="nav-item nav-link" id="services-menu" href="{{ route('site.category.index')}}">Pragas / Doenças</a>
            <a class="nav-item nav-link" id="services-menu" href="{{ route('site.empresa.index')}}">Herbicidas</a>
            <a class="nav-item nav-link" id="portfolio-menu" href="{{route('site.project.index')}}">Ceasa</a>
            <a class="nav-item nav-link" id="contact-menu" href="{{route('admin.home.index')}}">Entrar</a>
          </div>
        </div>
      </nav>
    </div>

    @yield('content')  
<!-- Hamburger menu list -->
  <!-- Rodapé -->
  <footer>
    <div id="contact-area">
      <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h3 class="contact-title">Entre em contato conosco</h3>
            </div>
            <div class="col-md-4 contact-box">
              <i class="fas fa-phone"></i>
              <p><span class="contact-tile">Ligue para:</span> (11)95056-5771</p>
              <p><span class="contact-tile">Horários:</span> 8:00 - 17:00</p>
            </div>
            <div class="col-md-4 contact-box">
              <i class="fas fa-envelope"></i>
              <p><span class="contact-tile">Envie um email:</span> jp.loures.vale@gmail.com</p>
            </div>
            <div class="col-md-4 contact-box">
              <i class="fas fa-map-marker-alt"></i>
              <p><span class="contact-tile">Fazenda Santa Luiza/span> Antônio Carlos - MG</p>
            </div>
      
          </div>
      </div>
    </div>
    <div id="copy-area">
      <div class="container">
        <div class="row">
            <div class="col-md-12">
              <p>Desenvolvido por <a href="#" target="_blank">João Procópio C. Loures Vale</a> &copy; 2021</p>
            </div>
        </div>
      </div>
    </div>
  </header>
  </footer>


</body>


<!-- Scripts -->
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script type="text/javascript" src="{{asset('lightbox/js/lightbox.js')}}"></script>
<script type="text/javascript" src="{{asset('js/scripts.js')}}"></script>

<script>
    $("#toggle").click(function () {
        $(this).toggleClass("on")
        $("#resize").toggleClass("active")
    })
 
</script>
</html>

