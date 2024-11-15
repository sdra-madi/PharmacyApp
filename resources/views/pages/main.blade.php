@extends('layout.master')
@section('content')
<div class="owl-carousel owl-single px-0">
    <div class="site-blocks-cover overlay"
    style="background-image: url('images/hero_bg.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 mx-auto align-self-center">
            <div class="site-block-cover-content text-center">
              <h1 class="mb-0">
                <strong class="tex" style="color: #89cffa;">مستودعات</strong>
                 الأدوية</h1>

              <div class="row justify-content-center mb-5">
                <div class="col-lg-6 text-center">
                  <p>هذا الموقع يوفر الكثير من الميزات  لأصحاب  مستودعات الأدويدوية
                    ويمكن للسمتخدم إضافة الأدوية أو عرض الأدوية والمزيد من المزايا تتعرف عليها عند تصفحك للموقع.
                  </p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-blocks-cover overlay" style="background-image: url('images/hero_bg_2.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 mx-auto align-self-center">
            <div class="site-block-cover-content text-center">
              <h1 class="mb-0">أهمية
                 <strong class="tex" style="color: #89cffa;">الموقع</strong></h1>
              <div class="row justify-content-center mb-5">
                <div class="col-lg-6 text-center">
                  <p>يوفر الموقع إتاحية اكبر واسرع لأصحاب مستودعات الأدوية بما في ذلك تعامل أكبر قدر ممكن من المستخدمين الذين سيوفرون وقت اكبر عند استخدامه</p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

</div>
<div class="site-section bg-light">
    <div class="container">
      <div class="row">
        <div class="title-section text-center col-12">
          <h2>شراء <strong class="tex" style="color: black;">أدوية</strong></h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 block-3 products-wrap">
          <div class="nonloop-block-3 owl-carousel">
            @foreach ($company as $c )
            <div class="text-center item mb-4 item-v2">
              <a href="shop.html">
                <img style="width:11rem; height=150px ;" src="{{$c->photo}}" alt="Image"></a>
              <h3 class="text-dark"><a href="{{route('shope',$c->id)}}">{{$c->name}}</a></h3>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
