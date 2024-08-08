<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Permission\Traits\HasRoles;

class Complaint extends Model
{
    use HasFactory, HasRoles;
    protected $fillable = [
        "user_id",
        "service_id",
        "staff_id",
        "details",
        "status"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }
}
