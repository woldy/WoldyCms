<?php 
namespace Woldy\CMS\Facades;

use Illuminate\Support\Facades\Facade;

class Test2 extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'test2';
    }
}