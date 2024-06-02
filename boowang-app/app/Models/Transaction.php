<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Monurakkaya\Lucg\HasUniqueCode;
use Monurakkaya\Lucg\Traits\HasUniqueCode as TraitsHasUniqueCode;

class Transaction extends Model
{
    use HasFactory;
    use TraitsHasUniqueCode;

    protected $guarded = ['id'];

    protected $with = ['user', 'place'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
