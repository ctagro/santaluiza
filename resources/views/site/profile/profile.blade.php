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

    <div class="form-group">
        @if (auth()->user()->image != null)
             <img src="{{ asset('storage/users/'.auth()->user()->image)}}" class="img-thumbnail elevation-2"  style="max-width: 50px;"> 
        @endif
        <label for="image">Sua foto</label>
        <input type="file" class="form-control"  name='image' >
    </div>
    
    <button type="submit" class="btn btn-primary">Atualizar Perfil</button>
    </form>
@stop
