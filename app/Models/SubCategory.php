<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory , SoftDeletes;

    function category(){
//'category' aif function name ta j kono akta dhora jabe
        return $this->belongsTo(Category::class);

    }

}
