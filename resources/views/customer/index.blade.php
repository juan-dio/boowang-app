@extends('layouts.customer')

@section('content')
    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ '/storage/wisata-images/jaddih.jpg' }}" alt="Bangkalan" width="100%" height="100%" class="object-fit-cover" style="filter: brightness(60%);">
                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1 class="fw-bold">Boo<span class="text-warning">Wang</span></h1>
                        <p>Booking Wisata Bangkalan.</p>
                        <p><a href="{{ route('register') }}" class="btn btn-lg btn-warning">Sign up sekarang</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ '/storage/wisata-images/bangkalan.jpg' }}" alt="Bangkalan" width="100%" height="100%" class="object-fit-cover" style="filter: brightness(60%);">
        
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Jelajahi beberapa tempat wisata di Bangkalan.</h1>
                        <p>Anda dapat membeli tiketnya melalui website kami.</p>
                        <p><a href="{{ route('wisata') }}" class="btn btn-lg btn-warning" href="#">Jelajahi</a></p>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container marketing position-relative">
        <!-- Three columns of text below the carousel -->
        <div class="row">
            @foreach ($places as $place)    
            <div class="col-lg-4">
                <img src="{{ '/storage/' . $place->image }}" alt="{{ $place->nama }}" class="rounded-circle object-fit-cover mb-2" width="140" height="140">
                <h2>{{ $place->nama }}</h2>
                <p>{{ substr(strip_tags($place->deskripsi), 0, 150) }}...</p>
                <p><a href="wisata/{{ $place->id }}" class="btn btn-success" href="#">Lihat detail &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            @endforeach
            
        </div><!-- /.row -->
    
    
        <!-- START THE FEATURETTES -->
    
        <hr class="featurette-divider">
    
        <div class="row featurette">
            <div class="col-md-7 d-flex flex-column justify-content-center">
                <h2 class="featurette-heading">Selamat Datang di Kabupaten Bangkalan!</h2>
                <p class="lead">Kabupaten Bangkalan, yang terletak di ujung barat Pulau Madura, Jawa Timur, adalah sebuah daerah yang kaya akan warisan budaya, keindahan alam, dan pesona wisata yang menakjubkan. Dikenal dengan keramahan penduduknya dan tradisi yang kental, Bangkalan menawarkan pengalaman liburan yang unik dan tak terlupakan.</p>
            </div>
            <div class="col-md-5">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253420.05670461943!2d112.74507876086662!3d-7.045857366487986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd819888981e67b%3A0x3027a76e3cd8a70!2sKabupaten%20Bangkalan%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1716395327940!5m2!1sid!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    
        <hr class="featurette-divider">
    
        <!-- /END THE FEATURETTES -->
    
    </div><!-- /.container -->
@endsection
