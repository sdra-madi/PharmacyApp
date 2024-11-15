<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Pharmacist;
use App\Models\Recipe_medication;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

use function PHPUnit\Framework\countOf;

class OrderController extends Controller
{
    public function addOrderPharmacists(Request $request)
    {
        // request [id_ph , warehouse_id , all_price , date ,
        // array of (ids of warehouse-detials and quentity)  ]
        // info($request->all());
        $dates = explode("-",$request->order_date); // 8-9-2022 => [8,9,2022]
        info($dates);
        $order = Order::create([
            'id_pharmacist' => $request->id_pharmacist,
            'id_warehouse' => $request->id_warehouse,
            'order_date' => Carbon::createFromDate($dates[2],$dates[1],$dates[0]),
            'price_order' => $request->price_order
        ]);
        $count = 0;
        //  $detials = json_decode($request->detials,true);
        foreach ($request->detials as $detial) {
            $d = Order_detail::create([
                'id_order' => $order->id,
                'id_warehouse_detail' => $detial['ware_id'],
                'quantity' => $detial['quantity']
            ]);
            if (isset($d)) $count++;
        }
        return response()->json([
            'status' => true,
            'msg' => "تمت إضافة $count عنصر الى الطلبية وبإنتظار تأكيد  المسودع"
        ], 200);
    }
    public function orderNotDelivery(Request $request)
    {
        $orderList=Order::join('warehouses','orders.id_warehouse','=','warehouses.id')
        ->where('orders.id_pharmacist',$request->id_ph)
        ->where('orders.isdelivered',0)
        ->get(['orders.id','orders.order_date','orders.price_order','warehouses.name']);
        if(count($orderList)!==0)
        {return response()->json(['status'=>'ok','orders'=>$orderList]);}
        else
        {
            return response()->json(['status'=>'faild','msg'=>'لا يوجد طلبيات غير مؤكدة','orders'=>$orderList]);
        }
    }
    public function orderDeliver(Request $request)
    {
        $orderlist=Order::join('warehouses','orders.id_warehouse','=','warehouses.id')
        ->where('orders.id_pharmacist',$request->id_ph)
        ->where('orders.isdelivered',1)
        ->get(['orders.id','orders.order_date','orders.price_order','warehouses.name']);
        if(count($orderlist)!==0)
        {return response()->json(['status'=>'ok','orders'=>$orderlist]);}
        else
        {return response()->json(['status'=>'faild','msg'=>'لا يوجد طلبيات سابقة','orders'=>$orderlist]); }
    }
    public function detailOrder(Request $request)
    {
        $order=Order::join('order_details','order_details.id_order','=','orders.id')
        ->join('warehouse_details','order_details.id_warehouse_detail','=','warehouse_details.id')
        ->join('recipe_medications','warehouse_details.id_recipe_medication','=','recipe_medications.id')
        ->join('medications','recipe_medications.id_medication','=','medications.id')
        ->where('order_details.id_order',$request->id_o)
        ->get(['order_details.quantity','medications.name']);
        return response()->json(['status'=>'ok','details'=>$order]);
    }
    public function deleteOrder(Request $request)
    {
        $orderdetail=Order_detail::where('order_details.id_order',$request->id_o)->delete();
        $order=Order::where('orders.id',$request->id_o)->delete();
        return response()->json(['status'=>'ok','msg'=>'تم حذف الطلبية بنجاح']);;
    }
    public function updateOrder(Request $request)
    {
        $order=Order::where('orders.id',$request->id_o)->first();
        $orderdetail=Order_detail::where('order_details.id_order',$request->id_o)->first();
        $order->price_order=$request->price_order;
        $orderdetail->id_warehouse_detail=$request->id_warehouse_detail;
        $orderdetail->quantity=$request->quantity;
        $order->save();
        $orderdetail->save();
        return response()->json(['status'=>'ok','msg'=>'تم تعديل الطلبية بنجاح']);
    }


}
