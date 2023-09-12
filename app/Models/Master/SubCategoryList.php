<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoryList extends Model
{
    use HasFactory;

    
    protected $primaryKey = 'id';
    protected $table = 'master_subCategory_activity';
}
