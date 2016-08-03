<?php

namespace App\Policies;

use App\User;
use App\Vehicle;
use Illuminate\Auth\Access\HandlesAuthorization;

class VehiclePolicy
{
    use HandlesAuthorization;

    /**
   * Determine if the given user can delete the given task.
   *
   * @param  User  $user
   * @param  Vehicle  $vehicle
   * @return bool
   */
    public function destroy(User $user, Vehicle $vehicle)
    {
        $this->authorize('destroy', $vehicle);
        return $user->id === $vehicle->user_id;
    }
    
}
