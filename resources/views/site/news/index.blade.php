@extends('layouts.site')

@section('content')
  <!-- Newsletter -->
  <div id="news-area">
    <div class="container">
      <div class="col-md-12">
        <h3 class="main-title">Fique por dentro das novidades</h3>
      </div>
      <p>Assine nossa lista de e-mails, e receba nossos conteúdos sobre desenvolvimento de software</p>
      <form action="">
        <input type="text" class="form-control" id="email-input" name="email" placeholder="Seu melhor e-mail">
        <input type="submit" id="news-btn" value="Inscrever">
      </form>
    </div>
  </div>
  <!-- Call to Action -->
  <div id="call-area">
    <div class="container">
        <div class="row">
          <p>Deseja fazer um orçamento sem compromisso?</p>
          <button class="main-btn" id="call-btn">Orçar</button>
        </div>
      </div>
  </div>
</div>
</main>
@endsection
