<?php

namespace Encore\Sortable;

use Encore\Admin\Admin;
use Encore\Admin\Extension;

class Sortable extends Extension
{
    public static function boot(){
        static::registerRoutes();
        Admin::extend('sortableColumn', __CLASS__);
    }

    protected static function registerRoutes(){
        parent::routes(function ($router) {
            $router->post('sortable/{id}', 'Encore\Sortable\SortableController@modify');
        });
    }
}