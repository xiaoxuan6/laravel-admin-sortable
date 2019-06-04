<?php

namespace Encore\Sortable;

use Encore\Admin\Admin;
use Encore\Admin\Grid;
use Encore\Admin\Grid\Column;
use Encore\Admin\Grid\Displayers\AbstractDisplayer;

class SortableColumn extends AbstractDisplayer
{
    public function display($table = '')
    {
        Admin::script($this->script());

        return <<<EOT
<div class="btn-group">
    <button type="button" class="btn btn-xs btn-default {$this->grid->getGridRowName()}-orderable" data-id="{$this->getKey()}" data-table="{$table}" data-direction="top">
        <!--<i class="fa fa-caret-up fa-fw"></i>-->置顶
    </button>
    <button type="button" class="btn btn-xs btn-default {$this->grid->getGridRowName()}-orderable" data-id="{$this->getKey()}" data-table="{$table}" data-direction="up">
        <!--<i class="fa fa-caret-up fa-fw"></i>-->上移
    </button>
    <button type="button" class="btn btn-xs btn-default {$this->grid->getGridRowName()}-orderable" data-id="{$this->getKey()}" data-table="{$table}" data-direction="down">
        <!--<i class="fa fa-caret-down fa-fw"></i>-->下移
    </button>
    <button type="button" class="btn btn-xs btn-default {$this->grid->getGridRowName()}-orderable" data-id="{$this->getKey()}" data-table="{$table}" data-direction="end">
        <!--<i class="fa fa-caret-down fa-fw"></i>-->置尾
    </button>
</div>

EOT;
    }

    protected function script()
    {
        return <<<EOT

$('.{$this->grid->getGridRowName()}-orderable').on('click', function() {

    var key = $(this).data('id');
    var direction = $(this).data('direction');
    var table = $(this).data('table');

    $.post('sortable/' + key, {_method:'post', _token:LA.token, sortable:direction, table:table}, function(data){
        if (data.status) {
            $.pjax.reload('#pjax-container');
            toastr.success(data.message);
        }
    });

});
EOT;
    }

}