<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appliance extends Model
{
    use HasFactory;

    protected $fillable = [
        'appliance_name','appliance_wattage','appliance_consumption','appliance_count','appliance_duration','start_time','end_time','user_id'
    ];
}
