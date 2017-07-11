<?php
namespace Woldy\Cms\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Request;

class SettingModel extends Model
{
    protected $table = 'wcms_setting';
    public $timestamps = false;
}
