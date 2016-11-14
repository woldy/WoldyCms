<?php 
namespace Woldy\CMS\Facades;

use Illuminate\Support\Facades\Facade;

class User extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'user';
    }
}