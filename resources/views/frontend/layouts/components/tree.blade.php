@forelse ($trees as $data)
    <div class="single-tree">
        <div class="row">
            <div class="col-sm-3">
                @if (isset($data->multipleImage->first()->tree_image))
                    <img src="{{ asset('uploads/tree/'.$data->multipleImage->first()->tree_image) }}" class="img img-thumbnail" style="width:220px; height:220px; line-height:220">
                @else
                <img src="{{ asset('uploads/tree/default.jpg') }}" class="img img-thumbnail" style="width:220px; height:220px; line-height:220">
                @endif
            </div>
            <div class="col-md-9">
                <h2>{{ $data->tree_name }}</h2>
                <p class="uploaded-by">
                    <strong>Uploaded By : </strong>
                    @isset($data->user->user_name)
                    <a href="{{ route('profile', $data->user->user_name) }}">{{ $data->user->name }}</a>
                    @endisset
                </p>
                <p class="uploaded-at">
                    <strong>Uploaded at : </strong> {{ $data->created_at->diffForHumans() }}
                </p>
                <div class="small-description mb-3">{{ $data->tree_info }}</div>
                @if (Route::is('user.dashboard.myTree'))
                    <p class="float-right">
                        <div class="btn btn-group-sm ">
                            <a href="#editModal{{ $data->slug }}" data-toggle="modal"  class="btn btn-dark btn-view">
                                <i class="fa fa-edit"></i> Edit</a>
                            <a href="#deleteModal{{ $data->slug }}" data-toggle="modal" class="btn btn-danger btn-view">
                                <i class="fa fa-trash"></i> Delete</a>
                            <a href="{{ route('user.tree.show', $data->slug) }}" class="btn btn-info btn-view"> View Details
                                <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </p>

                    <!-- Tree Edit Modal -->
                    <div class="modal fade" id="editModal{{ $data->slug }}" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Your Tree</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="{{ route('user.tree.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tree_name">Tree Name</label>
                                                    <input type="text" class="form-control" name="tree_name" id="tree_name" value="{{ $data->tree_name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="category_id">Tree Category</label>
                                                    <select name="category_id" id="category_id" class="form-control">
                                                        <option value="">Please select a category</option>
                                                        @foreach (categories() as $category)
                                                            <option value="{{ $category->id}}" {{ $data->category_id == $category->id ? 'selected':'' }}>{{ $category->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tree_scientific_name">Sceintific Name</label>
                                                    <input type="text" class="form-control" id="tree_scientific_name" name="tree_scientific_name" value="{{ $data->tree_scientific_name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tree_location">Tree Location Available</label>
                                                    <input type="text" class="form-control" name="tree_location" id="tree_location" value="{{ $data->tree_location }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tree_price">Tree Pice</label>
                                                    <input type="number" class="form-control" id="tree_price" name="tree_price" value="{{ $data->tree_price }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tree_quantity">Tree Quantity</label>
                                                    <input type="number" class="form-control" id="tree_quantity" name="tree_quantity" value="{{ $data->tree_quantity }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tree_width">Tree Width</label>
                                                    <input type="number" class="form-control" id="tree_width" name="tree_width" value="{{ $data->tree_width }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tree_height">Tree Height</label>
                                                    <input type="number" class="form-control" id="tree_height" name="tree_height" value="{{ $data->tree_height }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tree_image">Tree Images</label>
                                                    <input type="file" name="tree_image[]" class="dropify form-control pb-5" data-allowed-file-extensions="jpg jpeg gif png" data-max-file-size-preview="5M" multiple >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tree_info">Tree Short info</label>
                                                    <textarea name="tree_info" id="editor" rows="5" class="form-control">{{ $data->tree_info }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label for="tree_description">Tree Description</label>
                                                    <textarea name="tree_description" id="tree_description" rows="5" class="form-control">{{ $data->tree_description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-outline-success btn-login">Update Now</button>
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Tree Delete Modal -->
                    <div class="modal fade" id="deleteModal{{ $data->slug }}" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are You Sure to Delete it!</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <a href="{{ route('user.tree.delete', $data->slug) }}">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <h5 class="text-danger text-center">'{{ $data->tree_name }}' will be Deleted!</h5>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" type="submit">Yes</button>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <p class="float-right">
                        <form action="{{ route('cart.store', $data->id) }}" method="post" class="d-inline">
                            @csrf
                            <input type="hidden" name="tree_id" min="1" value="{{ $data->id }}">
                            <button type="submit" class="btn btn-warning"><i class="fa fa-cart-plus"></i> Add to Cart</button>
                        </form>
                        <a href="{{ route('user.tree.show', $data->slug) }}" class="btn btn-info"> View Details
                            <i class="fa fa-arrow-right"></i></a>
                    </p>
                @endif
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
        <div class="paginations ">
            {{ $trees->withQueryString()->links() }}
        </div>
@empty
    <h3 class="m-auto text-center border p-4 font-weight-bold text-danger">No Tree Here!</h3>
@endforelse

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#tree_description'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
