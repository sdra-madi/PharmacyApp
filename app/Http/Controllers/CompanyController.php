<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Medication;
use App\Models\Order;
use App\Models\Order_detail;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function login(Request $request)
    {
        $request->validate(
            [
                'phone_number'=>'required|numeric|min:10',
                'password'=>'required',
            ]
            );
            $user=Company::where('phone_number',$request->phone_number)->first();
            $u=Company::where('phone_number',$request->phone_number)
            ->where('password',$request->password)
            ->get('id');
            if($user)
            {
                $id=($u[0]->{'id'});
                session(['id'=>$id]);
                $med=Medication::join('companies','medications.id_company','=','companies.id')
                ->where('companies.id',session('id'))
                ->get(['medications.id','medications.name','medications.photo','medications.classification']);
                $compord =Order::join('companies', 'orders.id_company', '=', 'companies.id')
                ->join('warehouses', 'orders.id_warehouse', '=', 'warehouses.id')
                ->where('orders.id_company', session('id'))
                ->where('orders.id_pharmacist', null)
                ->where('orders.isdelivered', 0)
                ->orderBy('orders.created_at')
                ->get(['warehouses.name', 'orders.created_at', 'orders.id', 'orders.price_order']);
                 {return view('index',compact(['med','compord']));}
            }
    }
    public function create(Request $request)
    {
        $request->validate(
            [
                'name'=>'required|string',
                'name_ofresponse'=>'required|string',
                'city'=>'required',
                'worktime_from'=>'required',
                'worktime_to'=>'required',
                'workdayes'=>'required',
                'phone_number'=>'required|unique:companies|numeric|min:10',
                'license_number'=>'required|unique:companies',
                'photo'=>'required',
                'password'=>'required',
            ]
            );
            if($request->hasFile('photo'))
             {
                $photo = $request->file('photo');
                $destination_path = 'public/images/companies';
                $name = time(); // time in seconds
                $ext = $photo->getClientOriginalExtension(); // jpg , png
                $finalName = "$name.$ext";
                $photo->storeAs($destination_path, $finalName);
                $path = "/storage/images/companies/$finalName";
                info($path);
            }
            $user=Company::create(
                [
                    'name'=>$request->name,
                    'name_ofresponse'=>$request->name_ofresponse,
                    'city'=>$request->city,
                    'worktime_from'=>$request->worktime_from,
                    'worktime_to'=>$request->worktime_to,
                    'workdayes'=>$request->workdayes,
                    'phone_number'=>$request->phone_number,
                    'license_number'=>$request->license_number,
                    'photo'=>$path,
                    'password'=>$request->password,
                ]
                );
                 if($user)
               {
                $u=Company::where('phone_number',$request->phone_number)
                ->where('password',$request->password)
                ->get('id');
                $id=($u[0]->{'id'});
                session(['id'=>$id]);
                $med=Medication::join('companies','medications.id_company','=','companies.id')
                ->where('companies.id',session('id'))
                ->get(['medications.name','medications.photo','medications.classification']);
                $compord =Order::join('companies', 'orders.id_company', '=', 'companies.id')
                ->join('warehouses', 'orders.id_warehouse', '=', 'warehouses.id')
                ->where('orders.id_company', session('id'))
                ->where('orders.id_pharmacist', null)
                ->where('orders.isdelivered', 0)
                ->orderBy('orders.created_at')
                ->get(['warehouses.name', 'orders.created_at', 'orders.id', 'orders.price_order']);
                {return view('index',compact(['med','compord']));}
               }
    }
    public function storemed(Request $request)
    {
        //  if($request->hasFile('photo'))
        //   {
            $photo =$request->file('photo');
            $destination_path = 'public/images/medications';
            $name = time(); // time in seconds
            $ext = $photo->getClientOriginalExtension(); // jpg , png
            $finalName = "$name.$ext";
            $photo->storeAs($destination_path, $finalName);
            $path = "/storage/images/medications/$finalName";
            // info($path);
            $med=Medication::create([
            'id_company'=>session('id'),
            'name'=>$request->name,
            'classification'=>$request->classification,
            'classification_detail'=>$request->classification_detail,
            'photo'=>$path,
            'parcode'=>$request->parcode,
              ]);
        if($med)
        {return view('addmed')->with('message_sent','Your Medicien has been added successfully!');}

    }
    public function displaymed()
    {
        $med=Medication::join('companies','medications.id_company','=','companies.id')
        ->where('companies.id',session('id'))
        ->get(['medications.name','medications.photo','medications.classification']);
        $order =Order::join('companies', 'orders.id_company', '=', 'companies.id')
        ->join('warehouses', 'orders.id_warehouse', '=', 'warehouses.id')
        ->where('orders.id_company', session('id'))
        ->where('orders.id_pharmacist', null)
        ->where('orders.isdelivered', 0)
        ->orderBy('orders.order_date')
        ->get(['warehouses.name', 'orders.order_date', 'orders.id', 'orders.price_order']);
         {return view('index',['med'=>$med,'order'=>$order]);}
    }
    public function showorder($idcorder)
    {
        $showorderdetail = Order_detail::join('orders', 'order_details.id_order', '=', 'orders.id')
        ->join('recipe_medications', 'recipe_medications.id', '=', 'order_details.id_recipe_medication')
        ->join('medications', 'recipe_medications.id_medication', '=', 'medications.id')
        ->where('order_details.id_order', $idcorder)
        ->get(['medications.name', 'medications.photo', 'order_details.quantity', 'orders.id']);
            return view('showmed', compact('showorderdetail'));
    }
    public function confirm($id_cr)
    {
        $ord = Order::where('orders.id', $id_cr)->first();
        $ord->isdelivered = 1;
        $ord->save();
        $med=Medication::join('companies','medications.id_company','=','companies.id')
        ->where('companies.id',session('id'))
        ->get(['medications.name','medications.photo','medications.classification']);
        $compord =Order::join('companies', 'orders.id_company', '=', 'companies.id')
        ->join('warehouses', 'orders.id_warehouse', '=', 'warehouses.id')
        ->where('orders.id_company', session('id'))
        ->where('orders.id_pharmacist', null)
        ->where('orders.isdelivered', 0)
        ->orderBy('orders.created_at')
        ->get(['warehouses.name', 'orders.order_date', 'orders.id', 'orders.created_at']);
        {return view('index',compact(['med','compord']));}
    }
    public function addrecipe(Request $request,$id_med)
    {
        session('recipid',$id_med);
        return back()->with('message_sent', 'تم اضافة الدواء الى جدول الطبخة');
    }

}
