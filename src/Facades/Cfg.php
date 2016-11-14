<?php 
namespace Woldy\CMS\Facades;

use Illuminate\Support\Facades\Facade;

class Cfg extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cfg';
    }
}