@if (session()->has('success_status'))
    <div class="alert alert-success  alert-dismissile fade show col-6 m-auto mt-3 mb-4 text-center" role="alert">
        <strong class="text-dark">{{ session()->get('success_status') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif (session()->has('bad_status'))
    <div class="alert alert-danger  alert-dismissile fade show col-6 m-auto mt-3 mb-4 text-center" role="alert">
        <strong class="text-dark">{{ session()->get('bad_status') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif ($errors->all())
    <div class="alert alert-danger  alert-dismissile fade show col-6 m-auto mt-3 mb-4 text-center" role="alert">
        @foreach ($errors->all() as $data)
            <strong class="text-dark">{{ $data }}</strong>
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
