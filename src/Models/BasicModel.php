<?php
namespace Woldy\Cms\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Request;

class BasicModel extends Model
{
    public $table = 'wcms_models';
    public $timestamps = false;
    protected $guarded=[];

	function __construct($_table='wcms_models'){
		$this->table=$_table;
	}

}

 