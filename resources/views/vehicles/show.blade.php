@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
       Vehicle Info
    </div>
    
    <div class="panel-body"> 
      <div class="menu">
         <a href="{{  url('vehicles') }}" class="btn btn-inverse">Back to all Vehicles</a>
         <a href="{{  url('vehicle/'.$vehicle->id.'/edit') }}" class="btn btn-inverse">Edit Vehicle</a>
         <a href="#" id="btn_print" class="btn btn-default">
            <i class="fa fa-btn fa-print"></i>
         </a>
      </div>
      <br/>

      <table id="print_table" class = "table">
         <tbody>
            <tr>
               <td>First Name</td>
               <td>{{ $vehicle->first_name }}</td>
            </tr>
            
            <tr>
               <td>Last Name</td>
               <td>{{ $vehicle->last_name }}</td>
            </tr>
            <tr>
               <td>Contact Number</td>
               <td>{{ $vehicle->contact_number }}</td>
            </tr>
            <tr>
               <td>Email Address</td>
               <td>{{ $vehicle->email }}</td>
            </tr>
            <tr>
               <td>Manufacturer</td>
               <td>{{ $vehicle->manufacturer }}</td>
            </tr>
            <tr>
               <td>Type</td>
               <td>{{ $vehicle->type }}</td>
            </tr>
            <tr>
               <td>Year</td>
               <td>{{ date('Y', strtotime($vehicle->year)) }}</td>
            </tr>
            <tr>
               <td>Colour</td>
               <td>{{ $vehicle->colour }}</td>
            </tr>
            <tr>
               <td>Mileage</td>
               <td> {{ $vehicle->mileage }} </td>
            </tr>
         </tbody>
      	
      </table>
        
    
   </div>
</div>
@stop