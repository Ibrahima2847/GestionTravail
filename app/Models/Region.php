<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function departments()
    {
        return $this->hasMany(Department::class);
    }
    use HasFactory;
}
