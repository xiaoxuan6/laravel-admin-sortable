<?php
/**
 * This file is part of PHP CS Fixer.
 *
 * (c) vinhson <15227736751@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Encore\Sortable;

use Encore\Admin\{Admin, Extension};

class Sortable extends Extension
{
    public static function boot()
    {
        static::registerRoutes();
        Admin::extend('sortableColumn', __CLASS__);
    }

    protected static function registerRoutes()
    {
        parent::routes(function ($router) {
            $router->post('sortable/{id}', 'Encore\Sortable\SortableController@modify');
        });
    }
}
