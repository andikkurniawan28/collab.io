<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\Phase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setup extends Model
{
    use HasFactory;

    public static function init(){
        $data["phase"] = Phase::all();
        $data["customer"] = Customer::select(["id", "name", "company"])->get();
        return $data;
    }
}
