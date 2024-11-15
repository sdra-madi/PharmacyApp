<div class="site-navbar py-2">

    <div class="search-wrap">
      <div class="container">
        <a href="#" class="search-close js-search-close">
          <span class="icon-close2"></span></a>
        <form action="#" method="post">
          <input type="text" class="form-control"
          placeholder="Search keyword and hit enter...">
        </form>
      </div>
    </div>

    <div class="container">
      <div class="d-flex align-items-center justify-content-between">
        <div class="logo">
          <div class="site-logo">
            <a href="{{route('main')}}" class="js-logo-clone">
              <strong class="tex" style="color: #89cffa;">  مستودعات </strong>الأدوية </a>
          </div>
        </div>
        <div class="main-nav d-none d-lg-block">
          <nav class="site-navigation text-right text-md-center" role="navigation">
            <ul class="site-menu js-clone-nav d-none d-lg-block">
              <li class="active"><a href="{{route('main')}}">الرئيسية</a></li>
              <li ><a href="{{route('main')}}" >شراء الأدوية</a></li>
              <li><a href="{{route('display')}}" >عرض الأدوية</a></li>
              <li><a href="{{route('discount')}}">إضافة حسم</a></li>
              <li><a href="{{route('order')}}">عرض الطلبيات</a></li>
            </ul>
          </nav>
        </div>
        <div class="icons">
          <a href="#" class="icons-btn d-inline-block bag">
            <span class="icon-shopping-bag"></span>
            <span class="number">2</span>
          </a>
          <a href="#"
           class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
              class="icon-menu"></span></a>
                 {{-- <a href="#" style="size: 12px"
                <i class="fa-solid fa-arrow-right-from-bracket">></i>
                </a> --}}

        </div>
      </div>
    </div>
  </div>
