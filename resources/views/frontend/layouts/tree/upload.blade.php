@extends('frontend.master')


@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="container mt-4 mb-4">
            <div class="login-form">
                <h4>Share Your Tree</h4>
                <form action="{{ route('user.tree.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tree_name">Tree Name</label>
                                <input type="text" class="form-control" name="tree_name" id="tree_name" placeholder="Enter Tree Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category_id">Tree Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Please select a category</option>
                                    @foreach ($categories as $data)
                                        <option value="{{ $data->id}}">{{ $data->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tree_scientific_name">Sceintific Name</label>
                                <input type="text" class="form-control" id="tree_scientific_name" name="tree_scientific_name" placeholder="Enter Tree Sceintific Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tree_location">Tree Location Available</label>
                                <input type="text" class="form-control" name="tree_location" id="tree_location" placeholder="Enter Tree Location">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tree_price">Tree Pice</label>
                                <input type="number" class="form-control" id="tree_price" name="tree_price" placeholder="Enter Tree Pice">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tree_quantity">Tree Quantity</label>
                                <input type="number" class="form-control" id="tree_quantity" name="tree_quantity" placeholder="Enter Tree Quantity">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tree_width">Tree Width</label>
                                <input type="number" class="form-control" id="tree_width" name="tree_width" placeholder="Enter Tree Width">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tree_height">Tree Height</label>
                                <input type="number" class="form-control" id="tree_height" name="tree_height" placeholder="Enter Tree Height">
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
                                <textarea name="tree_info" id="editor" rows="5" class="form-control" placeholder="Tree Description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="tree_description">Tree Description</label>
                                <textarea name="tree_description" id="tree_description" rows="5" class="form-control" placeholder="Tree Description"></textarea>
                            </div>
                        </div>
                    </div>
                    <p class="text-center">
                        <button type="submit" class="btn btn-outline-success btn-login btn-lg">Share Now</button>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

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
