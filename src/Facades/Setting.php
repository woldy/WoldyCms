<?php 
namespace Woldy\CMS\Facades;

use Illuminate\Support\Facades\Facade;

class Setting extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cfg';
    }
}