@extends('layouts.site')

@section('content')
    <!-- Sobre a empresa -->
    <main>
    <div id="about-area" >
        <div  Class="container">
            <div class="row ">
              <div class="col-12"> 
                <h3 class="main-title">Sobre a hDC Agency</h3>
              </div>
              <div class="col-md-6">
                <img class="img-fluid" src="img/agencia.jpg" alt="Agência hDC">
              </div>
              <div class="col-md-6">
                <h3 class="about-title">Uma agência que pensa no futuro</h3>
                <p>Nossos projetos são adaptados ao cliente e seu propósito.</p>
                <p>Após a especificação do projetos os arquitetos de software definirão as melhores tecnologias para seu projeto.</p>
                <p>E nossos designers trabalharão na sua interface/layout para impulsionar o negócio.</p>
                <p>Veja outros diferenciais:</p>
                <ul id="about-list">
                  <li><i class="fas fa-check"></i> Utilização de Machine Learning / AI</li>
                  <li><i class="fas fa-check"></i> Layout responsivo para todos os dispositivos</li>
                  <li><i class="fas fa-check"></i> Integração com diversos sistemas do mercado</li>
                  <li><i class="fas fa-check"></i> Sistema de pagamento próprio</li>
                  <li><i class="fas fa-check"></i> Desenvolvimento com metodologia ágil</li>
                </ul>
              </div>
            </div>
          </div>
      </div>
    </main>
@endsection
