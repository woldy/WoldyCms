<?php
namespace Woldy\Cms\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Request;

class UserModel extends Model
{
    protected $table = 'wcms_user';
    protected $guarded=[];
    public $timestamps = false;
}
