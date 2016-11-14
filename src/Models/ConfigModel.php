<?php
namespace Woldy\Cms\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Request;

class ConfigModel extends Model
{
    protected $table = 'wcms_config';
    public $timestamps = false;
}

 