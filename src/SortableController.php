<?php

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