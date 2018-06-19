<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	/*可填充的字段*/
    protected $fillable = [
        'name', 'description',
    ];
}
