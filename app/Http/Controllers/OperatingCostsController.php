<?php

namespace App\Http\Controllers;

use DB;
use App\Models\OperatingCosts;
use Illuminate\Http\Request;

class OperatingCostsController extends Controller
{
    public function index()
    {

    }

    public function add(Request $request)
    {
        return view('dashboard.operatingcosts.add');
    }

    public function addPost(Request $request)
    {
        $cost   =  isset($request->cost) ? str_replace(".", "", $request->cost) : null;

        $name = $request->name;

        $operatingCosts = new OperatingCosts;

        $operatingCosts->cost   = $cost;
        $operatingCosts->name   = $name;

        $operatingCosts->save();

        if ($operatingCosts->wasRecentlyCreated == true) {

            return redirect()->route('dashboard.operatingCosts.show')->with('success', 'Thêm chi phí thành công');
        } else {

            return redirect()->route('dashboard.operatingCosts.add')->with('error', 'Có lỗi xảy ra');
        }

    }
}
