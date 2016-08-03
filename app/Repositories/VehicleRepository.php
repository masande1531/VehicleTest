<?php

namespace App\Repositories;

use App\Vehicle;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\VehicleRepository;

class VehicleRepository 
{

    /**
     * Get all of the vehicles for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user) 
    {
        return $user->vehicle()
                        ->orderBy('created_at', 'asc')
                        ->get();
    }

}
