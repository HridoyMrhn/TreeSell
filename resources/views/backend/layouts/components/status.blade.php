@if (session()->has('status'))
    <div class="alert alert-success  alert-dismissile fade show col-6 m-auto mt-3 mb-4 text-center" role="alert">
        <strong class="text-dark">{{ session()->get('status') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
