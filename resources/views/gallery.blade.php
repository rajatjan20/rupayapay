@extends('layouts.rupayapayapp')
@section("content")
<!-- ----------------New Header---------------------------- -->

    <div class="intro-section custom-owl-carousel" id="home-section">
        <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mr-auto">
    
            <div class="owl-carousel slide-one-item-alt-text">
                @foreach($carousal as $index => $row)
                    <div class="slide-text">
                    {!! $row["content"] !!}
                </div>
                @endforeach
            </div>
    
            </div>
            <div class="col-lg-6 ml-auto" data-aos-delay="100">
                        
            <div class="owl-carousel slide-one-item-alt">
                @foreach($carousal as $index => $row)
                <img src="{{asset('images/gallery/'.$row['image_name'])}}" alt="Image" class="img-fluid">
                @endforeach
            </div>
    
            <div class="owl-custom-direction">
                <a href="#" class="custom-prev"><span class="fa fa-angle-left"></span></a>
                <a href="#" class="custom-next"><span class="fa fa-angle-right"></span></a>
            </div>
    
            </div>
        </div>
        </div>
    </div>
<!-- --------------New Header End--------------------------- -->
<div id="bdy">

<div class="main-wrapper">
    <!-- Start service Area -->
    <section class="service-area">
        <div class="container">
            <div class="row">
                @foreach($introduction as $index => $row)
                <div class="col-md-6">
                    <div class="single-service" style="background: url({{asset('/images/gallery/'.$row['image_name'])}});">
                        <div class="overlay overlay-content">
                            {!!  $row["content"] !!}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End service Area -->
    <hr style="color: #000; width: 100%; border: 1px solid rgb(107, 107, 107);">
    <!--  -->
    <div class="container-fluid">
    <div class="row vr-gallery">
        <div class="col-md-8 mb-4">
            <div class="row">
                <div class="col-md-12 col-lg-7 pr-0 pd-md">
                    <!-- <img src="./img/career-img2.jpg" alt=""> -->
                    <!--  -->
                    <div class="carousel slide carousel-fade mt-4" data-ride="carousel" data-pause="false" data-interval="2000" id="carousel-1">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active"><img src="{{asset('images/gallery/17.jpg')}}" width="100" alt="Slide Image">
                            
                        </div>
                        <div class="carousel-item"><img src="{{asset('images/gallery/12.jpg')}}" width="100" alt="Slide Image">
                            
                        </div>
                        <div class="carousel-item"><img src="{{asset('images/gallery/13.jpg')}}" width="100" alt="Slide Image">
                            
                        </div>
                        <div class="carousel-item"><img src="{{asset('images/gallery/conference4.jpg')}}" width="100" alt="Slide Image">
                            
                        </div>
                        
                    </div>
                    <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"><i class="la la-cutlery"></i></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1"
                            role="button" data-slide="next"><span class="carousel-control-next-icon"><i class="la la-cutlery"></i></span><span class="sr-only">Next</span></a></div>
                    
                </div>
                    <!--  -->
                </div>
                <div class="col-md-12 col-lg-5 light-bg cus-pd cus-arrow-left">
                    <p><small>march 27, 2020</small></p>
                    <h3>Product Lauch Party</h3>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa, accusantium alias? Quam minus consequuntur nulla, eaque soluta aspernatur? Fuga culpa maxime corrupti beatae ab suscipit hic. Quisquam iure magni maiores?
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 pl-4 mb-4">
            <div class="card">
                <img class="card-img h-100" src="{{asset('images/gallery/career5.jpg')}}" alt="">
                
            </div>
        </div>

        <div class="col-md-8 mb-4 pr-0 pd-md">
            <div class="card">
                <img class="card-img h-100" src="{{asset('images/gallery/14.jpg')}}" alt="">
                <div class="card-img-overlay">
                    <div class="contact-box">
                        <p><small>march 27, 2020</small></p>
                        <h3>Conferences</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea praesentium blanditiis hic explicabo eum molestiae accusamus labore! Dolor sit quasi libero beatae necessitatibus suscipit, porro minima perferendis id ratione unde?</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 pl-4 mb-4">
            <div class="card">
                <img class="card-img-top" src="{{asset('images/gallery/career-img4.jpg')}}" alt="">
                <div class="card-body bg-gray cus-pd2 cus-arrow-up">
                    <p><small>march 27, 2020</small></p>
                    <h3>Team work</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi numquam dignissimos voluptate nostrum quae quisquam necessitatibus ipsam mollitia eligendi sunt unde blanditiis aut minima, sed, voluptatibus laboriosam architecto velit rem.</p>
                </div>
            </div>
        </div>

        <div class="col-md-8 mb-4">
            <div class="row">
                <div class="col-md-12 col-lg-7 pr-0 pd-md">
                    <img src="{{asset('images/gallery/career10.jpg')}}" alt="">
                </div>
                <div class="col-md-12 col-lg-5 light-bg cus-pd cus-arrow-left">
                    <p><small>march 27, 2020</small></p>
                    <h3>Our Management</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium harum fugiat repellendus iusto quam velit, unde atque vitae quaerat quo eligendi suscipit accusamus beatae inventore. Doloribus possimus laboriosam quam deleniti?
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 pl-4 mb-4">
            <div class="card">
                <img class="card-img h-100" src="{{asset('images/gallery/career4.webp')}}" alt="">
                
            </div>
        </div>


    </div>
    </div>
    
    
    <div id="last-section">
        <div class="container container-5">
            @foreach($footer as $index => $row)
                <div class="card">
                    <img src="{{asset('images/gallery/'.$row['image_name'])}}">
                    <div class="card__head">{{$row["content"]}}</div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- End  Contact Area -->
</div>
</div>
@endsection