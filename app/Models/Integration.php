<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integration extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if it matches the default naming convention)
    protected $table = 'integrations';

    // Mass assignable attributes
    protected $fillable = [
        'client_number',       // Name of the uploaded file
        'integration_type',       // Path where the file is stored
        'parameters_json',          // Status of the integration (e.g., "pending", "verified", "completed", "failed")
        'created_at',      // Timestamp of when the integration was created
        'updated_at',      // Timestamp of when the integration was last updated
    ];
    protected $casts = [
        'parameters_json' => 'array',
    ];

    // Define any relationships, if needed (e.g., belongsTo, hasMany)
}
