@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            Admins 
                        </div>
                        @if(Auth::guard('admin')->user()->position == "Manager")
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalAddAdmin">
                                Add Admin
                            </button>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-body mb-3">
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
                        <ul class="px-0">
                            <div class="alert alert-danger"  role="alert">
                                @foreach ($errors->all() as $error)
                                    <li> {{ $error }}</li>
                                @endforeach
                            </div>
                        </ul>
                    @endif
                    <table class="table table-striped" id="tableAdmin">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Position</td>
                                <td>Expire</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admin as $admin)
                            <tr>
                                <td>{{ $admin->id }}</td> 
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->position }}</td>
                                
                                <td
                                @if($admin->expire < date('Y-m-d', time()))
                                    class="text-danger"
                                @endif
                                >{{ $admin->expire }}</td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@if(Auth::guard('admin')->user()->position == "Manager")
    <div class="modal fade" id="modalAddAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable ">
            <form method="POST" action="{{ route('admin.admin.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="dish_name">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" autocomplete="name" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" autocomplete="email" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="email">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" autocomplete="password" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <select class="form-select" id="position" name="position" required>
                                <option selected disabled></option> 
                                <option value="Waiter">Waiter</option>
                                <option value="Cook">Cook</option>
                                <option value="Receptionist">Receptionist</option>
                                <option value="Manager">Manager</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Expire">Expire</label>
                            <input type="date" class="form-control" id="expire" name="expire" required>
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
@endif

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    //datatable
    let table = document.getElementById("tableAdmin");
    let datatable = new DataTable(table);
    let order = datatable.order([[ 0, "desc" ]]);
    
    
    const objDate = new Date();
    //today date
    var year = objDate.getFullYear();
    var month = '' + (objDate.getMonth() + 1);
    var day = ''+ (objDate.getDate() + 1);
    
    if (month.length < 2){
         month = '0' + month;
    }       
    if (day.length < 2){ 
        day = '0' + day;
    }

    expire = document.getElementById("expire");
    expire.setAttribute("min", year+"-"+month+"-"+ day); 

</script>
@endsection
