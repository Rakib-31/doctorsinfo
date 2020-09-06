@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-6">
                <img class="rounded-circle text-center" src="{{url($doctor->image)}}" style="max-height: 120px; max-width: 120px;">
                <div class="mt-4">
                    <h3>{{$doctor->name}}</h3>
                    <p>{{$doctor->detail}}</p>
                    <p>Speciality: {{$doctor->specialist}}</p>
                    <p>Gender: Male</p>
                    <p>Hospital: {{$doctor->hospital}}</p>
                    <p>Contact: </p>
                </div>
            </div>
            <div class="col-md-6" style="margin-top: 10%;">
                <h4>Availability:</h4>
                <div class="table-responsive container">
                <table class="table table-bordered">
                    <tr>
                        <th class="table-size" scope="col">Sat</th>
                        <th class="table-size" scope="col">Sun</th>
                        <th class="table-size" scope="col">Mon</th>
                        <th class="table-size" scope="col">Tues</th>
                        <th class="table-size" scope="col">Wed</th>
                        <th class="table-size" scope="col">Thu</th>
                        <th class="table-size" scope="col">Fri</th>
                    </tr>
                    <tr>
                        <td class="table-size" scope="col"></td>
                        <td class="table-size" scope="col">2:00PM-4:00PM</td>
                        <td class="table-size" scope="col"></td>
                        <td class="table-size" scope="col"></td>
                        <td class="table-size" scope="col"></td>
                        <td class="table-size" scope="col">2:00PM-4:00PM</td>
                        <td class="table-size" scope="col"></td>
                    </tr>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
