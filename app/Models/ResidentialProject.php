<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidentialProject extends Model
{
    use HasFactory;

    protected $table = 'residential_projects';

    protected $fillable = [
        'projectID', 'title', 'description', 'image'
    ];
}
