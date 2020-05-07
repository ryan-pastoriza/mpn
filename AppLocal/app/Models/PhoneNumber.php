<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
	protected $connection = 'sis_main_database';
    protected $table = 'phone_numbers';
}