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
                                    <th class="product-quantity">الكمية</th>
                                    <th class="product-name">اسم الدواء </th>
                                    <th class="product-thumbnail">الصورة</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderdetails as $od)
                                    <tr>
                                        <td>
                                            <div class="product-name">
                                                <h2 class="h5 text-black">{{ $od->quantity }}</h2>
                                        </td>
                    </div>
                    <td class="product-name">
                        <h2 class="h5 text-black">{{ $od->name }}</h2>
                    </td>
                    <td class="product-thumbnail">
                        <img style="width:11rem; height=150px" src="{{ $od->photo }}" alt="Image" class="img-fluid">
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
                <div class="row justify-content-end" style="margin-left: -400px;">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12 text-right border-bottom mb-5">
                                <h3 class="text-black h4 text-uppercase">اذا تم تسليم الطلبية اضغط هنا</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-lg btn-block"
                                    onclick="window.location='{{ route('orderdelivery', $orderdetails[0]->id) }}'">تلبية
                                    الطلبية</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
