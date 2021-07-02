@extends('frontend.master')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="container mt-4 mb-4">
            <div class="login-form">
                <h4>Share Your Tree</h4>
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tree Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Tree Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tree Category</label>
                                <select name="category" id="" class="form-control">
                                    <option value="">Please select a category</option>
                                    <option value="1">Category 1</option>
                                    <option value="2">Category 3</option>
                                    <option value="3">Category 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tree Width</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Width">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tree Height</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Tree Height">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tree Location Available</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Tree Location Available">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sceintific Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Tree Sceintific Name">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tree Images</label>
                                <input type="file" class="dropify" data-allowed-file-extensions="jpg jpeg gif png" data-max-file-size-preview="5M" multiple />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tree Details</label>
                                <textarea name="description" id="descriptionEditor" rows="5" class="form-control"></textarea>
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
</div>ˇ

@endsection
