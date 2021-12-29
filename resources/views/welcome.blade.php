<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>tableBookingSystem</title>
        <!-- Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    
    
        <!--Style-->
        <style>
            .img-fluid{
                width:100%; 
                max-height: 500px; 
                object-fit: cover;
            }
        </style>
    </head>
    <body>
        
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="">tableBookingSystem</a>
                <div class="collapse navbar-collapse" id="navbarToggler">
                    
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/menu') }}">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/contact') }}">Contact Us</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}"> {{ Auth::user()->name }}</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Log in</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>
                        @endauth
                    </ul>
                    
                </div>
                
            </div>
        </nav>
        <div class="container-fluid" style="margin:0px;padding:0px;">
            <div id="carouselWelcome" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://images.unsplash.com/photo-1582169505937-b9992bd01ed9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1110&q=80" class="img-fluid d-block w-100 " alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1559847844-5315695dadae?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1158&q=80" class="img-fluid d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1590004987778-bece5c9adab6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80" class="img-fluid d-block w-100" alt="...">
                    </div>
                </div>
                <div class="carousel-caption d-none d-md-block">
                    <h1>Welcome</h1>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselWelcome" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselWelcome" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="container-fluid">
            <h1 class="text-center">We Serve</h1>
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <img
                    src="https://images.unsplash.com/photo-1504754524776-8f4f37790ca0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Boat on Calm Water"
                    />

                    <img
                    src="https://images.unsplash.com/photo-1501959915551-4e8d30928317?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Wintry Mountain Landscape"
                    />
                </div>

                <div class="col-lg-4 ">
                    <img
                    src="https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Mountains in the Clouds"
                    />

                    <img
                    src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Boat on Calm Water"
                    />
                </div>

                <div class="col-lg-4">
                    <img
                    src="https://images.unsplash.com/photo-1493770348161-369560ae357d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Waves at Sea"
                    />

                    <img
                    src="https://images.unsplash.com/photo-1478145046317-39f10e56b5e9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Yosemite National Park"
                    />
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <h1 class="text-center">Our Restaurant</h1>
            <div class="row mb-4">
                <div class="col-md-6 my-auto px-5 text-end">
                    <h3>Hunger is not an option</h3>
                    <p>
                        Lorem ipsum dolor sit amet, 
                        consectetur adipisicing elit. 
                        Dolores provident laborum facere 
                        architecto perspiciatis asperiores 
                        voluptatum sunt illo aut totam. 
                        Dolorum inventore repellat quisquam 
                        officiis earum iste quia molestias veniam.
                    </p>
                </div>
                <div class="col-md-6 my-auto px-5">
                    <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1153&q=80" class="w-100"alt="">
                </div>
            </div>


        </div>
        <div class="container-fluid">
            <div class=" bg-dark text-white p-3">
                <h1 class="text-center">Founder</h1>
                <div class="row text-center">
                    <div class="col-md p-4">
                        <img src="{{ asset('storage/artwork.jpg') }}" class="rounded-circle" style="max-width: 20%">
                        <h3>Lorem ipsum dolor</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                            Corrupti error aut animi voluptatum. Consequatur, quasi deleniti. 
                            Harum tempora explicabo accusantium, saepe hic, aliquam maxime 
                            doloribus perspiciatis consequatur quibusdam voluptate unde!
                        </p>
                    </div>
                    <div class="col-md p-4">
                        <img src="{{ asset('storage/artwork.jpg') }}" class="rounded-circle" style="max-width: 20%">
                        <h3>Lorem ipsum dolor</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                            Corrupti error aut animi voluptatum. Consequatur, quasi deleniti. 
                            Harum tempora explicabo accusantium, saepe hic, aliquam maxime 
                            doloribus perspiciatis consequatur quibusdam voluptate unde!
                        </p>
                    </div>
                    <div class="col-md p-4">
                        <img src="{{ asset('storage/artwork.jpg') }}" class="rounded-circle" style="max-width: 20%">
                        <h3>Lorem ipsum dolor</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                            Corrupti error aut animi voluptatum. Consequatur, quasi deleniti. 
                            Harum tempora explicabo accusantium, saepe hic, aliquam maxime 
                            doloribus perspiciatis consequatur quibusdam voluptate unde!
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-3">
            <h1 class="text-center">Contact Us</h1>
            <form action="mailto:someone@example.com" method="post" enctype="text/plain" class="px-5 mx-5">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Your Message</label>
                    <textarea class="form-control" name="massage" id="message" rows="3" placeholder="Your Message"></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
        <div class="container-fluid m-0 p-0">
            <div class="footer bg-dark text-light text-center p-3">
                <p>Created by Syifa</p>
            </div>
        </div>

   
        

        <!--Script-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>
