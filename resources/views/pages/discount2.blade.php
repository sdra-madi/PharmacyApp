@extends('layout.master')
@section('content')
<div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-5 mr-auto">
          <div class="border text-center">
            <img style="width:11rem; height=150px" src="{{$med[0]->photo}}" alt="Image" class="img-fluid p-5">
          </div>
        </div>
        <div class="col-md-6">
          <div class="dropdown">
            <button type="button" style="background-color: #fff;
            color: #89cffa; height: 55px; border-radius: 15px;
            width: 500px; font-size: x-large;"
            class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
              إضافة  نوع  الحسم
            </button>
            <form method="POST" action="{{url ('storediscount/'.($med[0]->id))}}">
                @csrf
           <div class="dropdown-menu"
             style="background-color: #89cffa; width: 500px;">
             <ul style="list-style: none; text-align: right;padding: 10px;
               color: #fff;margin: 35px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;font-size: larger; display:inline-table">
              <li style="margin-bottom: 25px;" > :نسبة مئوية
               <input type="radio" name="per" value="one" id=""></li>
               <input type="number" name="discount_per" class="inpu border"style="text-align: right;"placeholder="ادخل النسبة المئوية" ></input>
               <span style="color:red">@error('discount_per'){{$message}}@enderror</span>
              <li style="margin-bottom: 25px;" > : عرض
              <input type="radio" name="per" value="two" id=""></li>
              <input type="number" name="discount_num" class="inpu border"style="text-align: right;"
               placeholder="ادخل قيمة العرض" ></input>
               <span style="color:red">@error('discount_num'){{$message}}@enderror</span>
               <input type="number" name="discount" class="inpu border"style="text-align: right;"
               placeholder="ادخل قيمة الهدية" ></input>
               <span style="color:red">@error('discount'){{$message}}@enderror</span>
             </ul>
                 <button type="submit" class=" btn btn-white mt-5" style="background-color:#fff; margin-left: 300px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;color:#89cffa;" >
                 تأكيد</button>
           </div>
         </form>
          </div>

          </div>
            </div>







          </div>
          </div>
        </div>

      </div>
    </div>
 </div>
@endsection
