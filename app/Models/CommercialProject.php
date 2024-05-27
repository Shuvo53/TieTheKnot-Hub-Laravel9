<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommercialProject extends Model
{
    use HasFactory;

    protected $table = 'commercial_projects';

    protected $fillable = [
        'projectID', 'title', 'description', 'image'
    ];
}


