

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        {{-- <button type="button"></button> --}}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        {{-- <button type="button" class="bg-danger">X</button> --}}
    </div>
@endif