<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Company_warehouse;
use App\Models\Favorite;
use App\Models\Favorite_phmedication;
use Illuminate\Http\Request;
use App\Models\Medication;
use App\Models\Pharmacist;
use App\Models\Recipe_medication;
use App\Models\Warehouse;
use App\Models\Warehouse_detail;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Boolean;

class MedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getallmedication(Request $request)
    {
        $ph=Pharmacist::where('pharmacists.id',$request->id_ph)->get('pharmacists.city');
      $med=Recipe_medication::join('warehouse_details','recipe_medications.id','=','warehouse_details.id_recipe_medication')
      ->join('medications','recipe_medications.id_medication','=','medications.id')
      ->join('warehouses','warehouse_details.id_warehouse','=','warehouses.id')
      ->where('medications.id_company',$request->id_c)
      ->where('warehouse_details.id_warehouse',$request->id_w)
      ->where('medications.classification',$request->type)
      ->where('warehouses.city',$ph[0]->{'city'})
      ->get(['medications.id','medications.parcode','medications.name' ,'medications.photo',
             'recipe_medications.pharmacist_price','medications.classification_detail',
             'recipe_medications.expiry_date','warehouse_details.discount_type']);
        if(count($med)==0)
        { return response()->json(['status'=>'faild','data'=>$med]);}
        else
        {
             foreach($med as $m)
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
            foreach($med as $m)
            {
                if($m->{'discount_type'}==0)
            {
            $d=Warehouse_detail::join('warehouses','warehouse_details.id_warehouse','=','warehouses.id')
            ->join('recipe_medications','warehouse_details.id_recipe_medication','=','recipe_medications.id')
            ->join('medications','recipe_medications.id_medication','=','medications.id')
            ->where('medications.name',$m->{'name'})
            ->where('medications.id',$m->{'id'})
            ->where('recipe_medications.expiry_date',$m->{'expiry_date'})
            ->get(['warehouse_details.discount_per','warehouse_details.id']);
            $m->{'discount_per'}=$d[0]->{'discount_per'};
            $m->{'warehouse_id'}=$d[0]->{'id'};
            }
            elseif($m->{'discount_type'}==1)
            {
                $d=Warehouse_detail::join('warehouses','warehouse_details.id_warehouse','=','warehouses.id')
                ->join('recipe_medications','warehouse_details.id_recipe_medication','=','recipe_medications.id')
                ->join('medications','recipe_medications.id_medication','=','medications.id')
                ->where('medications.name',$m->{'name'})
                ->where('medications.id',$m->{'id'})
                ->where('recipe_medications.expiry_date',$m->{'expiry_date'})
                ->get(['warehouse_details.discount','warehouse_details.discount_num','warehouse_details.id']);
                $m->{'discount'}=$d[0]->{'discount'};
                $m->{'discount_num'}=$d[0]->{'discount_num'} ;
                $m->{'warehouse_id'}=$d[0]->{'id'};
            }
            else
            {
                $d=Warehouse_detail::join('warehouses','warehouse_details.id_warehouse','=','warehouses.id')
                ->join('recipe_medications','warehouse_details.id_recipe_medication','=','recipe_medications.id')
                ->join('medications','recipe_medications.id_medication','=','medications.id')
                ->where('medications.name',$m->{'name'})
                ->where('medications.id',$m->{'id'})
                ->where('recipe_medications.expiry_date',$m->{'expiry_date'})
                ->get(['warehouse_details.id']);
                $m->{'warehouse_id'}=$d[0]->{'id'};
            }
            }
                 return response()->json(['status'=>'ok','data'=>$med]);
        }

    }
    public function search(Request $request)
    {
        $pharmi=Pharmacist::where('pharmacists.id',$request->id_ph)->get('pharmacists.city');
        $meds=new Recipe_medication();
        $wares= new Warehouse ;
        $companies=new Recipe_medication();
        $medp=Medication::where('medications.parcode',$request->name)->get('medications.name');
        $company=Company::where('companies.name',$request->name)->get('companies.id');
        $ware=Warehouse::where('warehouses.name',$request->name)->get('warehouses.name');
        $med=Medication::where('medications.name',$request->name)->get('medications.name');
        if(count($med)!==0)
        {
          $meds=Recipe_medication::distinct()->join('warehouse_details','recipe_medications.id','=','warehouse_details.id_recipe_medication')
          ->join('medications','recipe_medications.id_medication','=','medications.id')
          ->join('companies','medications.id_company','=','companies.id')
          ->join('warehouses','warehouses.id','=','warehouse_details.id_warehouse')
          ->where('medications.name',$request->name)
        //   ->where('warehouses.city',$pharmi[0]->{'city'})
          ->get(['medications.id','medications.name','medications.photo','medications.classification','medications.classification_detail']);
             $m=Recipe_medication::join('warehouse_details','recipe_medications.id','=','warehouse_details.id_recipe_medication')
          ->join('medications','recipe_medications.id_medication','=','medications.id')
          ->join('companies','medications.id_company','=','companies.id')
          ->join('warehouses','warehouses.id','=','warehouse_details.id_warehouse')
          ->where('medications.id',$meds[0]->{'id'})
          ->get(['companies.name']);
          $meds[0]->{'company_name'}=$m[0]->{'name'};
          if(count($meds)==0)
          {$meds=null;}
        }
        elseif(count($ware)!==0)
        {
            $wares=DB::table('warehouses')
            ->select('id','name','name_ofresponse', 'phone_number_call', 'phone_number_land',
             'phone_number_whatsup','worktime_from','worktime_to','workdayes','city','photo')->where('warehouses.name',$request->name)
             ->where('warehouses.city',$pharmi[0]->{'city'})
             ->get();
        }
        elseif(count($company)!==0)
        {
            $companies=Company_warehouse::join('warehouses','company_warehouses.id_warehouses','=','warehouses.id')
            ->join('companies','company_warehouses.id_companies','=','companies.id')
            ->where('company_warehouses.id_companies',($company[0]->{'id'}))
            ->get(['warehouses.id','warehouses.name','warehouses.name_ofresponse','warehouses.phone_number_call',
              'warehouses.phone_number_land','warehouses.phone_number_whatsup','warehouses.worktime_from',
              'warehouses.worktime_to','warehouses.workdayes','warehouses.city','warehouses.photo']);

        }
        elseif(count($medp)!==0)
        {
            $meds=Recipe_medication::distinct()->join('warehouse_details','recipe_medications.id','=','warehouse_details.id_recipe_medication')
          ->join('medications','recipe_medications.id_medication','=','medications.id')
          ->join('companies','medications.id_company','=','companies.id')
          ->join('warehouses','warehouses.id','=','warehouse_details.id_warehouse')
          ->where('medications.parcode',$request->name)
        //   ->where('warehouses.city',$pharmi[0]->{'city'})
          ->get(['medications.id','medications.name','medications.photo','medications.classification','medications.classification_detail']);
             $m=Recipe_medication::join('warehouse_details','recipe_medications.id','=','warehouse_details.id_recipe_medication')
          ->join('medications','recipe_medications.id_medication','=','medications.id')
          ->join('companies','medications.id_company','=','companies.id')
          ->join('warehouses','warehouses.id','=','warehouse_details.id_warehouse')
          ->where('medications.id',$meds[0]->{'id'})
          ->get(['companies.name']);
          $meds[0]->{'company_name'}=$m[0]->{'name'};
        }
        else
        {
         return response()->json(['status'=>'faild','meds'=>$meds,'wares'=>$wares,'company'=>$companies]);
        }
         return response()->json(['status'=>'ok','meds'=>$meds,'wares'=>$wares,'company'=>$companies]);
    }
    public function searchmed(Request $request)
    {
      $m=Medication::where('medications.parcode', $request->name)->get('medications.name');
      $m2=Medication::where('medications.name',$request->name)->get('medications.name');
      if(count($m2)!==0)
      {
      $med=Recipe_medication::join('warehouse_details','recipe_medications.id','=','warehouse_details.id_recipe_medication')
      ->join('medications','recipe_medications.id_medication','=','medications.id')
      ->where('medications.id_company', $request->id_c)
      ->where('medications.name',$request->name)
      ->where('warehouse_details.id_warehouse', $request->id_w)
      ->get([ 'medications.name','medications.classification', 'medications.classification_detail',
      'recipe_medications.pharmacist_price','medications.photo']);
       if(count($med)==0)
      {
        return response()->json(['status'=>'faild','data'=>$med]);
      }
      else
      {
        return response()->json(['status'=>'ok','data'=>$med]);
      }
     }
     elseif(count($m)!==0)
     {
        $med=Recipe_medication::join('warehouse_details','recipe_medications.id','=','warehouse_details.id_recipe_medication')
        ->join('medications','recipe_medications.id_medication','=','medications.id')
        ->where('medications.id_company', $request->id_c)
        ->where('medications.parcode',$request->name)
        ->where('warehouse_details.id_warehouse', $request->id_w)
        ->get([ 'medications.name','medications.classification', 'medications.classification_detail',
        'recipe_medications.pharmacist_price','medications.photo']);
         if(count($med)==0)
        {
          return response()->json(['status'=>'faild','data'=>$med]);
        }
        else
        {
          return response()->json(['status'=>'ok','data'=>$med]);
        }
     }
    }
    public function detailofmed(Request $request)
    {
        $ph=Pharmacist::where('pharmacists.id',$request->id_ph)->get('pharmacists.city');

        $med=Recipe_medication::join('warehouse_details','recipe_medications.id','=','warehouse_details.id_recipe_medication')
        ->join('medications','recipe_medications.id_medication','=','medications.id')
        ->join('warehouses','warehouses.id','=','warehouse_details.id_warehouse')
         ->where('warehouses.city',($ph[0]->{'city'}))
        ->where('recipe_medications.id_medication',$request->id_m)
        ->get(['warehouses.id','warehouses.name','warehouses.photo','recipe_medications.pharmacist_price'
        ,'recipe_medications.expiry_date','warehouse_details.discount_type']);
        if(count($med)==0)
        { return response()->json(['status'=>'faild','data'=>$med]);}
        else
        {
        foreach($med as $m)
        {
        if($m->{'discount_type'}==0)
        {
          $d=Recipe_medication::join('warehouse_details','recipe_medications.id','=','warehouse_details.id_recipe_medication')
             ->join('medications','recipe_medications.id_medication','=','medications.id')
             ->join('warehouses','warehouses.id','=','warehouse_details.id_warehouse')
             ->where('recipe_medications.id_medication',$request->id_m)
             ->where('warehouse_details.id_warehouse',$m->{'id'})
             ->where('recipe_medications.expiry_date',$m->{'expiry_date'})
             ->where('recipe_medications.pharmacist_price',$m->{'pharmacist_price'})
             ->get(['warehouse_details.discount_per','warehouse_details.id']);
              $m->{'discount_per'}=$d[0]->{'discount_per'};
              $m->{'warehouse_details_id'}=$d[0]->{'id'};
        }
        elseif($m->{'discount_type'}==1)
        {
            $d=Recipe_medication::join('warehouse_details','recipe_medications.id','=','warehouse_details.id_recipe_medication')
                ->join('medications','recipe_medications.id_medication','=','medications.id')
                ->join('warehouses','warehouses.id','=','warehouse_details.id_warehouse')
               ->where('recipe_medications.id_medication',$request->id_m)
               ->where('warehouse_details.id_warehouse',$m->{'id'})
               ->where('recipe_medications.expiry_date',$m->{'expiry_date'})
               ->where('recipe_medications.pharmacist_price',$m->{'pharmacist_price'})
               ->get(['warehouse_details.discount','warehouse_details.discount_num','warehouse_details.id']);
               $m->{'discount'}=$d[0]->{'discount'};
               $m->{'discount_num'}=$d[0]->{'discount_num'} ;
               $m->{'warehouse_details_id'}=$d[0]->{'id'};
        }
        else
        {
            $d=Recipe_medication::join('warehouse_details','recipe_medications.id','=','warehouse_details.id_recipe_medication')
                ->join('medications','recipe_medications.id_medication','=','medications.id')
                ->join('warehouses','warehouses.id','=','warehouse_details.id_warehouse')
                ->where('recipe_medications.id_medication',$request->id_m)
                ->where('warehouse_details.id_warehouse',$m->{'id'})
                ->where('recipe_medications.expiry_date',$m->{'expiry_date'})
                ->where('recipe_medications.pharmacist_price',$m->{'pharmacist_price'})
                 ->get(['warehouse_details.id']);
                  $m->{'warehouse_details_id'}=$d[0]->{'id'};
        }
         }
        return response()->json(['status'=>'ok','data'=>$med]);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
