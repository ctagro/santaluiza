@extends('adminlte::page')

@section('title', 'Histórico de Transações')
@section('content_header')
    <h1 class="m-0 text-dark">Atualizar Perfil</h1>
@stop

@section('content')

    @if(session('sucess'))
        <div class="alert alert-success">
            {{ session('sucess') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <form action= "{{ route('profile.update') }}" method = "POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" value="{{ auth()->user()->name }}" class="form-control" id="name" name='name' placeholder="Nome">
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" value="{{ auth()->user()->email }}" class="form-control" id="email" name='email' placeholder="E-mail">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name='password' placeholder="Senha">
    </div>

<<<<<<< HEAD
<<<<<<< HEAD
    <div class="form-group">
        @if (auth()->user()->image != null)
<<<<<<< HEAD
         <img src="{{ url('storage/users/imagem_user_1.jpeg')}}" alt="{{ auth()->user()->name }}" style="max-width: 50px;"> 
=======
  <!--       <img src="{{ url('storage/users/'.auth()->user()->image)}}" class="img-circle elevation-2" alt="{{ auth()->user()->name }}" style="max-width: 50px;"> -->
>>>>>>> 0e5bf7dceb42b9f2daa1b38f63c050b896668732
        @endif
=======
<!--    <div class="form-group">
        if (auth()->user()->image != null) @
       <img src="{url('storage/users/'.auth()->user()->image)}}" class="img-circle elevation-2" alt="{{ auth()->user()->name }}" style="max-width: 50px;"> 
        endif @
>>>>>>> e05d4b3d9abecee97aa5bd4c75c4e88174fbd13f
=======
 <div class="form-group">
        @if (auth()->user()->image != null)
       <img src="{{url('storage/users/'.auth()->user()->image)}}" class="img-circle elevation-2" alt="{{ auth()->user()->name }}" style="max-width: 50px;"> 
              @endif
>>>>>>> c0773947dbcadffbeb7573f341044f4cd1b6d5e8
        <label for="image">Imagem</label>
        <input type="file" class="form-control"  name='image' >
    </div>

    <button type="submit" class="btn btn-primary">Atualizar Perfil</button>
    </form>
@stop
