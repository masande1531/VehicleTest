<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Vehicle;
use App\Repositories\VehicleRepository;
use App\Http\Controllers\Controller;
use App\Transformers\VehicleTransformer;
use Session;
use Carbon\Carbon;
        
class ApiVehicleController extends Controller {

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
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$vehicles = $request->user()->vehicle()->get();
        
        return $vehicles;  
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_number' => 'required',
            'email_address' => 'required',
            'manufacturer' => 'required',
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

        $response = [
			'message' => 'Successfully added new Vehicle.'
		];

        return $response;
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

		return $vehicle;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{		
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, Vehicle $vehicle)
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

	  	$response = [				
			'message' => 'Successfully updated Vehicle'
		];
    	
    	return $response;
    		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Vehicle $vehicle)
	{
	 	$vehicle->delete();		

	 	$response = [				
			'message' => 'Successfully delted Vehicle.'
		]; 
		return $response;
	}

}
