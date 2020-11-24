<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_cost extends Model
{
    use HasFactory;

	protected $table = 'item_cost';

    protected $fillable = [
        'name',
		'cost',

    ];
}
