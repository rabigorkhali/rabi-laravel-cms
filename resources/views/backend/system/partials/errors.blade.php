@if ($errors->first('error'))
    <div class="alert alert-danger alert-dismissible fade show autoDismissAlert" role="alert">
        {{ $errors->first('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->first('success'))
    <div class="alert alert-success alert-dismissible fade show autoDismissAlert" role="alert">
        {{ $errors->first('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
