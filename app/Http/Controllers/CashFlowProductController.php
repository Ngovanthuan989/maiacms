<?php

namespace App\Http\Controllers;

use DB;
use App\Models\CashFolow;
use Illuminate\Http\Request;


class CashFlowProductController extends Controller
{
    public function index ()
    {
        $get_cashfolow = CashFolow::with('product')->get();
        return view('dashboard.cashfolow.show',[
            'get_cashfolow' => $get_cashfolow
        ]);
    }

    public function add()
    {
        $get_product = DB::table('product')->get();
        return view('dashboard.cashfolow.add',[
            'get_product' => $get_product
        ]);
    }

    public function addPost(Request $request)
    {

        $total_input_product_arr = json_encode($request->tien);

        $total_input = 0;

        foreach ($request->tien as $key => $value) {
            $total_input += isset($value) ? str_replace(".", "", $value) : null;
        }

        $money_back   =  isset($request->money_back) ? str_replace(".", "", $request->money_back) : null;
        $ads_costs    =  isset($request->ads_costs) ? str_replace(".", "", $request->ads_costs) : null;
        $other_costs  =  isset($request->other_costs) ? str_replace(".", "", $request->other_costs) : null;

        $gross_profit = $money_back - $total_input - $ads_costs;
        $net_profit   = $money_back - $total_input - $ads_costs - $other_costs;

        $cashFolow = new CashFolow;

        $cashFolow->product_id   = $request->product_id;
        $cashFolow->money_back   = $money_back;
        $cashFolow->ads_costs    = $ads_costs;
        $cashFolow->other_costs  = $other_costs;
        $cashFolow->total_input_product_arr = $total_input_product_arr;
        $cashFolow->total_input_product = $total_input;
        $cashFolow->gross_profit = $gross_profit;
        $cashFolow->net_profit = $net_profit;

        $cashFolow->save();

        if ($cashFolow->wasRecentlyCreated == true) {

            return redirect()->route('dashboard.cashFlowProduct.show')->with('success', 'Thêm chi phí thành công');
        } else {

            return redirect()->route('dashboard.cashFlowProduct.add')->with('error', 'Có lỗi xảy ra');
        }
    }

    public function edit($id)
    {
        $get_product = DB::table('product')->get();

        $get_cashfolow = DB::table('cashfolow')->where([
            'id'=> $id
        ])->first();

        $dot1 = 0;
        $dot2 = 1;
        $dot3 = 2;

        $arr = json_decode($get_cashfolow->total_input_product_arr);

        foreach ($arr as $key => $value) {
            if($dot1 == $key){
                $dot1 = $value;
            }
            if($dot2 == $key){
                $dot2 = $value;
            }
            if($dot3 == $key){
                $dot3 = $value;
            }
        }

        if($dot1 == 0){
            $dot1 = '';
        }
        if($dot2 == 1){
            $dot2 = '';
        }
        if($dot3 == 2){
            $dot3 = '';
        }

        return view('dashboard.cashfolow.edit',[
            'get_cashfolow' => $get_cashfolow,
            'get_product' => $get_product,
            'dot1' => $dot1,
            'dot2' => $dot2,
            'dot3' => $dot3
        ]);
    }

    public function update(Request $request)
    {
        $total_input_product_arr = json_encode($request->tien);

        $total_input = 0;

        foreach ($request->tien as $key => $value) {
            $total_input += isset($value) ? str_replace(".", "", $value) : null;
        }

        $money_back   =  isset($request->money_back) ? str_replace(".", "", $request->money_back) : null;
        $ads_costs    =  isset($request->ads_costs) ? str_replace(".", "", $request->ads_costs) : null;
        $other_costs  =  isset($request->other_costs) ? str_replace(".", "", $request->other_costs) : null;

        $gross_profit = $money_back - $total_input - $ads_costs;
        $net_profit   = $money_back - $total_input - $ads_costs - $other_costs;


        $cashFolow = new CashFolow;

        $cashFolow->product_id   = $request->product_id;
        $cashFolow->money_back   = $money_back;
        $cashFolow->ads_costs    = $ads_costs;
        $cashFolow->other_costs  = $other_costs;
        $cashFolow->total_input_product_arr = $total_input_product_arr;
        $cashFolow->total_input_product = $total_input;
        $cashFolow->gross_profit = $gross_profit;
        $cashFolow->net_profit = $net_profit;

        $update = CashFolow::where('id',$request->get('id'))->update(array(
            'product_id'              => $request->product_id,
            'money_back'              => $money_back,
            'ads_costs'               => $ads_costs,
            'other_costs'             => $other_costs,
            'total_input_product_arr' => $total_input_product_arr,
            'total_input_product' => $total_input,
            'gross_profit' =>$gross_profit,
            'net_profit' => $net_profit
        ));

        if ($update==1) {
            return redirect()->route('dashboard.cashFlowProduct.show')->with('success', 'Cập nhập chi phí thành công');
        } else {

            return redirect()->route('dashboard.cashFlowProduct.add')->with('error', 'Có lỗi xảy ra');
        }

    }
    public function delete(Request $request)
    {
        $delete = DB::table('cashfolow')->where('id', $request->get('id'))->delete();
        if ($delete==1) {
            return response('Xoá thành công!');
        }else{
            return response('Xoá không thành công!',400);
        }
    }

}
