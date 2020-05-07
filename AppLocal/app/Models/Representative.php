<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Representative extends Model
{
    protected $table = 'representative';
    // protected $fillable = array(
    // 	'rep_fullname', 
    // 	'rep_address', 
    // 	'rep_relation',
    // 	'rep_id_presented',
    // 	'rep_email_address',
    // 	'rep_contact_num'
    // );

    protected $fillable = [
        'rep_fullname','rep_address','rep_relation','rep_id_presented','rep_email_address','rep_contact_num'
    ];
}
