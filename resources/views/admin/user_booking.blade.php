@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->name }} Bookings</div>

                <div class="card-body mb-3">
                    <table class="table table-striped" id="tableUserBooking">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Date</td>
                                <td>Time</td>
                                <td>Guest</td>
                                <td>Table</td>
                                <td>Booking At</td>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userBooking as $booking)
                            <tr>
                                <td>{{ $booking->id }}</td>
                                <td>{{ $booking->booking_date }}</td>
                                <td>{{ $booking->booking_time }}</td>
                                <td>{{ $booking->total_guest }}</td>
                                <td>{{ $booking->table_no }}</td> 
                                <td>{{ $booking->created_at }}</td> 
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
    let table = document.getElementById("tableUserBooking");
    let datatable = new DataTable(table);
    
    var order = datatable.order([[ 0, "desc" ]]);

</script>

@endsection
