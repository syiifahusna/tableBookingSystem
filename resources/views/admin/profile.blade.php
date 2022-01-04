@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 my-3">
            <h2 class="text-center">{{ Auth::guard('admin')->user()->name }}</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed, 
                reiciendis? Recusandae saepe fuga praesentium laborum distinctio, 
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
                    <div class="row py-1">
                        <label>Name</label>
                        <div class="col-10">
                            {{ Auth::guard('admin')->user()->name }}
                        </div>
                    </div>
                    <div class="row py-1">
                        <label>Email</label>
                        <div class="col-10">
                            {{ Auth::guard('admin')->user()->email }}
                        </div>
                    </div>
                    <div class="row py-1">
                        <label>Password</label>
                        <div class="col-10 text-danger fst-italic">
                                password cannot be shown here
                            </div>
                    </div>
                    <div class="row py-1">
                        <label >Position</label>
                        <div class="col-10">
                            {{ Auth::guard('admin')->user()->position }}
                        </div>
                    </div>
                    <div class="row py-1">
                        <label>Expire Date</label>
                        <div class="col-10">
                            {{ Auth::guard('admin')->user()->expire }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
