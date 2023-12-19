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
            <div class="col-lg-6 d-none d-lg-block">

            </div>

        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="/" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">review</span>web </h1>

                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">

                    <div class="navbar-nav ml-auto py-0">
                        <a href="/" class="nav-item nav-link">home</a>

                    </div>
                </div>
            </div>



             </div>

        </div>
    </div>
    <!-- Topbar End -->


    <!-- Page Header Start -->

    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{ asset('uploads/product') }}/{{ $produit->image }}" alt="Image">
                        </div>

                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>
            @php
            $totalRating = 0;
            $averageRating = 0;
            if(count($produit->reviews) > 0) {
                foreach($produit->reviews as $review) {
                    $totalRating += $review->rate;
                }
                $averageRating = round($totalRating / count($produit->reviews));
            }
        @endphp
        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold">{{ $produit->name }}</h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
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

                <small class="pt-1">({{ count($produit->reviews) }} Reviews)</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4">country: {{ $produit->pays}}</h3>
                <h3 class="font-weight-semi-bold mb-4">address: {{ $produit->adresse }}</h3>
                <h3 class="font-weight-semi-bold mb-4">city: {{ $produit->ville}}</h3>
                <p class="mb-4"></p>



            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">

                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews ({{ count($produit->reviews) }})</a>
                </div>
                <div class="tab-content">


                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">{{ count($produit->reviews) }} review for {{ $produit->name }}</h4>

                                @foreach ($produit->reviews as $review )

                                <div class="media mb-4">

                                    <div class="media-body">
                                        <h6>{{ $review->user->name }}<small> - <i>{{ $review->created_at }}</i></small></h6>
                                        <div class="text-primary mb-2">
                                            @for($i=0 ; $i < $review->rate ; $i++)
                                            <i class="fas fa-star"></i>
                                           @endfor
                                        </div>
                                        <p>{{ $review->content }}</p>
                                    </div>
                                </div>

                                 @endforeach
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>
                                <small>Your email address will not be published. Required fields are marked *</small>

                                    <form action="{{ url('reviews') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $produit->id }}" name="product_id">
                                    <div class="form-group">
                                        <label class="mb-0 mr-2">Your Rating * :</label>
                                        <input type="number" max="5" min="1"  class="form-control" name="rate">
                                    </div>


                                    <div class="form-group">
                                        <label for="message">Your Review *</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control" name="content"></textarea>
                                    </div>

                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->





   <!-- Footer Start -->
   <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
    <div class="row px-xl-5 pt-5">

        <div class="col-lg-8 col-md-12">
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h5 class="font-weight-bold text-dark mb-4"></h5>

                </div>
                <div class="col-md-4 mb-5">
                    <h5 class="font-weight-bold text-dark mb-4"></h5>

                </div>
                <div class="col-md-4 mb-5">
                    <h5 class="font-weight-bold text-dark mb-4"></h5>
                    <form action="">
                        <div class="form-group">

                        </div>
                        <div class="form-group">

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row border-top border-light mx-xl-5 py-4">
        <div class="col-md-6 px-xl-0">

        </div>
        <div class="col-md-6 px-xl-0 text-center text-md-right">
            <img class="img-fluid" src="img/payments.png" alt="">
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
