@extends('layouts.app')

@section('content')
<style>
    .table{
        background-color: #6c757d;
        color: #f7f7f7;
    }
    .table:hover{
        background-color: #f7f7f7;
        color: #6c757d;
    }
    
    .active{
        background-color: #f7f7f7;
        color: #6c757d;
    }

</style>

<div class="container-fluid p-3">
    <h1 class="text-center">Book a Table</h1>
    <div class="container text-center">
        <div class="card">
            <div class="card-body">
                @if($errors->any()) 
                    <ul>
                        <div class="alert alert-danger"  role="alert">
                            @foreach ($errors->all() as $error)
                                <li> {{ $error }}</li>
                            @endforeach
                        </div>
                    </ul>
                @endif  
                <form method="POST" action="{{ route('booktable.store') }}">
                    @csrf
                    <div class="form-group">
                        <h5 class="card-title">Booking Date</h5>
                        <input type="date" class="form-control w-25 m-auto" id="bookingDate" name="bookingDate" required>
                    </div>
                    <div class="form-group">
                        <h5 class="card-title">Booking Time</h5>
                        <select id="bookingTime" name="bookingTime" class="form-control w-25 m-auto"  required>
                            <option value="8">08.00 am</option>
                            <option value="9">09.00 am</option>
                            <option value="10">10.00 am</option>
                            <option value="11">11.00 am</option>
                            <option value="12">12.00 pm</option>
                            <option value="13">01.00 pm</option>
                            <option value="14">02.00 pm</option>
                            <option value="15">03.00 pm</option>
                            <option value="16">04.00 pm</option>
                            <option value="17">05.00 pm</option>
                            <option value="18">06.00 pm</option>
                            <option value="19">07.00 pm</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <h5 class="card-title">Total Guest</h5>
                        <input type="number" class="form-control w-25 m-auto" name="totalGuest" id="totalGuest" value="1" max="6" min="1" required>
                    </div>
                    <div class="form-group">
                        <h5 class="card-title">Table</h5>
                        <div class="container w-75 bg-dark p-3 rounded">
                            <div class="table w-25 p-5 m-3 d-inline-block active">Table 1</div>
                            <div class="table w-50  p-5 m-3 d-inline-block">Table 2</div>
                            <div class="table w-50 p-5 m-3 d-inline-block">Table 3</div>
                            <div class="table w-25  p-5 m-3 d-inline-block">Table 4</div>
                            <div class="table w-75 p-5 m-3 d-inline-block">Table 5</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h5 class="card-title">Table No</h5>
                        <input type="text" class="form-control w-25 m-auto" id="tableNo" name="tableNo" readonly  required>
                    </div>
                    <div class="form-group">
                        <br>
                        <input type="submit" class="btn btn-primary" value="Book Table">
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>





<script>
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

    bookingDate = document.getElementById("bookingDate");
    bookingDate.setAttribute("min", year+"-"+month+"-"+ day); 

    //14 days from today
    var lastDayBooking = (objDate.getDate() + 14);
    if (lastDayBooking.length < 2){ 
        lastDayBooking = '0' + lastDayBooking;
    }
    bookingDate.setAttribute("max", year+"-"+month+"-"+ lastDayBooking); 

    //select table
    let selectedTable = document.getElementById("tableNo");
    let table = document.getElementsByClassName("table");
    for(i=0;i<table.length;i++){
        table[i].addEventListener("click",function(){
            let current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            selectedTable.value = this.innerText;
            this.className += " active";
        });
    }
</script>
@endsection