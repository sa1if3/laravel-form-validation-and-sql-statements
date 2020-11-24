<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class total_item_cost extends Model
{
    use HasFactory;

	protected $table = 'total_item_cost';

    protected $fillable = [
		'total',

    ];
}
