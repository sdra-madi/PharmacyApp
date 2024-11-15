<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Favorite_phmedication;
use App\Models\Favorite_warehouse;
use App\Models\Recipe_medication;
use App\Models\Warehouse_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use PhpParser\Builder\Function_;

class FavoriteController extends Controller
{
    public function addwarehouse(Request $request)
    {
        $favnew= new Favorite;
        $favware= new Favorite_warehouse;
       $find=Favorite::where('id_pharmacy',$request->id_ph)->get('favorites.id');
        if(count($find)==0)
        {
            $favnew->id_pharmacy=$request->id_ph;
            $favnew->save();
            $findfavnew=Favorite::where('id_pharmacy',$request->id_ph)->get('favorites.id');
            $favware->favorite_id=$findfavnew[0]->{'id'};
            $favware->id_warehouse=$request->id_w;
            $favware->save();
            return response()->json(['status'=>'ok','msg'=>'تم انشاء مفضلة واضافة المستودع لها']);
        }
        else
        {
            $ware=Favorite_warehouse::where('id_warehouse',$request->id_w)->where('favorite_id',$find[0]->{'id'})->get('favorite_warehouses.id');
            if(count($ware)==0)
            {
            $favware->favorite_id=$find[0]->{'id'};
            $favware->id_warehouse=$request->id_w;
            $favware->save();
            return response()->json(['status'=>'ok','msg'=>'المفضلة موجودة وتم اضافة المستودع']);
            }
            else
            {
             return response()->json(['status'=>'ok','msg'=>'المفضلة موجودة والمستودع مضاف مسبقا']);
            }

        }
    }
    public function deletewarehouse(Request $request)
    {
        $favph=Favorite::where('id_pharmacy',$request->id_ph)->get('favorites.id');
        $ware=Favorite_warehouse::where('favorite_id',($favph[0]->{'id'}))
        ->where('id_warehouse',$request->id_w)
        ->get('id');
        if(count($ware)==0)
        {
            return response()->json(['status'=>'ok','msg'=>'المستودع غير موجود بالمفضلة']);
        }
        else
        {
         $wdelete=Favorite_warehouse::where('id',($ware[0]->{'id'}))->delete();
         return response()->json(['status'=>'ok','msg'=>'تم ازالة المستودع من المفضلة']);
        }
    }
    public function addmedicain(Request $request)
    {
        $favnew= new Favorite;
        $favmed= new Favorite_phmedication;
       $find=Favorite::where('id_pharmacy',$request->id_ph)->get('favorites.id');
        if(count($find)==0)
        {
            $favnew->id_pharmacy=$request->id_ph;
            $favnew->save();
            $findfavnew=Favorite::where('id_pharmacy',$request->id_ph)->get('favorites.id');
            $favmed->favorite_id=$findfavnew[0]->{'id'};
            $favmed->id_medication=$request->id_med;
            $favmed->save();
            return response()->json(['status'=>'ok','msg'=>'تم انشاء مفضلة واضافة الدواء لها']);
        }
        else
        {
            $med=Favorite_phmedication::where('id_medication',$request->id_med)->where('favorite_id',$find[0]->{'id'})->get('favorite_phmedications.id');
            if(count($med)==0)
            {
                $favmed->favorite_id=$find[0]->{'id'};
                $favmed->id_medication=$request->id_med;
                $favmed->save();
            return response()->json(['status'=>'ok','msg'=>'المفضلة موجودة وتم اضافة الدواء']);
            }
            else
            {
             return response()->json(['status'=>'ok','msg'=>'المفضلة موجودة والدواء مضاف مسبقا']);
            }
        }
    }
    public function deletemedicain(Request $request)
    {
        $favph=Favorite::where('id_pharmacy',$request->id_ph)->get('favorites.id');
        $med=Favorite_phmedication::where('favorite_id',($favph[0]->{'id'}))
        ->where('id_medication',$request->id_med)
        ->get('id');
        if(count($med)==0)
        {
            return response()->json(['status'=>'ok','msg'=>' الدواء غير موجود بالمفضلة']);
        }
        else
        {
         $meddelete=Favorite_phmedication::where('id',($med[0]->{'id'}))->delete();
         return response()->json(['status'=>'ok','msg'=>'تم ازالة الدواء من المفضلة']);
        }
    }
    public function showfavmedicatioes(Request $request)
    {
        $med=Favorite_phmedication::join('favorites','favorite_phmedications.favorite_id','=','favorites.id')
        ->join('medications','favorite_phmedications.id_medication','=','medications.id')
        ->where('favorites.id_pharmacy',$request->id_ph)
        ->get(['medications.id','medications.name']);
        if(count($med)==0)
        {return response()->json(['status'=>'faild','data'=>'لا يوجد ادوية بالمفضلة']);}
        else
       {return response()->json(['status'=>'ok','data'=>$med]);}
    }
    public function detailfavmedication(Request $request)
    {
        $fav=Favorite::where('favorites.id_pharmacy',$request->id_ph)->get('favorites.id');
        $wares=Recipe_medication::join('warehouse_details','recipe_medications.id','=','warehouse_details.id_recipe_medication')
        ->join('medications','recipe_medications.id_medication','=','medications.id')
        ->join('warehouses','warehouses.id','=','warehouse_details.id_warehouse')
        ->join('favorite_phmedications','favorite_phmedications.id_medication','=','medications.id')
        ->where('favorite_phmedications.favorite_id',($fav[0]->{'id'}))
        ->where('medications.name',$request->name)
         ->get(['warehouse_details.id','warehouse_details.id_warehouse','warehouses.name','warehouses.photo','warehouse_details.discount_type','warehouse_details.discount_per','warehouse_details.discount','warehouse_details.discount_num','recipe_medications.pharmacist_price','recipe_medications.expiry_date','medications.classification']);
        if(count($wares)==0)
        {
            return response()->json(['status'=>'ok','data'=>'الدواء غير  موجود بالمفضلة']);
        }
          else
         {
            return response()->json(['status'=>'ok','data'=>$wares]);
        }

    }
    public function showfavwarehouses(Request $request)
    {
        $ware=Favorite_warehouse::join('favorites','favorite_warehouses.favorite_id','=','favorites.id')
        ->join('warehouses','favorite_warehouses.id_warehouse','=','warehouses.id')
        ->where('favorites.id_pharmacy',$request->id_ph)
        ->get(['warehouses.id','warehouses.name']);
        if(count($ware)==0)
        {return response()->json(['status'=>'faild','data'=>'لا يوجد مستودعات بالمفضلة']);}
        else
       {return response()->json(['status'=>'ok','data'=>$ware]);}
    }
}
