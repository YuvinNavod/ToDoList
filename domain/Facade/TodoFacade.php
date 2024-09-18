<?php
namespace domain\Facade;

use domain\Services\TodoService;
use Illuminate\Support\Facades\Facade;

class TodoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return TodoService::class;
    }
}

