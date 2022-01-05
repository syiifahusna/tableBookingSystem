@extends('layouts.adminapp')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8 my-3 text-center">
            <h2>Menu</h2>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddMenu">
                Add Menu
            </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddDish">
                Add Dish
            </button>
        </div>
        <div class="col-md-8 my-auto">
            <div class="col-md-12">
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
                    <ul class="px-0 py-3">
                        <div class="alert alert-danger"  role="alert">
                            @foreach ($errors->all() as $error)
                                <li> {{ $error }}</li>
                            @endforeach
                        </div>
                    </ul>
                @endif 
            </div>
            @foreach($menu as $m)
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    {{ $m->menu_name}}  
                                </div>
                                <div class="col-6 text-end">
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditMenu{{ $m->id }}">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalDeleteMenu{{ $m->id }}">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @php
                                    $menu_id = $m->id;
                                    $filtered = $dishes->filter(function ($dishes) use ($menu_id) {
                                        return ($dishes->menu_id == $menu_id);
                                    });
                                @endphp

                                @foreach($filtered as $dish)
                                    <div class="card col-3 m-3 p-0">
                                        <img src="{{ asset('storage/food/'. $dish->image)}}" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $dish->dish_name }}</h5>
                                            <p class="card-text">
                                                {{ number_format($dish->price, 2) }}
                                                <br>
                                                {{ $dish->desc }}
                                            </p>
                                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditDish{{ $dish->id }}">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalDeleteDish{{ $dish->id }}">
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


<!-- Modal Menu ===========================-->

    <div class="modal fade" id="modalAddMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable ">
            <form method="POST" action="">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="menu_name">Menu Name</label>
                                <input id="menu_name" type="text" class="form-control @error('menu_name') is-invalid @enderror" name="menu_name" value="" autocomplete="menu_name" autofocus>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @foreach($menu as $m)
        <div class="modal fade" id="modalEditMenu{{ $m->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable ">
                <form method="POST" action="{{ route('admin.menu.update', $m->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="menu_name">Menu Name</label>
                                <input id="menu_name" type="text" class="form-control @error('menu_name') is-invalid @enderror" name="menu_name" value="{{ $m->menu_name }}" autocomplete="menu_name" autofocus>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="modal fade" id="modalDeleteMenu{{ $m->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable ">
                <form method="POST" action="{{ route('admin.menu.destroy', $m->id) }}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>      
                        <div class="modal-body">
                            Are You Sure You Want To Delete This Menu?
                            <p class="text-danger">All Dishes Will Also Be Deleted.</p>
                        </div>              
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

<!-- Modal Dish ===========================-->

<div class="modal fade" id="modalAddDish" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable ">
        <form method="POST" action="{{ route('admin.dish.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Dish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="dish_menu">For Menu</label>
                        <select class="form-select" id="dish_menu" name="dish_menu" required>
                            <option selected disabled></option> 
                            @foreach($menu as $m)
                            <option value="{{ $m->id }}">{{ $m->menu_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dish_name">Dish Name</label>
                        <input id="dish_name" type="text" class="form-control @error('dish_name') is-invalid @enderror" name="dish_name" value="" autocomplete="dish_name" autofocus  required>
                    </div>
                    <div class="form-group">
                        <label for="dish_image">Image</label>
                        <input id="dish_image" type="file" class="form-control @error('dish_image') is-invalid @enderror" name="dish_image" value="" autocomplete="dish_image" autofocus  required>
                    </div>
                    <div class="form-group">
                        <label for="dish_price">Price</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">RM</span>
                            </div>
                            <input id="dish_price" type="text" class="form-control @error('dish_price') is-invalid @enderror" name="dish_price" placeholder="0.00" autocomplete="dish_price"  pattern="(^[0-9]{0,2}$)|(^[0-9]{0,2}\.[0-9]{0,5}$)" step="any" maxlength="7" validate="true" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dish_desc">Description</label>
                        <textarea id="dish_desc" class="form-control @error('dish_image') is-invalid @enderror" name="dish_desc"  required></textarea>
                    </div>
                </div>                      
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>


@foreach($dishes as $dish)
    <div class="modal fade" id="modalEditDish{{ $dish->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable ">
            <form method="POST" action="{{ route('admin.dish.update', $dish->id ) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Dish</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="dish_menu">For Menu</label>
                            <select class="form-select" id="dish_menu" name="dish_menu" required>
                                <option disabled></option> 
                                @foreach($menu as $m)
                                <option value="{{ $m->id }}" {{ $m->id == $dish->menu_id ? 'selected' : '' }} > {{ $m->menu_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dish_name">Dish Name</label>
                            <input id="dish_name" type="text" class="form-control @error('dish_name') is-invalid @enderror" name="dish_name" value="{{ $dish->dish_name }}" autocomplete="dish_name" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="dish_image">Image</label>
                            <input id="dish_image" type="file" class="form-control @error('dish_image') is-invalid @enderror" name="dish_image" autocomplete="dish_image" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="dish_price">Price</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">RM</span>
                                </div>
                                <input id="dish_price" type="text" class="form-control @error('dish_price') is-invalid @enderror" name="dish_price" value="{{ number_format($dish->price, 2) }}" placeholder="0.00" autocomplete="dish_price"  pattern="(^[0-9]{0,2}$)|(^[0-9]{0,2}\.[0-9]{0,5}$)" step="any" maxlength="7" validate="true" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dish_desc">Description</label>
                            <textarea id="dish_desc" class="form-control @error('dish_desc') is-invalid @enderror" name="dish_desc"  required>{{ $dish->desc }}</textarea>
                        </div>
                    </div>                      
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>




    <div class="modal fade" id="modalDeleteDish{{ $dish->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable ">
            <form method="POST" action="{{ route('admin.dish.destroy', $dish->id ) }}">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Dish</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>      
                    <div class="modal-body">
                        Are You Sure You Want To Delete This Dish?
                    </div>              
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endforeach


@endsection
