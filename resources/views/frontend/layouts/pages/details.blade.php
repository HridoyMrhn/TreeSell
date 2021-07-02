@extends('frontend.master')

@section('content')

<div class="container">
    <div class="card card-body mt-3 tree-single">
        <div class="row">
            <div class="col-sm-6 border-right">
                <div class="our-carousel tree-single-carousel">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="assets/images/trees/tree1.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/trees/tree2.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/trees/tree3.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/trees/tree4.jpg" class="d-block w-100" alt="...">
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
            <div class="col-sm-6 pl-4">
                <h2>Cactus X3</h2>
                <p class="uploaded-by">
                    <strong>Uploaded By : </strong> <a href="">Polash Rana</a>
                </p>
                <p class="uploaded-at">
                    <strong>Uploaded at : </strong> <a href="">10 Hours Ago</a>
                </p>
                <p>
                    <strong>Category: </strong> Category 1
                </p>
                <p>
                    <strong>Location: </strong> Dhaka-1200
                </p>
                <p>
                    <strong>Width/Height: </strong> 12ft/10ft
                </p>
                <p>
                    <strong>Sceintific Name: </strong> Hjsdbsd sdhjsd
                </p>
            </div>
            <div class="col-sm-12 mt-3">
                <h4>Details: </h4>
                <br>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error reiciendis molestias obcaecati, quae temporibus odio voluptatibus minus quas iure repellat blanditiis voluptatem, sapiente, eveniet saepe exercitationem consequuntur. Veniam, quae impedit.
                <br>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit fugiat ad error consectetur ipsam tempora adipisci. Veniam dolorum minima doloremque in, quibusdam voluptatem ex similique voluptate, at placeat rerum delectus.
            </div>
        </div>
    </div>
</div>

@endsection
