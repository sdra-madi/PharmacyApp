@extends('layout.master')
@section('content')
<div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-5 mr-auto">
          <div class="border text-center">
            <img src="{{asset('images/medications')}}/{{$med[0]->photo}}" alt="Image" class="img-fluid p-5">
          </div>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <a href="{{route('shope',$med[0]->{'id_company'})}}"  class="btn btn-md height-auto px-4 py-3 btn-primary">اضافة المزيد من الادوية</a>
          <a href="{{route('cart')}}" style="margin-left: 50px" class="btn btn-md height-auto px-4 py-3 btn-primary">الذهاب للسلة</a>
        </div>
        <div class="col-md-6">
            @if(Session::has('message_sent'))
            <div class="alert alert-success">
                {{Session::get('message_sent')}}
           </div>
           @endif
          <h2 class="tex" style="color: #000;" >المعلومات الخاصة بالدواء المختار</h2>
          <p ><strong class="tex h4"
            style="margin-left: 450px; color: #89cffa;"> :الكمية</strong></p>
          <div class="mb-5">
            <form method="POST" action="{{url('addmedone/'.($med[0]->id))}}">
                @csrf
            <div class="input-group mb-3" style="max-width: 220px; margin-left: 310px;">
              <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus"
                type="button">&minus;</button>
              </div>
              <input type="text" name="number" class="form-control text-center"
               value="1" placeholder=""
                aria-label="Example text with button addon"
                 aria-describedby="button-addon1">
              <div class="input-group-append">
                <button class="btn btn-outline-primary js-btn-plus"
                 type="button">&plus;</button>
              </div>
            </div>
          </div>
          <div  style="margin-left: 410px;">
          <p><button type="submit"
            class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">إضافة للسلة</button></p>
          </div>

        </form>
          <div class="mt-5">
            <ul class="nav nav-pills mb-3 custom-pill"
            id="pills-tab" role="tablist" style="margin-left: 270px;">
              <li class="nav-item">
                <a class="nav-link active"
                 id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                  aria-controls="pills-home"
                   aria-selected="true">تفاصيل الدواء</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab"
                data-toggle="pill" href="#pills-profile" role="tab"
                  aria-controls="pills-profile" aria-selected="false">المزيد من التفاصيل </a>
              </li>

            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <table class="table custom-table">
                  <thead>
                    <th>التصنيف المفصل </th>
                    <th>تصنيف الدواء</th>
                    <th>اسم الدواء</th>
                  </thead>
                  <tbody style="background-color: rgb(235, 238, 241);">
                    <tr >
                      <th scope="row">{{$med[0]->classification}}</th>
                      <td  style="background-color: rgb(244, 246, 248);">{{$med[0]->classification_detail}}</td>
                      <td>{{$med[0]->name}}</td>
                    </tr>


                  </tbody>
                </table>
              </div>
              <div class="tab-pane fade"
              id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                <table class="table custom-table">
                  <thead>

                    <th>تاريخ الانتهاء</th>
                  </thead>

                  <tbody style="background-color: rgb(235, 238, 241);">
                    <tr>

                      <td>{{$med[0]->expiry_date}}</td>
                    </tr>
                  </tbody>
                </table>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
