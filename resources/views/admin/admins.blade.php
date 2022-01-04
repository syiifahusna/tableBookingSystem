@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admins') }}</div>

                <div class="card-body mb-3">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
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
                                <td>{{ $admin->expire }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    let table = document.getElementById("tableAdmin");
    let datatable = new DataTable(table);
    
    var order = datatable.order([[ 0, "desc" ]]);

</script>
@endsection
