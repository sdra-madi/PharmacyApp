@extends('layout.master')
@section('content')
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="title-section text-center col-12">
                    <h2>عرض <strong class="tex" style="color: black;">الطلبيات</strong></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 block-3 products-wrap">
                    <div class="nonloop-block-3 owl-carousel">

                        @foreach ($orders as $od)
                            <div class="text-center item mb-4 item-v2"
                                style="height: 110%; border-color: #89cffa; background-image: url(bg_1.jpg);">
                                <div style="padding:50px;">
                                    <h4 style="color: rgb(255, 255, 255); margin: 50px; text-align: right;">:اسم الصيدلية
                                        {{ $od->name_pharmacy }}</h4>
                                    <h4 style="color:rgb(255, 255, 255); margin: 50px;
                                       text-align: right;"> :سعر الطلبية
                                        {{ $od->price_order }}</h4>
                                    <h4 class="text" style="margin: 50px;color: #fff; text-align: right;"> :تاريخ الطلبية
                                        {{ $od->order_date }}</h4>
                                    <a href="{{ route('orderdetail', $od->id) }}" class="btn btn-danger"
                                        style="background-color:# ;margin-top: 45px;
                                             border-color: #fff;">
                                        تفاصيل الطلبية</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
