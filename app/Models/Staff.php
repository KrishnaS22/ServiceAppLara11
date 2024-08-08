<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Traits\HasRoles;

class Staff extends Model
{
    use HasFactory, HasRoles;
    protected $fillable = [
        "user_id",
        "service_id"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
    public function complaints(): HasMany
    {
        // Assuming 'staff_id' is the foreign key in the 'complaints' table
        return $this->hasMany(Complaint::class, 'staff_id');
    }
}
