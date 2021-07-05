@foreach (categories() as $data)
    <a class="dropdown-item" href="{{ route('category', $data->slug) }}">{{ $data->category_name }}</a>
@endforeach
