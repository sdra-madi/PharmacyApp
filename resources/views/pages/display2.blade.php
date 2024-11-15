@extends('layout.master')
@section('content')
<div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-5 mr-auto">
          <div class="border text-center">
            <img style="width:11rem; height=150px" src="{{$mede[0]->photo}}" alt="Image" class="img-fluid p-5">
          </div>
        </div>
        <div class="col-md-6">
          <h2 class="tex" style="color: #000;
          text-align: center;" >معلومات الدواء</h2>

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
                  <div style="display: flex; flex-direction: column; text-align: right;">
                  <table class="table custom-table">
                  <thead>
                      <th style="color: #89cffa;">اسم الدواء</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="background-color: rgb(235, 238, 241);">{{$mede[0]->name}}</td>
                    </tr>
                  </tbody>
                </table>

                <table class="table custom-table">
                  <thead>
                      <th style="color: #89cffa;">الكمية</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="background-color: rgb(235, 238, 241);">{{$mede[0]->quantity}}</td>
                    </tr>
                  </tbody>
                </table>
                <table class="table custom-table">
                  <thead>
                      <th style="color: #89cffa;">تصنيف الدواء</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="background-color: rgb(235, 238, 241);">{{$mede[0]->classification}}</td>
                    </tr>
                  </tbody>
                </table>
                <table class="table custom-table">
                  <thead>
                      <th style="color: #89cffa;">التصنيف المفصل </th>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="background-color: rgb(235, 238, 241);">{{$mede[0]->classification_detail}}</td>
                    </tr>
                  </tbody>
                </table>
                <table class="table custom-table">
                  <thead>
                      <th style="color: #89cffa;">حذف الدواء</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="text-align: right; background-color: rgb(235, 238, 241);"><a href="{{route('deletemed',$mede[0]->id)}}" class="btn btn-danger"
                          style="background-color: rgb(211, 33, 33);"
                         >  حذف من المستودع</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              </div>
              <div class="tab-pane fade"
              id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <div style="display: flex; flex-direction: column; text-align: right;">
                  <table class="table custom-table">
                  <thead>
                      <th style="color: #89cffa; ">تاريخ الانتهاء</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="bg-light" style="background-color: rgb(235, 238, 241);">{{$mede[0]->expiry_date}}</td>
                    </tr>
                  </tbody>
                </table>

                <table class="table custom-table">
                  <thead>
                      <th style="color: #89cffa;">للدواء حسم</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="background-color: rgb(235, 238, 241);">{{$mede[0]->dis}}</td>
                    </tr>
                  </tbody>
                </table>
                <table class="table custom-table">
                  <thead>
                      <th style="color: #89cffa;">السعر للصيدلاني</th>
                  </thead>
                  <tbody>
                    <tr>

                      <td style="background-color: rgb(235, 238, 241);">{{$mede[0]->pharmacist_price}}</td>
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
</div>
@endsection
