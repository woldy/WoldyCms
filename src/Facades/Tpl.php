<?php 
namespace Woldy\CMS\Facades;

use Illuminate\Support\Facades\Facade;

class Tpl extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'tpl';
    }
}