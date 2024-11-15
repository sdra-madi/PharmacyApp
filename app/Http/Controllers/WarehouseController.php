<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Company_warehouse;
use App\Models\Favorite;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Models\Favorite_warehouse;
use App\Models\Recipe_medication;
use App\Models\Medication;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Pharmacist;
use App\Models\Warehouse_detail;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class WarehouseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getallwarehouses(Request $request)
    {
     $pharmacist=Pharmacist::where('pharmacists.id',$request->id_ph)->get('pharmacists.city');
     $ware=Warehouse::where('warehouses.city',$pharmacist[0]->{'city'})
     ->get(['id','name','name_ofresponse', 'phone_number_call','phone_number_land',
        'phone_number_whatsup','worktime_from', 'worktime_to','workdayes',
         'city', 'photo',]);
     if(count($pharmacist)==0)
     {
        return response()->json(['status'=>'faild','msg'=>' id لا يوجد صيدلاني بهذه','data'=>$pharmacist]);
     }
     if(count($ware)==0)
     {return response()->json(['status'=>'faild','data'=>$ware]); }
     else
     { return response()->json(['status'=>'ok','data'=>$ware]);}
    }
    public function getdetailsofwarehouse(Request $request)
    {
        $detail=DB::table('warehouses')->select('name','name_ofresponse', 'phone_number_call', 'phone_number_land',
         'phone_number_whatsup','worktime_from','worktime_to','workdayes','city','photo')->where('id',$request->id_w)->get();
          if(count($detail)==0)
         { return response()->json(['status'=>'faild','data'=>$detail]);}
         else{ return response()->json(['status'=>'ok','data'=>$detail]); }
    }
    public function getwarehouseinfav(Request $request)
    {
        $fav=Favorite_warehouse::join('favorites','favorite_warehouses.favorite_id','=','favorites.id')
        ->where('favorite_warehouses.id_warehouse',$request->id_w)
        ->where('favorites.id_pharmacy',$request->id_ph)
        ->get('favorite_warehouses.id_warehouse');
        if(count($fav)==0)
        {return response()->json(['status'=>'ok','data'=>'غير موجود بالمفضلة']);}
        else{return response()->json(['status'=>'ok','data'=>' موجود بالمفضلة']);}
    }
    public function getcompany(Request $request)
    {
         $fav=Favorite_warehouse::join('favorites','favorite_warehouses.favorite_id','=','favorites.id')
            ->where('favorite_warehouses.id_warehouse',$request->id_w)
            ->where('favorites.id_pharmacy',$request->id_ph)
            ->get('favorite_warehouses.id_warehouse');
            if(count($fav)==0)
            {$fav=false;}
            else{$fav=true;}
        $c=Company_warehouse::join('warehouses','company_warehouses.id_warehouses','=','warehouses.id')
        ->join('companies','company_warehouses.id_companies','=','companies.id')
        ->where('company_warehouses.id_warehouses',$request->id_w)
        ->get(['companies.id','companies.name','companies.photo']);
        if(count($c)==0)
        {
            return response()->json(['status'=>'faild','msg'=>'لا يوجد شركات مرتبطة بالمستودع',
            'data'=>$c,'fav'=>$fav]);
        }
        else
        {

            return response()->json(['status'=>'ok','data'=>$c,'fav'=>$fav]);
        }
    }
    public function showdiscount(Request $request)
    {
        $pharmacist=Pharmacist::where('pharmacists.id',$request->id_ph)->get('pharmacists.city');
        if(count($pharmacist)==0)
      {
        return response()->json(['status'=>'faild','msg'=>' id لا يوجد صيدلاني بهذه','data'=>null]);
      }

        $discount=Recipe_medication::join('medications','recipe_medications.id_medication','=','medications.id')
        ->join('warehouse_details','recipe_medications.id','=','warehouse_details.id_recipe_medication')
        ->join('warehouses','warehouses.id','=','warehouse_details.id_warehouse')
        ->where('warehouses.city',($pharmacist[0]->{'city'}))
          ->whereIn('warehouse_details.discount_type',[0,1])

        // ->orderBy('warehouses.name')
        ->get(['medications.id','medications.name','medications.classification','medications.classification_detail',
        'recipe_medications.pharmacist_price','recipe_medications.expiry_date','warehouse_details.discount_type'])  ;
       if(count($discount)!=0)
        {
            foreach($discount as $m)
            {
                if($m->{'discount_type'}==0)
            {
            $d=Warehouse_detail::join('warehouses','warehouse_details.id_warehouse','=','warehouses.id')
            ->join('recipe_medications','warehouse_details.id_recipe_medication','=','recipe_medications.id')
            ->join('medications','recipe_medications.id_medication','=','medications.id')
            ->where('medications.name',$m->{'name'})
            ->where('recipe_medications.expiry_date',$m->{'expiry_date'})
            ->get(['warehouse_details.discount_per','warehouse_details.discount','warehouse_details.discount_num','warehouse_details.id','warehouses.name','warehouse_details.id_warehouse']);
            $m->{'discount_per'}=$d[0]->{'discount_per'};
             $m->{'discount'}=$d[0]->{'discount'};
            $m->{'discount_num'}=$d[0]->{'discount_num'} ;
            $m->{'warehouse_details_id'}=$d[0]->{'id'};
              $m->{'warehouse_id'}=$d[0]->{'id_warehouse'};
            $m->{'warehouses_name'}=$d[0]->{'name'};
            }
            elseif($m->{'discount_type'}==1)
            {
                $d=Warehouse_detail::join('warehouses','warehouse_details.id_warehouse','=','warehouses.id')
                ->join('recipe_medications','warehouse_details.id_recipe_medication','=','recipe_medications.id')
                ->join('medications','recipe_medications.id_medication','=','medications.id')
                ->where('medications.name',$m->{'name'})
                ->where('recipe_medications.expiry_date',$m->{'expiry_date'})
                ->get(['warehouse_details.discount_per','warehouse_details.discount','warehouse_details.discount_num','warehouse_details.id','warehouses.name','warehouse_details.id_warehouse']);
                $m->{'discount_per'}=$d[0]->{'discount_per'};
                $m->{'discount'}=$d[0]->{'discount'};
                $m->{'discount_num'}=$d[0]->{'discount_num'} ;
                $m->{'warehouse_details.id'}=$d[0]->{'id'};
                $m->{'warehouse_id'}=$d[0]->{'id_warehouse'};
                $m->{'warehouses_name'}=$d[0]->{'name'};
            }
            }
             foreach($discount as $m)
            {
            $f=Favorite::join('favorite_phmedications','favorites.id','=','favorite_phmedications.favorite_id')
            ->where('favorites.id_pharmacy',$request->id_ph)
            ->where('favorite_phmedications.id_medication', $m->{'id'})
            ->get('favorites.id');
               if(count($f)==0)
               {$m->{'fav'}=false;}
               else
               {$m->{'fav'}=true;}
            }
            return response()->json(['status'=>'ok','data'=>$discount]);
        }
        else
        {return response()->json(['status'=>'ok','data'=>'لا توجد حسومات']);}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate(
            [
                'phone_number_call' => 'required|numeric|min:10',
                'password' => 'required',
            ]
        );
        $user = Warehouse::where('phone_number_call', $request->phone_number_call)->first();
        $u = Warehouse::where('phone_number_call', $request->phone_number_call)
            ->where('password', $request->password)
            ->get('id');
        if ($user) {
            $id = ($u[0]->{'id'});
            session(['id_w' => $id]);
            $company = Company_warehouse::join('warehouses', 'company_warehouses.id_warehouses', '=', 'warehouses.id')
                ->join('companies', 'company_warehouses.id_companies', '=', 'companies.id')
                ->where('company_warehouses.id_warehouses', session('id_w'))
                ->get(['companies.id', 'companies.name', 'companies.photo']);
            return view('pages.main', compact('company'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string',
                'name_ofresponse' => 'required|string',
                'city' => 'required',
                'worktime_from' => 'required',
                'worktime_to' => 'required',
                'workdayes' => 'required',
                'phone_number_call' => 'required|unique:warehouses|numeric|min:10',
                'phone_number_whatsup' => 'required',
                'phone_number_land' => 'required',
                'license_number' => 'required|unique:warehouses',
                'photo' => 'required',
                'password' => 'required',
            ]
        );
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $destination_path = 'public/images/warehouses';
            $name = time(); // time in seconds
            $ext = $photo->getClientOriginalExtension(); // jpg , png
            $finalName = "$name.$ext";
            $photo->storeAs($destination_path, $finalName);
            $path = "/storage/images/warehouses/$finalName";
            info($path);
        }
        $user = Warehouse::create(
            [
                'name' => $request->name,
                'name_ofresponse' => $request->name_ofresponse,
                'city' => $request->city,
                'worktime_from' => $request->worktime_from,
                'worktime_to' => $request->worktime_to,
                'workdayes' => $request->workdayes,
                'phone_number_land' => $request->phone_number_land,
                'phone_number_whatsup' => $request->phone_number_whatsup,
                'phone_number_call' => $request->phone_number_call,
                'license_number' => $request->license_number,
                'photo' => $path,
                'password' => $request->password,
            ]
        );
        if ($user) {
            $u = Warehouse::where('phone_number_call', $request->phone_number_call)
                ->where('password', $request->password)
                ->get('id');
            $id = ($u[0]->{'id'});
            session(['id_w' => $id]);
            $company = Company_warehouse::join('warehouses', 'company_warehouses.id_warehouses', '=', 'warehouses.id')
                ->join('companies', 'company_warehouses.id_companies', '=', 'companies.id')
                ->where('company_warehouses.id_warehouses', session('id_w'))
                ->get(['companies.id', 'companies.name', 'companies.photo']);
            return view('pages.main', compact('company'));
        }
    }
    public function displaymed()
    {
        $med = Recipe_medication::join('warehouse_details', 'recipe_medications.id', '=', 'warehouse_details.id_recipe_medication')
            ->join('medications', 'recipe_medications.id_medication', '=', 'medications.id')
            ->join('warehouses', 'warehouse_details.id_warehouse', '=', 'warehouses.id')
            ->where('warehouses.id', session('id_w'))
            ->get(['recipe_medications.id', 'medications.name', 'medications.photo']);
        return view('pages.display', compact('med'));
    }
    public function displaydetailmed($id_m)
    {
        $mede = Recipe_medication::join('medications', 'recipe_medications.id_medication', '=', 'medications.id')
            ->join('warehouse_details', 'recipe_medications.id', '=', 'warehouse_details.id_recipe_medication')
            ->join('warehouses', 'warehouse_details.id_warehouse', '=', 'warehouses.id')
            ->where('recipe_medications.id', $id_m)
            ->get([
                'recipe_medications.id', 'medications.name', 'medications.photo', 'warehouse_details.quantity', 'medications.classification_detail', 'medications.classification', 'recipe_medications.expiry_date', 'recipe_medications.pharmacist_price', 'warehouse_details.discount_type'
            ]);
        if ($mede[0]->{'discount_type'} == 0 || $mede[0]->{'discount_type'} == 1) {
            $mede[0]->{'dis'} = 'نعم';
        } else {
            $mede[0]->{'dis'} = 'لا';
        }
        return view('pages.display2', compact('mede'));
        // return $mede;
    }
    public function deletemed($id_m)
    {
        $m = Recipe_medication::join('warehouse_details', 'recipe_medications.id', '=', 'warehouse_details.id_recipe_medication')
            ->join('warehouses', 'warehouse_details.id_warehouse', '=', 'warehouses.id')
            ->where('recipe_medications.id', $id_m)
            ->where('warehouse_details.id_warehouse', session('id_w'))
            ->get('warehouse_details.id');
        if (count($m) !== 0) {
            $meddelet = Warehouse_detail::where('id', ($m[0]->{'id'}))->delete();
            $med = Recipe_medication::join('warehouse_details', 'recipe_medications.id', '=', 'warehouse_details.id_recipe_medication')
                ->join('medications', 'recipe_medications.id_medication', '=', 'medications.id')
                ->join('warehouses', 'warehouse_details.id_warehouse', '=', 'warehouses.id')
                ->where('warehouses.id', session('id_w'))
                ->get(['recipe_medications.id', 'medications.name', 'medications.photo']);
            return view('pages.display', compact('med'))
                ->with('message_sent', 'Your Medicien has been added successfully!');
        }
    }
    public function displaycompany()
    {
        $company = Company::distinct()->join('company_warehouses', 'company_warehouses.id_companies', '=', 'companies.id')
            ->join('warehouses', 'company_warehouses.id_warehouses', '=', 'warehouses.id')
            ->where('company_warehouses.id_warehouses', session('id_w'))
            ->get(['companies.id', 'companies.name', 'companies.photo']);
        session()->forget('medarrayid');
        session()->forget('medarrayquantity');
        session()->forget('medarrayname');
        session()->forget('medarrayprice');;
        return view('pages.main', compact('company'));
    }
    public function displaymedcompany($id_c)
    {
        $medcompany = Medication::join('companies', 'medications.id_company', '=', 'companies.id')
            ->join('recipe_medications', 'recipe_medications.id_medication', '=', 'medications.id')
            ->where('companies.id', $id_c)
            ->get(['recipe_medications.id', 'medications.name', 'medications.photo']);
        return view('pages.shope', compact('medcompany'));
    }
    public function addorder($id_rm)
    {
        $med = Recipe_medication::join('medications', 'recipe_medications.id_medication', '=', 'medications.id')
            ->join('companies', 'medications.id_company', '=', 'companies.id')
            ->where('recipe_medications.id', $id_rm)
            ->get([
                'medications.id_company', 'medications.name', 'medications.photo', 'medications.classification', 'medications.classification_detail',
                'recipe_medications.expiry_date', 'recipe_medications.id'
            ]);
        return view('pages.add', compact('med'));
    }
    public function addmedone(Request $request, $id_rme)
    {
        $id = $id_rme;
        $med = Recipe_medication::join('medications', 'recipe_medications.id_medication', '=', 'medications.id')
            ->where('recipe_medications.id', $id)
            ->get(['medications.name', 'recipe_medications.warehouse_price']);
        $quantity = $request->number;
        session()->push('medarrayid', $id);
        session()->push('medarrayquantity', $quantity);
        session()->push('medarrayname', $med[0]->{'name'});
        session()->increment('medarrayprice', $med[0]->{'warehouse_price'});
        return back()->with('message_sent', 'تم اضافة الدواء الى السلة');
    }
    public function viewcart()
    {
        $medarrayid = session('medarrayid');
        $medarrayquantity = session('medarrayquantity');
        $id = session()->pull('medarrayid');
        $price = session()->pull('medarrayprice');
        $med = Recipe_medication::join('medications', 'recipe_medications.id_medication', '=', 'medications.id')
            ->join('companies', 'medications.id_company', '=', 'companies.id')
            ->where('recipe_medications.id', $id[0])
            ->get('companies.id');
        $order = Order::create([
            'id_warehouse' => session('id_w'),
            'id_company' => $med[0]->{'id'},
            'price_order' => $price,
        ]);
        $count = 0;
        $i = 0;
        $quantity = session()->pull('medarrayquantity');
        foreach ($medarrayid as $med)
         {
            $detail = Order_detail::create([
                'id_order' => $order->id,
                'id_recipe_medication' => $med,
                'quantity' => $quantity[$i]
            ]);
            $i++;
            if (isset($d)) $count++;
         }
         $ord=Order::join('order_details','order_details.id_order','=','orders.id')
         ->join('recipe_medications','order_details.id_recipe_medication','=','recipe_medications.id')
         ->join('medications','recipe_medications.id_medication','=','medications.id')
         ->where('order_details.id_order',$order->id)
         ->get(['order_details.quantity','medications.name','recipe_medications.warehouse_price','orders.price_order']);
            return view('pages.cart',compact('ord'));
    }
    public function discount()
    {
        $med = Recipe_medication::join('warehouse_details', 'recipe_medications.id', '=', 'warehouse_details.id_recipe_medication')
            ->join('medications', 'recipe_medications.id_medication', '=', 'medications.id')
            ->join('warehouses', 'warehouse_details.id_warehouse', '=', 'warehouses.id')
            ->where('warehouse_details.id_warehouse', session('id_w'))
            ->where('warehouse_details.discount_type', null)
            ->get(['recipe_medications.id', 'medications.name', 'medications.photo']);
        return view('pages.discount', compact('med'));
    }
    public function discountdetail($id_med)
    {
        $med = Recipe_medication::join('warehouse_details', 'recipe_medications.id', '=', 'warehouse_details.id_recipe_medication')
            ->join('medications', 'recipe_medications.id_medication', '=', 'medications.id')
            ->join('warehouses', 'warehouse_details.id_warehouse', '=', 'warehouses.id')
            ->where('warehouse_details.id_recipe_medication', $id_med)
            ->where('warehouse_details.id_warehouse', session('id_w'))
            ->get(['warehouse_details.id', 'medications.photo']);
        return view('pages.discount2', compact('med'));
    }
    public function storediscount(Request $request, $id_w)
    {
        if ($request->per == 'one') {
            $request->validate(
                [
                    'discount_per' => 'required|numeric|min:1'
                ]
            );
            $ware = Warehouse_detail::where('warehouse_details.id', $id_w)->first();
            $ware->discount_type = 0;
            $ware->discount_per = $request->discount_per;
            $ware->discount_num = null;
            $ware->discount = null;
            $ware->save();
            $med = Recipe_medication::join('warehouse_details', 'recipe_medications.id', '=', 'warehouse_details.id_recipe_medication')
                ->join('medications', 'recipe_medications.id_medication', '=', 'medications.id')
                ->join('warehouses', 'warehouse_details.id_warehouse', '=', 'warehouses.id')
                ->where('warehouse_details.id_warehouse', session('id_w'))
                ->where('warehouse_details.discount_type', null)
                ->get(['recipe_medications.id', 'medications.name', 'medications.photo']);
            return view('pages.discount', compact('med'));
        } elseif ($request->per == 'two') {
            $request->validate(
                [
                    'discount_num' => 'required|numeric|min:1',
                    'discount' => 'required|numeric|min:1'
                ]
            );
            $ware = Warehouse_detail::where('warehouse_details.id', $id_w)->first();
            $ware->discount_type = 1;
            $ware->discount_per = null;
            $ware->discount_num = $request->discount_num;
            $ware->discount = $request->discount;
            $ware->save();
            $med = Recipe_medication::join('warehouse_details', 'recipe_medications.id', '=', 'warehouse_details.id_recipe_medication')
                ->join('medications', 'recipe_medications.id_medication', '=', 'medications.id')
                ->join('warehouses', 'warehouse_details.id_warehouse', '=', 'warehouses.id')
                ->where('warehouse_details.id_warehouse', session('id_w'))
                ->where('warehouse_details.discount_type', null)
                ->get(['recipe_medications.id', 'medications.name', 'medications.photo']);
            return view('pages.discount', compact('med'));
        }
    }

    public function order()
    {
        $orders = Order::join('pharmacists', 'orders.id_pharmacist', '=', 'pharmacists.id')
            ->join('warehouses', 'orders.id_warehouse', '=', 'warehouses.id')
            ->where('orders.id_warehouse', session('id_w'))
            ->where('orders.id_company', null)
            ->where('orders.isdelivered', 0)
            ->orderBy('orders.order_date')
            ->get(['pharmacists.name_pharmacy', 'orders.order_date', 'orders.id', 'orders.price_order']);
        if (count($orders) !== 0) {
            return view('pages.order', compact('orders'));
        } else {
            return view('pages.order2');
        }
    }
    public function orderdetail($id_o)
    {
        $orderdetails = Order_detail::join('orders', 'order_details.id_order', '=', 'orders.id')
            ->join('warehouse_details', 'order_details.id_warehouse_detail', '=', 'warehouse_details.id')
            ->join('recipe_medications', 'recipe_medications.id', '=', 'warehouse_details.id_recipe_medication')
            ->join('medications', 'recipe_medications.id_medication', '=', 'medications.id')
            ->where('warehouse_details.id_warehouse', session('id_w'))
            ->where('order_details.id_order', $id_o)
            ->get(['medications.name', 'medications.photo', 'order_details.quantity', 'orders.id']);
        return view('pages.orderdetail', compact('orderdetails'));
    }
    public function orderdelivery($id_or)
    {
        $ord = Order::where('orders.id', $id_or)->first();
        $ord->isdelivered = 1;
        $ord->save();
        $order = Order::join('pharmacists', 'orders.id_pharmacist', '=', 'pharmacists.id')
            ->join('warehouses', 'orders.id_warehouse', '=', 'warehouses.id')
            ->where('orders.id_warehouse', session('id_w'))
            ->where('orders.id_company', null)
            ->where('orders.isdelivered', 0)
            ->orderBy('orders.order_date')
            ->get(['pharmacists.name_pharmacy', 'orders.order_date', 'orders.id', 'orders.price_order']);
        return view('pages.order', compact('order'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
