@extends('backend.master')
@section('tree')
active
@endsection

@section('title')
Tree List
@endsection

@section('content')
@include('backend.layouts.components.status')


<div class="row">
    <div class="col-lg-11 mx-auto pt-20 p-3 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Tree Details</h4>
            </div>
        </div>
            <div class="pb-3">
                <form action="{{ route('tree.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="tree_name" class="col-form-label">Tree Name:</label>
                            <input type="text" name="tree_name" id="tree_name" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="category_id" class="col-form-label">Tree Category:</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($categories as $data)
                                <option value="{{ $data->id }}">{{ $data->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="tree_scientific_name" class="col-form-label">Scientific Name:</label>
                            <input type="text" name="tree_scientific_name" id="tree_scientific_name" class="form-control" placeholder="Scientific Name">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="tree_price" class="col-form-label">Tree Price:</label>
                            <input type="text" name="tree_price" id="tree_price" class="form-control" placeholder="Price Here">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="tree_width" class="col-form-label">Tree Width:</label>
                            <input type="text" name="tree_width" id="tree_width" class="form-control" placeholder="Width">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="tree_height" class="col-form-label">Tree Height:</label>
                            <input type="text" name="tree_height" id="tree_height" class="form-control" placeholder="Height">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="tree_quantity" class="col-form-label">Tree Quantity:</label>
                            <input type="number" name="tree_quantity" id="tree_quantity" class="form-control" placeholder="Enter Quantuty Here">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="tree_location" class="col-form-label">Tree Location:</label>
                            <input type="text" name="tree_location" id="tree_location" class="form-control" placeholder="Enter Location">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="tree_image" class="col-form-label">Tree images:</label>
                            <input type="file" name="tree_image[]" id="tree_image" class="form-control" multiple>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="tree_info" class="col-form-label">Tree Short info:</label>
                            <textarea name="tree_info" id="tree_info" rows="3" placeholder="About This Tree" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tree_description" class="col-form-label">Tree Description:</label>
                            <textarea name="tree_description" id="tree_description" rows="5" placeholder="About This Tree" class="form-control"></textarea>
                        </div>
                    </div>
                        <button class="btn btn-primary btn-lg" type="submit">Submit</button>
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
