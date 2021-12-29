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
    <div class="py-5">
        <h3 class="text-center">Breakfast</h3>
        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

        <!-- Carousel wrapper -->
        <div id="carouselMultiItemBreakfast" class="carousel slide carousel-dark text-center" data-mdb-ride="carousel">
            <!-- Controls -->
            <div class="d-flex justify-content-center mb-4">
                <button type="button" class="carousel-control-prev position-relative" data-mdb-target="#carouselMultiItemBreakfast" data-mdb-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button type="button" class="carousel-control-next position-relative"  data-mdb-target="#carouselMultiItemBreakfast" data-mdb-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <!-- Inner -->
            <div class="carousel-inner py-4">
                <!-- Single item -->
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="hover hover-2 text-white rounded"><img src="https://images.unsplash.com/photo-1565299585323-38d6b0865b47?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=780&q=80" alt="">
                                <div class="hover-overlay"></div>
                                <div class="hover-2-content px-5 py-4">
                                    <h3 class="hover-2-title text-uppercase text-center"> <span class="font-weight-light">Image </span>Caption</h3>
                                    <p class="hover-2-description text-uppercase mb-0">Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit.</p>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="hover hover-2 text-white rounded"><img src="https://images.unsplash.com/photo-1586511934875-5c5411eebf79?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="">
                                <div class="hover-overlay"></div>
                                <div class="hover-2-content px-5 py-4">
                                    <h3 class="hover-2-title text-uppercase text-center"> <span class="font-weight-light">Image </span>Caption</h3>
                                    <p class="hover-2-description text-uppercase mb-0">Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit.</p>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="hover hover-2 text-white rounded"><img src="https://images.unsplash.com/photo-1565299585323-38d6b0865b47?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=780&q=80" alt="">
                                <div class="hover-overlay"></div>
                                <div class="hover-2-content px-5 py-4">
                                    <h3 class="hover-2-title text-uppercase text-center"> <span class="font-weight-light">Image </span>Caption</h3>
                                    <p class="hover-2-description text-uppercase mb-0">Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit.</p>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single item -->
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="hover hover-2 text-white rounded"><img src="https://images.unsplash.com/photo-1600335895229-6e75511892c8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="">
                                <div class="hover-overlay"></div>
                                <div class="hover-2-content px-5 py-4">
                                    <h3 class="hover-2-title text-uppercase text-center"> <span class="font-weight-light">Image </span>Caption</h3>
                                    <p class="hover-2-description text-uppercase mb-0">Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit.</p>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="hover hover-2 text-white rounded"><img src="https://images.unsplash.com/photo-1565299585323-38d6b0865b47?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=780&q=80" alt="">
                                <div class="hover-overlay"></div>
                                <div class="hover-2-content px-5 py-4">
                                    <h3 class="hover-2-title text-uppercase text-center"> <span class="font-weight-light">Image </span>Caption</h3>
                                    <p class="hover-2-description text-uppercase mb-0">Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit.</p>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="hover hover-2 text-white rounded"><img src="https://images.unsplash.com/photo-1586511934875-5c5411eebf79?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="">
                                <div class="hover-overlay"></div>
                                <div class="hover-2-content px-5 py-4">
                                    <h3 class="hover-2-title text-uppercase text-center"> <span class="font-weight-light">Image </span>Caption</h3>
                                    <p class="hover-2-description text-uppercase mb-0">Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit.</p>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Inner -->
        </div>
        <!-- Carousel wrapper -->
    </div>
    <div class="py-5">
        <h3 class="text-center">Lunch</h3>
        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

        <!-- Carousel wrapper -->
        <div id="carouselMultiItemLunch" class="carousel slide carousel-dark text-center" data-mdb-ride="carousel">
            <!-- Controls -->
            <div class="d-flex justify-content-center mb-4">
                <button type="button" class="carousel-control-prev position-relative" data-mdb-target="#carouselMultiItemLunch" data-mdb-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button type="button" class="carousel-control-next position-relative"  data-mdb-target="#carouselMultiItemLunch" data-mdb-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <!-- Inner -->
            <div class="carousel-inner py-4">
                <!-- Single item -->
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="hover hover-2 text-white rounded"><img src="https://images.unsplash.com/photo-1478144592103-25e218a04891?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1075&q=80" alt="">
                                <div class="hover-overlay"></div>
                                <div class="hover-2-content px-5 py-4">
                                    <h3 class="hover-2-title text-uppercase text-center"> <span class="font-weight-light">Image </span>Caption</h3>
                                    <p class="hover-2-description text-uppercase mb-0">Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit.</p>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="hover hover-2 text-white rounded"><img src="https://images.unsplash.com/photo-1600335895229-6e75511892c8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="">
                                <div class="hover-overlay"></div>
                                <div class="hover-2-content px-5 py-4">
                                    <h3 class="hover-2-title text-uppercase text-center"> <span class="font-weight-light">Image </span>Caption</h3>
                                    <p class="hover-2-description text-uppercase mb-0">Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit.</p>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="hover hover-2 text-white rounded"><img src="https://images.unsplash.com/photo-1600335895229-6e75511892c8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="">
                                <div class="hover-overlay"></div>
                                <div class="hover-2-content px-5 py-4">
                                    <h3 class="hover-2-title text-uppercase text-center"> <span class="font-weight-light">Image </span>Caption</h3>
                                    <p class="hover-2-description text-uppercase mb-0">Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit.</p>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single item -->
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="hover hover-2 text-white rounded"><img src="https://images.unsplash.com/photo-1478144592103-25e218a04891?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1075&q=80" alt="">
                                <div class="hover-overlay"></div>
                                <div class="hover-2-content px-5 py-4">
                                    <h3 class="hover-2-title text-uppercase text-center"> <span class="font-weight-light">Image </span>Caption</h3>
                                    <p class="hover-2-description text-uppercase mb-0">Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit.</p>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="hover hover-2 text-white rounded"><img src="https://images.unsplash.com/photo-1506084868230-bb9d95c24759?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="">
                                <div class="hover-overlay"></div>
                                <div class="hover-2-content px-5 py-4">
                                    <h3 class="hover-2-title text-uppercase text-center"> <span class="font-weight-light">Image </span>Caption</h3>
                                    <p class="hover-2-description text-uppercase mb-0">Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit.</p>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="hover hover-2 text-white rounded"><img src="https://images.unsplash.com/photo-1476718406336-bb5a9690ee2a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="">
                                <div class="hover-overlay"></div>
                                <div class="hover-2-content px-5 py-4">
                                    <h3 class="hover-2-title text-uppercase text-center"> <span class="font-weight-light">Image </span>Caption</h3>
                                    <p class="hover-2-description text-uppercase mb-0">Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit.</p>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Inner -->
        </div>
        <!-- Carousel wrapper -->
    </div>
    <div class="py-5">
        <h3 class="text-center">Dinner</h3>
        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

        <!-- Carousel wrapper -->
        <div id="carouselMultiItemDinner" class="carousel slide carousel-dark text-center" data-mdb-ride="carousel">
            <!-- Controls -->
            <div class="d-flex justify-content-center mb-4">
                <button type="button" class="carousel-control-prev position-relative" data-mdb-target="#carouselMultiItemDinner" data-mdb-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button type="button" class="carousel-control-next position-relative"  data-mdb-target="#carouselMultiItemDinner" data-mdb-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <!-- Inner -->
            <div class="carousel-inner py-4">
                <!-- Single item -->
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="hover hover-2 text-white rounded"><img src="https://images.unsplash.com/photo-1506084868230-bb9d95c24759?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="">
                                <div class="hover-overlay"></div>
                                <div class="hover-2-content px-5 py-4">
                                    <h3 class="hover-2-title text-uppercase text-center"> <span class="font-weight-light">Image </span>Caption</h3>
                                    <p class="hover-2-description text-uppercase mb-0">Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit.</p>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="hover hover-2 text-white rounded"><img src="https://images.unsplash.com/photo-1600335895229-6e75511892c8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="">
                                <div class="hover-overlay"></div>
                                <div class="hover-2-content px-5 py-4">
                                    <h3 class="hover-2-title text-uppercase text-center"> <span class="font-weight-light">Image </span>Caption</h3>
                                    <p class="hover-2-description text-uppercase mb-0">Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit.</p>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="hover hover-2 text-white rounded"><img src="https://images.unsplash.com/photo-1478144592103-25e218a04891?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1075&q=80" alt="">
                                <div class="hover-overlay"></div>
                                <div class="hover-2-content px-5 py-4">
                                    <h3 class="hover-2-title text-uppercase text-center"> <span class="font-weight-light">Image </span>Caption</h3>
                                    <p class="hover-2-description text-uppercase mb-0">Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit.</p>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Inner -->
        </div>
        <!-- Carousel wrapper -->
    </div>
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