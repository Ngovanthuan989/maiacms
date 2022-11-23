<?php

namespace App\Http\Controllers;

use DB;
use App\Models\OperatingCosts;
use Illuminate\Http\Request;

class OperatingCostsController extends Controller
{
    public function index()
    {
        $get_operating_costs = DB::table('operating_costs')->get();
        return view('dashboard.operatingcosts.show',[
            'get_operating_costs' => $get_operating_costs
        ]);
    }

    public function add(Request $request)
    {
        return view('dashboard.operatingcosts.add');
    }

    public function edit($id)
    {
        $get_operating_costs = DB::table('operating_costs')->where([
            'id'=> $id
        ])->first();
        return view('dashboard.operatingcosts.edit',[
            'get_operating_costs' => $get_operating_costs
        ]);
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

    public function update(Request $request)
    {
        $cost   =  isset($request->cost) ? str_replace(".", "", $request->cost) : null;

        $name = $request->name;

        $update = OperatingCosts::where('id',$request->get('id'))->update(array(
            'name'              => $name,
            'cost'              => $cost,
        ));

        if ($update==1) {
            return redirect()->route('dashboard.operatingCosts.show')->with('success', 'Cập nhập chi phí thành công');
        } else {

            return redirect()->route('dashboard.operatingCosts.add')->with('error', 'Có lỗi xảy ra');
        }

    }

    public function delete(Request $request)
    {
        $delete = DB::table('operating_costs')->where('id', $request->get('id'))->delete();
        if ($delete==1) {
            return response('Xoá thành công!');
        }else{
            return response('Xoá không thành công!',400);
        }
    }
}
