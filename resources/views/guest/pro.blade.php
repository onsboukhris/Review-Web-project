<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('mainassets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('mainassets/css/style.css')}}" rel="stylesheet">
</head>

<body>

    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">

            </div>
            <div class="col-lg-6 text-center text-lg-right">

            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">

                <a href="/" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">review</span>web</h1>
                </a>
            </div>

                <div class="col-lg-6 col-6 text-left">
                    <form action="/products/search" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for places " name="keywords">
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent text-primary">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>


        </div>

    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">

            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">

                        <div class="navbar-nav ml-auto py-0">
                            <a href="/" class="nav-item nav-link">home</a>

                        </div>
                    </div>


                    </div>
                </nav>

            </div>

    </div>
    <!-- Navbar End -->



    <!-- Page Header Start -->

    <!-- Page Header End -->



    <!-- Shop Start -->

    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->

                <div class="col-lg-3 d-none d-lg-block">
                    <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                        <h6 class="m-0">Categories</h6>
                        <i class="fa fa-angle-down text-dark"></i>
                    </a>
                    <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                        <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                   @foreach ( $categories as $c )
                   <a href="/products/{{ $c->id }}/list" class="nav-item nav-link">{{ $c->name }}</a>
                    @endforeach

                        </div>
                    </nav>

            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="">
                                <div class="input-group">

                                </div>
                            </form>
                            <div class="dropdown ml-4">

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <a class="dropdown-item" href="#">Latest</a>
                                    <a class="dropdown-item" href="#">Popularity</a>
                                    <a class="dropdown-item" href="#">Best Rating</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="{{ asset('uploads/product') }}/{{ $product->image }}" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">{{ $product->name }}</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>{{ $product->adresse}}</h6><h6 class="text-muted ml-2"></h6>,
                                    <h6>{{ $product->pays }}</h6><h6 class="text-muted ml-2"></h6>
                                    <div class="text-primary mr-2">
                                        <br>

                @php
                $totalRating = 0;
                $averageRating = 0;
                if(count($product->reviews) > 0) {
                    foreach($product->reviews as $review) {
                        $totalRating += $review->rate;
                    }
                    $averageRating = round($totalRating / count($product->reviews));
                }
               @endphp
                                        @for($i=1; $i<=5; $i++)
                                            @if($i<=$averageRating)
                                                <small class="fas fa-star"></small>
                                            @elseif($i==$averageRating+0.5)
                                                <small class="fas fa-star-half-alt"></small>
                                            @else
                                                <small class="far fa-star"></small>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </div>

                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="/product/details/{{ $product->id }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Add Review</a>

                                </div>

                        </div>
                    </div>
              @endforeach

                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
 <!-- Footer Start -->
 <div class="container-fluid bg-secondary text-dark mt-5 pt-5">

            </div>
        </div>
    </div>

</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('mainassets/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('mainassets/lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Contact Javascript File -->
<script src="{{asset('mainassets/mail/jqBootstrapValidation.min.js')}}"></script>
<script src="{{asset('mainassets/mail/contact.js')}}"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>


