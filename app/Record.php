<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table = 'records';
    protected $fillable = ['nid', 'password', 'https', 'ip'];
}
