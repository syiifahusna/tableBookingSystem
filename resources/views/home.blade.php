@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 my-3">
            <h2 class="text-center">Welcome {{ auth()->user()->name }}</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed, 
                reiciendis? Recusandae saepe fuga praesentium laborum distinctio, 
                illum eum sint molestias eos, culpa optio officiis quo, eius voluptatum 
                reprehenderit rerum exercitationem?
            </p>
        </div>
        <div class="col-md-8 my-auto">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('fail'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('fail') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger"  role="alert">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <div class="row py-3">
                        <label for="name">Name</label>
                        <div class="col-10">
                            {{ auth()->user()->name }}
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalName">
                                Edit
                            </button>
                        </div>
                    </div>
                    <div class="row py-3">
                        <label for="email">Email</label>
                        <div class="col-10">
                        {{ auth()->user()->email }}
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEmail">
                                Edit
                            </button>
                        </div>
                    </div>
                    <div class="row py-3">
                        <label for="password">Password</label>
                        <div class="col-10 text-danger fst-italic">
                                password cannot be shown here
                            </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPassword">
                                Edit
                            </button>
                        </div>
                    </div>
                    
                    
                    
                    

                </div>
            </div>
    

            
        </div>
    </div>
</div>



<!-- Modal ============================================================================================-->
            
<div class="modal fade" id="modalName" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('profile.update.name',auth()->user()->id) }}">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ auth()->user()->name }}" autocomplete="name" autofocus>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modalEmail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{ route('profile.update.email',auth()->user()->id) }}">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Email</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ auth()->user()->email }}" required autocomplete="email" autofocus>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modalPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{ route('profile.update.password',auth()->user()->id) }}">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label for="password">Old Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        </div>
                        <div class="form-group">
                            <label for="newPassword">New Password</label>
                            <input id="newPassword" type="password" class="form-control @error('newPassword') is-invalid @enderror" name="newPassword" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
