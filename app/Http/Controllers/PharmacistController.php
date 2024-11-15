<?php

namespace App\Http\Controllers;

use App\Models\Pharmacist;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class PharmacistController extends Controller
{
    //
    public function createaccount(Request $request)
    {
        try
     {
        $validateuser=Validator::make($request->all(),
           [
            'name'=>'required|string',
            'name_pharmacy'=>'required|string',
            'phone_number'=>'required|unique:pharmacists|numeric',
            'city'=>'required',
            'description'=>'required',
            // 'location_x'=>'required',
            // 'location_y'=>'',
            'license_number'=>'required|unique:pharmacists',
            'password'=>'required|min:6',
           ]);
          if($validateuser->fails())
        {
            $u=[];
            return response()->json(['status'=>false,'msg'=>'validation error',
            'error'=>$validateuser->errors(),'id'=>$u]);
        }
        else{
            // DB::table('pharmacists')->insert([
            //     'code' => Str::random(10),
            // ]);
        $user=Pharmacist::create(
            [
                'name'=>$request->name,
                'name_pharmacy'=>$request->name_pharmacy,
                'phone_number'=>$request->phone_number,
                'city'=>$request->city,
                'description'=>$request->description,
                'location_x'=>$request->location_x,
                'location_y'=>$request->location_y,
                'license_number'=>$request->license_number,
                'password'=>Hash::make($request->password),
                'code' => Str::random(10),
            ]
            );
             $u=Pharmacist::where('pharmacists.phone_number',$request->phone_number)->get(['pharmacists.id']);
               return response()->json(['status'=>true,'msg'=>'user created','id'=>$u]);
        }
      }
      catch(\Throwable $th)
      {
        return response()->json(
            ['status'=>false,'msg'=>$th->getMessage()]);
      }
    }
    public function login(Request $request)
    {
        try
        {
            $validateuser=Validator::make($request->all(),
            [
              'phone_number'=>'required|numeric|min:10',
              'password'=>'required'
            ]);
            if($validateuser->fails())
            {
                return response()->json(['status'=>false,'msg'=>'validation error',
                'error'=>$validateuser->errors()]);
            }
            else
            {
            $user=Pharmacist::where('phone_number',$request->phone_number)->first();
            $u=Pharmacist::where('pharmacists.phone_number',$request->phone_number)
                ->get('pharmacists.id');
            if(!$user|| !Hash::check($request->password,$user->password) )
            {
                return response()->json(['status'=>false,'msg'=>'user login faild','id'=>$u]);
            }
            else
            {

                 return response()->json(['status'=>true,'msg'=>'user login successed','id'=>$u]);
            }
            }
        }
        catch(\Throwable $th)
      {
        return response()->json(
            ['status'=>false,'msg'=>$th->getMessage()]);
      }
    }
    public function verfiycode(Request $request)
    {
        $user=Pharmacist::where('pharmacists.code',$request->code)
        ->where('pharmacists.id',$request->id_ph)
        ->first();
        if($user)
        {
            return response()->json(['status'=>true,'msg'=>'تم التاكيد بنجاح']);
        }
        else
        {
            return response()->json(['status'=>false,'msg'=>'لم يتم التاكيد']);
        }
    }
}
