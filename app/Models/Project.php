<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function phase(){
        return $this->belongsTo(Phase::class);
    }

    public function mockup(){
        return $this->hasMany(Mockup::class);
    }
}
