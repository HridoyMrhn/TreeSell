@if (session()->has('success_status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong class="text-dark">{{ session()->get('success_status') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@elseif (session()->has('bad_status'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong class="text-dark">{{ session()->get('bad_status') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
