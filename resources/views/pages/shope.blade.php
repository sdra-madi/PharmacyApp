@extends('layout.master')
@section('content')
<div class="site-section bg-light">
    <div class="container">
      <div class="row">
        @foreach ($medcompany as $med)
        <div class="col-sm-6 col-lg-4 text-center item mb-4 item-v2">
          <span class="onsale">شراء</span>
          <a href="shop-single.html">
             <img style="width:150rem; height=150px ;"  src="{{$med->photo}}" alt="Image"></a>
          <h3 class="text-dark"><a href="shop-single.html">{{$med->name}}</a></h3>
          <a href="{{route('add',$med->id)}}" class="btn btn-danger"
          style="background-color: #89cffa;margin-top: 45px;
            border-color: #fff;">  إضافة الدواء</a>
        </div>
        @endforeach
      </div>
      <div class="row mt-5">
        <div class="col-md-12 text-center">
          <div class="site-block-27">
            <ul>
              <li><a href="#">&lt;</a></li>
              <li class="active"><span>1</span></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">&gt;</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
