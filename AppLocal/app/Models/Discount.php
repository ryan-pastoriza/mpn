<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    
	protected $connection = 'acs';
    protected $table = 'discount';
}
