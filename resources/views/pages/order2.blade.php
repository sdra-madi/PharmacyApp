@extends('layout.master')
@section('content')
<div class="site-section bg-light">
    <div class="container">
      <div class="row">
        <div class="title-section text-center col-12">
          <h2>عرض  <strong class="tex" style="color: black;">الطلبيات</strong></h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
            <br>
          {{-- <span class="icon-check_circle display-3 text-primary"></span> --}}
          <h2 class="display-3 text-black">لا يوجد لديك طلبيات لعرضها</h2>
          {{-- <p class="lead mb-5">لا يوجد لديك طلبيات </p> --}}
          <br>
          <p><a href="{{route('main')}}" class="btn btn-md height-auto px-4 py-3 btn-primary">Back to Main</a></p>
        </div>
      </div>
    </div>
</div>
@endsection

