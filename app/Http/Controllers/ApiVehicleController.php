<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Vehicle;
use App\Repositories\VehicleRepository;
use App\Http\Controllers\Controller;
use App\Transformers\VehicleTransformer;
use Session;
use Carbon\Carbon;
use App\Http\Requests\VehicleRequest;
        
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
	public function store(VehicleRequest $request)
	{
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

        return response()->json([
            'message' => 'Successfully added new Vehicle.',
            'status' => 200
        ]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$vehicle = Vehicle::find($id);
        
        if (empty($vehicle)) {
            $vehicle = "No results ";
        }
        
        return response()->json([
            "data" => $vehicle, 
            'status' => 200
        ]);
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

	  	 return response()->json(['message' => 'Successfully updated Vehicle.', 
            'status' => 200
        ]);
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

	 	return response()->json([
            'message' => 'SSuccessfully delted Vehicle.', 
            'status' => 200
        ]);
	}

}
