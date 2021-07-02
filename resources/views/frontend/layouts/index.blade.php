@extends('frontend.master')

@section('content')

<div class="">
    <div class="row">
        <div class="col-sm-8">
            <div class="our-carousel">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/images/sliders/slider1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/sliders/slider2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/sliders/slider3.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/sliders/slider4.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 p-0">
            <div class="search-tree">
                <div class="p-5">
                    <h4>Search Your Tree</h4>
                    <input type="text" class="form-control" placeholder="Search your tree">

                    <h4>Tree Location</h4>
                    <input type="text" class="form-control" placeholder="Search your tree location">

                    <p class="mt-3">
                        <button class="btn btn-info btn-block btn-search">
                            <i class="fa fa-search"></i> Search Now
                        </button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Home Page Links -->
<div class="container">
    <div class="row mt-3 mb-5">
        <div class="col-md-3">
            <div class="homepage-link" onclick="location.href='register.html'">
                <p>
                    <i class="fa fa-sign-in"></i>
                </p>
                <h3>
                    Sign Up
                </h3>
                <p>
                    Sign Up To Upload Your Tree
                </p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="homepage-link" onclick="location.href='upload.html'">
                <p>
                    <i class="fa fa-upload" style="color: #f59a13;"></i>
                </p>
                <h3>
                    Upload Tree
                </h3>
                <p>
                    Upload Your Nearest Tree
                </p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="homepage-link" onclick="location.href='#'">
                <p>
                    <i class="fa fa-search" style="color: #aab7b5;"></i>
                </p>
                <h3>
                    Search Tree
                </h3>
                <p>
                    Search Any Tree
                </p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="homepage-link" onclick="location.href='learn.html'">
                <p>
                    <i class="fa fa-info-circle" style="color: #8BC34A;"></i>
                </p>
                <h3>
                    Learn Tree
                </h3>
                <p>
                    Learn About More Tree
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Home Page Links -->

<div class="uploaded-trees">
    <div class="container">
        <h2>Recent Uploaded Trees</h2>

        <div class="single-tree">
            <div class="row">
                <div class="col-sm-3">
                    <img src="assets/images/trees/tree1.jpg" class="img img-thumbnail">
                </div>
                <div class="col-md-9">
                    <h2>Cactus X3</h2>
                    <p class="uploaded-by">
                        <strong>Uploaded By : </strong> <a href="">Polash Rana</a>
                    </p>
                    <p class="uploaded-at">
                        <strong>Uploaded at : </strong> <a href="">10 Hours Ago</a>
                    </p>
                    <div class="small-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident aliquid porro a velit doloribus nobis cum sint beatae neque iusto molestias fuga, eaque vero natus maxime quam sunt optio praesentium.
                    </div>
                    <p class="float-right">
                        <a href="tree-detail.html" class="btn btn-info btn-view"> View Details <i class="fa fa-arrow-right"></i></a>
                    </p>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div> <!-- End Single Tree -->

        <div class="single-tree">
            <div class="row">
                <div class="col-sm-3">
                    <img src="assets/images/trees/tree2.jpg" class="img img-thumbnail">
                </div>
                <div class="col-md-9">
                    <h2>New Tree X3</h2>
                    <p class="uploaded-by">
                        <strong>Uploaded By : </strong> <a href="">Polash Rana</a>
                    </p>
                    <p class="uploaded-at">
                        <strong>Uploaded at : </strong> <a href="">10 Hours Ago</a>
                    </p>
                    <div class="small-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident aliquid porro a velit doloribus nobis cum sint beatae neque iusto molestias fuga, eaque vero natus maxime quam sunt optio praesentium.
                    </div>
                    <p class="float-right">
                        <a href="tree-detail.html" class="btn btn-info btn-view"> View Details <i class="fa fa-arrow-right"></i></a>
                    </p>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div> <!-- End Single Tree -->

        <div class="single-tree">
            <div class="row">
                <div class="col-sm-3">
                    <img src="assets/images/trees/tree3.jpg" class="img img-thumbnail">
                </div>
                <div class="col-md-9">
                    <h2>Cactus X3</h2>
                    <p class="uploaded-by">
                        <strong>Uploaded By : </strong> <a href="">Polash Rana</a>
                    </p>
                    <p class="uploaded-at">
                        <strong>Uploaded at : </strong> <a href="">10 Hours Ago</a>
                    </p>
                    <div class="small-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident aliquid porro a velit doloribus nobis cum sint beatae neque iusto molestias fuga, eaque vero natus maxime quam sunt optio praesentium.
                    </div>
                    <p class="float-right">
                        <a href="tree-detail.html" class="btn btn-info btn-view"> View Details <i class="fa fa-arrow-right"></i></a>
                    </p>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div> <!-- End Single Tree -->

        <div class="single-tree">
            <div class="row">
                <div class="col-sm-3">
                    <img src="assets/images/trees/tree4.jpg" class="img img-thumbnail">
                </div>
                <div class="col-md-9">
                    <h2>Cactus X3</h2>
                    <p class="uploaded-by">
                        <strong>Uploaded By : </strong> <a href="">Polash Rana</a>
                    </p>
                    <p class="uploaded-at">
                        <strong>Uploaded at : </strong> <a href="">10 Hours Ago</a>
                    </p>
                    <div class="small-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident aliquid porro a velit doloribus nobis cum sint beatae neque iusto molestias fuga, eaque vero natus maxime quam sunt optio praesentium.
                    </div>
                    <p class="float-right">
                        <a href="tree-detail.html" class="btn btn-info btn-view"> View Details <i class="fa fa-arrow-right"></i></a>
                    </p>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div> <!-- End Single Tree -->

        <div class="paginations ">
            <nav aria-label="..." class="float-right">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active">
                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
            <div class="clearfix"></div>
        </div>
    </div>

</div>


@endsection
