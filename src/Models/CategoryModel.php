<?php
namespace Woldy\Cms\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Request;

class CategoryModel extends Model
{
    protected $table = 'wcms_category';
    public $timestamps = false;
    protected $guarded=[];
}

 