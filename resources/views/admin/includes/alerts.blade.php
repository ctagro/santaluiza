@if($errors->any())
    <div class="alert alert-warning">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
         <div>{{ session('success') }}</div>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
         <div>{{ session('error') }}</div>
    </div>
@endif