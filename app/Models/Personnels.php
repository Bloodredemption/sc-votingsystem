<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnels extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'personnels';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        // Add any other columns specific to personnel here
    ];

    // Define relationships or additional methods as needed
}
