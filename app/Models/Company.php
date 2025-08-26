<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Company extends Model
{
    use HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'address',
    ];

    public function businessUnits()
    {
        return $this->hasMany(BusinessUnit::class);
    }

    public function users()
    {
        return $this->hasMany(user::class);
    }
}
