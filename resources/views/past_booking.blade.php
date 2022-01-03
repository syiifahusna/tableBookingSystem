@extends('layouts.app')

@section('content')
<style>
    .dataTables_wrapper {
        position: relative;
    }

    .dataTables_length,
    .dataTables_filter,
    .dataTables_info,
    .dataTables_paginate {
        display: inline-block;
    }

    .dataTables_filter {
        position: absolute;
        right: 0;
    }

    .dataTables_paginate {
        position: absolute;
        right: 0;
    }

    /*==========button Styling ==========*/
    .paginate_button {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color 0.3s;
        border: 1px solid #ddd;
    }

    .paginate_button.current {
        background-color: #0275d8;
        color: white;
        border: 1px solid #0275d8;
    }
</style>

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