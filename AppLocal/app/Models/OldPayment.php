<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OldPayment extends Model
{
    protected $connection = 'databaseama';
    protected $table = 'payment';
}
