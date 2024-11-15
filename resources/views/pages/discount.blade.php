@extends('layout.master')
@section('content')
<div class="site-section bg-light">
    <div class="container">
      <div class="row">
        @foreach ($med as $m)
        <div class="col-sm-6 col-lg-4 text-center item mb-4 item-v2">
          <a href="{{route('discount2',$m->id)}}">
             <img style="width:11rem; height=150px" src="{{$m->photo}}" alt="Image"></a>
          <h3 class="text-dark"><a href="{{route('discount2',$m->id)}}">{{$m->name}}</a></h3>
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
