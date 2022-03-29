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

use Encore\Admin\Grid\Column;
use Illuminate\Support\ServiceProvider;

class SortableServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        if (! config('admin.extensions.sortableColumn.enable', 'true')) {
            return;
        }

        Column::extend('sortableColumn', SortableColumn::class);

        Sortable::boot();
    }
}
