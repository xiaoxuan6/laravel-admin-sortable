<?php

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
        if (!config('admin.extensions.sortableColumn.enable', 'true')) {
            return;
        }

        Column::extend('sortableColumn', SortableColumn::class);

        Sortable::boot();
    }
}