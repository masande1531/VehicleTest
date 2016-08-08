<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\VehicleRequest;
use App\Vehicle;
use App\Repositories\VehicleRepository;
use App\Http\Controllers\Controller;
use Session;
use Carbon\Carbon;
        

class VehicleController extends Controller
{
     /**
     * The vehicles repository instance.
     *
     * @var VehicleRepository
     */
    protected $vehicle;
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(VehicleRepository $vehicle)
    {
        $this->middleware('auth');
        $vehicle->vehicle = $vehicle;
    }
    
    /**
    * Display a list of all of the user's vehicle.
    *
    * @param  Request  $request
    * @return Response
    */
    public function index(VehicleRequest $request)
    {
        $vehicles = $request->user()->vehicle()->get();
        
        return view('vehicles.index', [
            'vehicles' => $vehicles,
        ]);
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
      return view('vehicles.create');
    }
    
    /**
    * Create a new Vehicle.
    *
    * @param  Request  $request
    * @return Response
    */
    public function store(VehicleRequest $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_number' => 'required',
            'email_address' => 'required',
            'manufacturer' => 'required',
            'email_address' => 'required|email',
            'type' => 'required',
            'year' => 'required',
            'colour' => 'required',
            'mileage' => 'required'
        ]);  

        $request->user()->vehicle()->create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'contact_number' => $request->contact_number,
            'email' => $request->email_address,
            'manufacturer' => $request->manufacturer,
            'type' => $request->type,
            'year' => Carbon::create($request->year, 1, 1, 0, 0, 0),
            'colour' => $request->colour,
            'mileage' => $request->mileage
        ]);

        Session::flash('message', 'Successfully added new Vehicle.');            
        return redirect('/vehicles');     
    }
    
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        
        return view('vehicles.show', [
                'vehicle' => $vehicle
            ]
        );
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);

         return view('vehicles.edit', [
                'vehicle' => $vehicle
            ]
        );
    }

    /**
    * Update the given Vehicle.
    *
    * @param  Request  $request
    * @param  Vehicle $vehicle
    * @return Response
    */
    public function update(VehicleRequest $request, Vehicle $vehicle)
    {

        $vehicle->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'contact_number' => $request->contact_number,
            'email' => $request->email_address,
            'manufacturer' => $request->manufacturer,
            'type' => $request->type,
            'year' => Carbon::create($request->year, 1, 1, 0, 0, 0),
            'colour' => $request->colour,
            'mileage' => $request->mileage
        ]);
    
        Session::flash('message', 'Successfully updated Vehicle.');
        return redirect('/vehicles');
    }

    /**
    * Destroy the given Vehicle.
    *
    * @param  Request  $request
    * @param  Vehicle $vehicle
    * @return Response
    */


    public function destroy(Vehicle $vehicle)
    {        
        $vehicle->delete();
        Session::flash('message', 'Successfully delted Vehicle.');
        return  redirect('/vehicles');
    }
   
    
    
}
