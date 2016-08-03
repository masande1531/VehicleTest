@extends('layouts.app')

@section('content')

 
<h1> Welcome {{ Auth::user()->name }} {{ Auth::user()->last_name }}</h1>
<!-- Display Alerts -->
@include('common.alerts')    
<div class="panel panel-default">
    <div class="panel-heading">
        Current Vehicles
    </div>

    <div class="panel-body">
        <a href="{{ url('vehicle/create') }}" class="btn btn-default btn-sm">
            <i class="fa fa-btn fa-plus"></i> Add New Vehicle
        </a>
        <br/>
        @if (count($vehicles) > 0)
            <table class="table table-striped task-table">

                <!-- Table Headings -->
                <thead>
                    <th>First Name</th>
                    <th> Vehicle</th>
                    <th>Date registered</th>
                    <th colspan="2">&nbsp;</th>
                </thead>

                <!-- Table Body -->
                <tbody>
                    @foreach ($vehicles as $vehicle)
                        <tr>                              
                            <td class="table-text">
                                <div>{{ $vehicle->first_name }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $vehicle->manufacturer }} {{ $vehicle->type }}</div>
                            </td>
                            <td class="table-text">                      
                                <div>{{ date('d-M-Y', strtotime($vehicle->created_at)) }}</div>
                            </td>
                             <!-- Delete Button -->
                            <td>
                                <a href="{{ url('/vehicle/show/'.$vehicle->id) }}" >
                                   view
                                </a>
                            </td>
                            <td>
                                <a href="{{ url('/vehicle/'.$vehicle->id.'/edit') }}" >
                                    edit
                                </a>
                            </td>
                            <td>
                                <form class="delete" action="{{ url('vehicle/'.$vehicle->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" id="delete-vehicle-{{ $vehicle->id }}" class="btn btn-danger">
                                       delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                 
                    @endforeach                       
                </tbody>
            </table>
        @else
            <div class="text-center">No Vehicles</span>
        @endif   
    </div>
</div>
   
@endsection