@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <h1 class="text-center">Contact Us</h1>
    <div class="row m-5 p-3">
        <div class="col-md-6 my-auto ps-5 pe-3">
            <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1153&q=80" class="w-100"alt="">
        </div>
        <div class="col-md-6 my-auto ps-3 pe-5">
            <h3>Contact Us</h3>
            <form action="mailto:someone@example.com" method="post" enctype="text/plain" >
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
    </div>
</div>

@endsection