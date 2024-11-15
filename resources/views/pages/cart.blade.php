@extends('layout.master')
@section('content')
<div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <form class="col-md-12" method="post">
          <div class="site-blocks-table">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="product-remove">حذف</th>
                  <th class="product-quantity">الكمية</th>
                  <th class="product-price">السعر</th>
                  <th class="product-name">اسم الدواء </th>
                </tr>
              </thead>
              <tbody >
                 @foreach ($ord as $o )
                <tr>
                  <td><a href="#" class="btn btn-primary height-auto btn-sm">X</a></td>
                  <td>{{$o->quantity}} </td>
                  <td style="color: #89cffa;">{{$o->warehouse_price}} </td>
                  <td class="product-name">
                        <h2 class="h5 text-black">{{$o->name}} </h2>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </form>
      </div>

<div class="row">


        <div class="col-md-6 pl-5">
          <div class="row justify-content-end"
           style="margin-left: -400px;">
            <div class="col-md-7" >
              <div class="row">
                <div class="col-md-12 text-right border-bottom mb-5">
                  <h3 class="text-black h4 text-uppercase">الفاتورة النهائية</h3>
                </div>
              </div>

              <div class="row mb-5">
                <div class="col-md-6">
                  <span class="text-black">السعر  الإجمالي</span>
                </div>
                <div class="col-md-6 text-right">
                  <strong class="text-black">{{$ord[0]->price_order}}</strong>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-primary btn-lg btn-block" onclick="window.location='{{route('thank')}}'">Place
                        Order</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
