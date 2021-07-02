@extends('frontend.master')


@section('content')


<div class="container">
    <div class="card card-body mt-4">
        <div class="row">
            <div class="col-md-2">
                <img src="assets/images/users/default.png" class="img img-fluid">
            </div>
            <div class="col-md-10">
                <h4 class="user-name">Maniruzzaman Akash</h4>
                <p class="user-location">
                    <i class="fa fa-map"></i> Dhaka-1200, Azimpur
                </p>
                <p>
                    <i class="fa fa-envelope"></i> <a
                        href="mailto:manirujjamanakash@gmail.com">manirujjamanakash@gmail.com</a>
                </p>
                <p>
                    <i class="fa fa-phone"></i> 01951233084
                </p>
            </div>
        </div>
        <div class="border-top mt-3">

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
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Provident aliquid porro a velit doloribus nobis cum sint beatae
                                    neque iusto molestias fuga, eaque vero natus maxime quam sunt
                                    optio praesentium.
                                </div>
                                <p class="float-right">
                                    <a href="tree-detail.html" class="btn btn-info btn-view"> View
                                        Details <i class="fa fa-arrow-right"></i></a>
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
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Provident aliquid porro a velit doloribus nobis cum sint beatae
                                    neque iusto molestias fuga, eaque vero natus maxime quam sunt
                                    optio praesentium.
                                </div>
                                <p class="float-right">
                                    <a href="tree-detail.html" class="btn btn-info btn-view"> View
                                        Details <i class="fa fa-arrow-right"></i></a>
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
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Provident aliquid porro a velit doloribus nobis cum sint beatae
                                    neque iusto molestias fuga, eaque vero natus maxime quam sunt
                                    optio praesentium.
                                </div>
                                <p class="float-right">
                                    <a href="tree-detail.html" class="btn btn-info btn-view"> View
                                        Details <i class="fa fa-arrow-right"></i></a>
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
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Provident aliquid porro a velit doloribus nobis cum sint beatae
                                    neque iusto molestias fuga, eaque vero natus maxime quam sunt
                                    optio praesentium.
                                </div>
                                <p class="float-right">
                                    <a href="tree-detail.html" class="btn btn-info btn-view"> View
                                        Details <i class="fa fa-arrow-right"></i></a>
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
                                    <a class="page-link" href="#">2 <span
                                            class="sr-only">(current)</span></a>
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
        </div>
    </div>

</div>

@endsection
