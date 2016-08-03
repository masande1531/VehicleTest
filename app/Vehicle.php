<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vehicles';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'contact_number', 'email',
        'manufacturer', 'type', 'year', 'colour', 'mileage'
        ];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'int',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function YearModel()
    {
        return Carbon::createFromFormat('Y', $this->year);
    }
    
    public function DateCreated()
    {
        return Carbon::createFromFormat('Y-m-d', $this->created_at);
    }
}
