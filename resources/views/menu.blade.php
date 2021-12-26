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
    <!-- DEMO 2-->
    <div class="py-5">
        <h3 class="font-weight-bold mb-0">Demo 2</h3>
        <p class="font-italic text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        <div class="row">
            <!-- DEMO 2 Item-->
            <div class="col-lg-6 mb-3 mb-lg-0">
                <div class="hover hover-2 text-white rounded"><img src="https://bootstrapious.com/i/snippets/sn-img-hover/hoverSet-2.jpg" alt="">
                <div class="hover-overlay"></div>
                <div class="hover-2-content px-5 py-4">
                    <h3 class="hover-2-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-light">Image </span>Caption</h3>
                    <p class="hover-2-description text-uppercase mb-0">Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit.</p>
                </div>
                </div>
            </div>

            <!-- DEMO 2 Item-->
            <div class="col-lg-6">
                <div class="hover hover-2 text-white rounded"><img src="https://bootstrapious.com/i/snippets/sn-img-hover/hoverSet-1.jpg" alt="">
                <div class="hover-overlay"></div>
                <div class="hover-2-content px-5 py-4">
                    <h3 class="hover-2-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-light">Image </span>Caption</h3>
                    <p class="hover-2-description text-uppercase mb-0">Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit.</p>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection