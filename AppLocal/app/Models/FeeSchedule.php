<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeSchedule extends Model
{
    protected $connection = 'acs';
    protected $table = 'fee_schedule';
}
