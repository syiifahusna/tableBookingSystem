@extends('layouts.app')

@section('content')

<style>
    /* DEMO GENERAL ============================== */
    .hover {
        overflow: hidden;
        position: relative;
        padding-bottom: 60%;
    }

    .hover-overlay {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 90;
        transition: all 0.4s;
    }

    .hover img {
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        transition: all 0.3s;
    }

    .hover-content {
        position: relative;
        z-index: 99;
    }

    /* DEMO 2 ============================== */
    .hover-2 .hover-overlay {
        background: linear-gradient(to top, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.1));
    }

    .hover-2-title {
        position: absolute;
        top: 50%;
        left: 0;
        text-align: center;
        width: 100%;
        z-index: 99;
        transition: all 0.3s;
    }

    .hover-2-description {
        width: 100%;
        position: absolute;
        bottom: 0;
        opacity: 0;
        left: 0;
        text-align: center;
        z-index: 99;
        transition: all 0.3s;
    }

    .hover-2:hover .hover-2-title {
        transform: translateY(-1.5rem);
    }

    .hover-2:hover .hover-2-description {
        bottom: 0.5rem;
        opacity: 1;
    }

    .hover-2:hover .hover-overlay {
        background: linear-gradient(to top, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.1));
    }

</style>

<div class="container-fluid">
    <h1 class="text-center">We Serve</h1>
    <p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
    
    @foreach($menu as $m)
        <div class="py-5">
            <h3 class="text-center">{{ $m->menu_name }}</h3>       
            <!-- Carousel wrapper -->
            <div id="carouselMultiItem{{ $m->id }}" class="carousel slide carousel-dark text-center" data-mdb-ride="carousel">
                <!-- Controls -->
                <div class="d-flex justify-content-center mb-4">
                    <button type="button" class="carousel-control-prev position-relative" data-mdb-target="#carouselMultiItem{{ $m->id }}" data-mdb-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button type="button" class="carousel-control-next position-relative"  data-mdb-target="#carouselMultiItem{{ $m->id }}" data-mdb-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!-- Inner -->
                <div class="carousel-inner py-4">
                    @php
                        $menu_id = $m->id;
                        $filtered = $dishes->filter(function ($dishes) use ($menu_id) {
                            return ($dishes->menu_id == $menu_id);
                        });
                        
                        //divide to every 3 arr, return multidementional array
                        $chunk = $filtered->chunk(3);
                    @endphp
                    
                    @foreach($chunk as $dish => $val)
                        <!-- Single item -->
                        <div class="carousel-item">
                            <div class="container">
                                <div class="row">
                                    @foreach($val as $d)
                                        <div class="col-md-4">
                                            <div class="hover hover-2 text-white rounded">
                                                <img src="{{ asset('storage/food/'. $d->image)}}" alt="">
                                                <div class="hover-overlay"></div>
                                                <div class="hover-2-content px-5 py-4">
                                                    <h3 class="hover-2-title text-uppercase text-center"> {{ $d->dish_name }} </h3>
                                                    <p class="hover-2-description text-uppercase mb-0">
                                                        RM {{ number_format( $d->price, 2) }}
                                                        <br>
                                                        {{ $d->desc }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach

</div>


<!-- MDB -->
	<script type="text/javascript" src="js/mdb.min.js"></script>
    <script>
        let carouselItem = document.getElementsByClassName("carousel-inner");
        for(i=0;i<carouselItem.length;i++){
            carouselItem[i].firstElementChild.className += " active";
        }

    </script>
@endsection