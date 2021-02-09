@extends('layouts.site')

@section('content')


         <!-- Portfólio -->
         <div id="project-area">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h3 class="main-title">Conheça nossos projetos</h3>
              </div>
              <div class="col-md-12" id="filter-btn-box">
                <button class="main-btn filter-btn active" id="all-btn">Todos</button>
                <button class="main-btn filter-btn" id="dev-btn">Desenvolvimento</button>
                <button class="main-btn filter-btn" id="dsg-btn">Design</button>
                <button class="main-btn filter-btn" id="seo-btn">SEO</button>
              </div>
              <div class="col-md-4 project-box dev">
                <img src="img/proj1.jpg" class="img-fluid" alt="Projeto 1">
              </div>
              <div class="col-md-4 project-box dsg">
                <img src="img/proj2.jpg" class="img-fluid" alt="Projeto 2">
              </div>
              <div class="col-md-4 project-box seo">
                <img src="img/proj3.jpg" class="img-fluid" alt="Projeto 3">
              </div>
              <div class="col-md-4 project-box dev">
                <img src="img/proj4.jpg" class="img-fluid" alt="Projeto 4">
              </div>
              <div class="col-md-4 project-box dsg">
                <img src="img/proj5.jpg" class="img-fluid" alt="Projeto 5">
              </div>
              <div class="col-md-4 project-box seo">
                <img src="img/proj6.jpg" class="img-fluid" alt="Projeto 6">
              </div>
            </div>
          </div>
        </div>
@endsection
