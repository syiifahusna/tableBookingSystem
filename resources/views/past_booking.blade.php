@extends('layouts.app')

@section('content')

<div class="container p-3">
    <h1 class="text-center">Past Booking</h1>
    <table class="table table-striped" id="tablePastBooking">
        <thead>
            <tr>
                <td>ID</td>
                <td>Date</td>
                <td>Time</td>
                <td>Booking At</td>
                <td>Option</td>
            </tr>
        </thead>
        <tbody>
            @foreach($pastBooking as $booking)
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->booking_date }}</td> 
                <td>{{ $booking->booking_time }}</td>
                <td>{{ $booking->created_at }}</td> 
                <td>
                    <a href="{{ route('booktable.show',  $booking->id) }}" class="btn btn-primary">More</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    let table = document.getElementById("tablePastBooking");
    let datatable = new DataTable(table);
    
    var order = datatable.order([[ 0, "desc" ]]);

</script>
@endsection