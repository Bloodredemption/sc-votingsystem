<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'elections';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'electionTitle',
        'schoolyear',
        'department',
        'startDate',
        'endDate',
        'status',
        'personnel_id',
    ];

    // Define relationships or additional methods as needed
}
