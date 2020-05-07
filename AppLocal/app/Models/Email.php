<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
	protected $connection = 'sis_main_database';
    protected $table = 'emails';
}