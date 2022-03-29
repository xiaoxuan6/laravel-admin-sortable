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

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SortableController extends Controller
{
    public function modify(Request $request, $id)
    {
        $request->input('table')::where('id', $id)->first()->move($request->input('sortable'));

        return ['status' => 1, 'message' => '操作成功'];
    }
}
