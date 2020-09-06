@extends('layouts.app')

@section('content')
<div class="table-responsive container">

    <table class="table table-bordered" style="background-color: #ffb84d;">
    <thead>
        <tr>
        <th class="table-size" scope="col">Image</th>
        <th class="table-size" scope="col">Name</th>
        <th class="table-size" scope="col">Specialist</th>
        <th class="table-size" scope="col">Hospital</th>
        <th class="table-size" scope="col">Details</th>
        <th class="table-size" scope="col">Appointment</th>
        </tr>
    </thead>
    <tbody>
        @foreach($doctors as $doctor)
        <tr>
        <td class="table-size-next"><img class="rounded-circle" src="{{url($doctor->image)}}" style="max-height: 120px; max-width: 120px;"></td>
        <td class="table-size-next"><p>{{$doctor->name}}</p></td>
        <td class="table-size-next">{{$doctor->specialist}}</td>
        <td class="table-size-next">{{$doctor->hospital}}</td>
        <td class="table-size-next">{{$doctor->detail}}</td>
        <td class="table-size-next"><a href="{{ url('appoinment/'.$doctor->id) }}" class="btn btn-success">now</a></td>
        </tr>
        
        @endforeach
    </tbody>
    </table>
</div>
@endsection
