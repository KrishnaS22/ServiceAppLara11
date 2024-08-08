<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Traits\HasRoles;

class Service extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        "service",
        "status"
    ];

    public function staffs(): HasMany
    {
        return $this->hasMany(Staff::class);
    }
}
