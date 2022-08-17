<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $list = Order::with('user')->get();
        return response()->json([
            'data' => $list
        ]);
        // $list = Order::where('id',$id)->with('user')->first();
        // return response()->json([
        //     'data' => $list
        // ]);
    }
}
