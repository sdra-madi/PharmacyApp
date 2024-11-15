<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>company</title>
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    <!-- https://fontawesome.com/ -->

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" /> <!-- https://fonts.google.com/ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/tooplate-wave-cafe.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome-free-5.12.0-web/css/all.min.css')}}">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>
<body>
  <div class="tm-container">
   {{-- style="background-color:#fff;background-size: cover;"> --}}
    <div class="tm-row">
      <!-- Site Header -->
      <div class="tm-left">
        <div class="tm-left-inner">
          <div class="tm-site-header">
            <h1 class="tm-site-name" >شركات الأدوية</h1>
          </div>
          <nav class="tm-site-nav">
            <ul class="tm-site-nav-ul">
              <li class="tm-page-nav-item">
                <a href="#drink" class="tm-page-link active">
                  <span class="text">الرئيسية</span>
                  <i class="fa-solid fa-house-chimney tm-page-link-icon"></i>
                </a>
              </li>
              <li class="tm-page-nav-item">
                <a href="#special" class="tm-page-link">
                  <span class="text">عرض الأدوية</span>
                  <i class="fa-solid fa-pills"></i>
                </a>
              </li>
              <li class="tm-page-nav-item">
                <a href="#about" class="tm-page-link">
                  <span class="text">حول الموقع</span>
                  <i class="fas fa-users tm-page-link-icon"></i>
                </a>
              </li>
              <li class="tm-page-nav-item">
                <a href="#contact" class="tm-page-link">
                  <span class="text">تواصل معنا</span>
                  <i class="fas fa-comments tm-page-link-icon"></i>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>

      <div class="tm-right">
        <main class="tm-main">
          <div id="drink" class="tm-page-content">
            <!-- Drink Menu Page -->
            <nav class="tm-black-bg tm-drinks-nav">
              <ul>
                <li>
                  <a href="#" class="tm-tab-link active" data-id="cold"
                   style="font-size:x-large; color: #fff ;text-decoration: none;"> إضافة أدوية</a>
                </li>

                {{-- <li>
                  <a href="#" class="tm-tab-link" data-id="hot"
                  style="font-size:x-large; color: #fff;text-decoration: none;"> إنشاء طبخة </a>
                </li> --}}
                <li>
                  <a href="#" class="tm-tab-link" data-id="juice"
                  style="font-size:x-large ; color: #fff;text-decoration: none;">قائمة الطلبيات</a>
                </li>
              </ul>
            </nav>

<div id="cold" class="tm-tab-content">
              <div class="tm-list">
                <div class="tm-list-item">
                  <img src="{{asset('images/pexels-polina-tankilevitch-3873141.jpg')}}" alt="Image"
                   style="background-color: rgb(245, 220, 220);
                    border-radius: 40px;" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h4 class="tm-list-item-name "
                    style="margin-left:300px; color:#ffffff;font-size:1.7em"> :صنف الحبوب </h4>
                    <p class="tm-list-item-description" style="color: #ffffff; font-size:1.5em">.( ... , يمكنك  من  هنا  إضافة أي  نوع  من  أصناف  الحبوب ( كبسولات</p>
                    <button type="button" class=" btn btn-white mt-5" style="margin-left:320px;
                    height: 40px; width: 70px; border-radius: 40px; background-color: rgb(194, 193, 193); border: #099;" >
                      <a href="{{route('addmed')}}" class="i" style="text-decoration: none;
                       color: #099; font-size:x-large;">إضافة</a></button>

                  </div>
                </div>
                <div class="tm-list-item">
                  <img src="{{asset('images/pexels-artem-podrez-5878523 (1).jpg')}}" alt="Image"
                   class="tm-list-item-img"
                   style="background-color:  rgb(245, 220, 220); border-radius: 40px;">
                  <div class="tm-black-bg tm-list-item-text">
                    <h4 class="tm-list-item-name" style="margin-left:300px;color: #ffffff;font-size:1.7em
                     ; border-radius: 40px;"> :صنف الحقن</h4>

                    <p class="tm-list-item-description" style="margin-left: 80px ;
                    color: #ffffff; font-size:1.5em";> .يمكنك من هنا إضافة المزيد من أصناف الحقن المختلفة</p>

                    <button type="button" class=" btn btn-white mt-5" style="margin-left:320px;
                    height: 40px; width: 70px; border-radius: 40px; background-color:  rgb(194, 193, 193); border: #099;" >
                      <a href="{{route('addmed')}}" class="i" style="text-decoration: none;
                       color: #099; font-size:x-large;">إضافة</a></button>
                  </div>
                </div>
                <div class="tm-list-item">
                  <img src="{{asset('images/pexels-alena-shekhovtcova-6074962.jpg')}}" alt="Image"
                   class="tm-list-item-img"
                   style="background-color:  rgb(245, 220, 220);  border-radius: 40px;">
                  <div class="tm-black-bg tm-list-item-text">
                    <h4 class="tm-list-item-name" style="margin-left:300px; color: #ffffff;font-size:1.7em"> :صنف القطرات</h4>

                    <p class="tm-list-item-description" style="margin-left: 80px;
                    color: #ffffff;font-size:1.5em";> .يمكنك من هنا إضافة المزيد من أصناف القطرات المختلفة</p>

                    <button type="button" class=" btn btn-white mt-5" style="margin-left:320px;
                    height: 40px; width: 70px; border-radius: 40px; background-color: rgb(194, 193, 193);; border: #099;" >
                      <a href="{{route('addmed')}}" class="i" style="text-decoration: none;
                       color: #099;; font-size:x-large;">إضافة</a></button>

                  </div>
                </div>
                <div class="tm-list-item">
                  <img src="{{asset('images/file-20190718-116562-1q8iwh7.jpg')}}" alt="Image"
                   class="tm-list-item-img"
                     style="background-color:  rgb(245, 220, 220);  border-radius: 40px;">
                  <div class="tm-black-bg tm-list-item-text">
                    <h4 class="tm-list-item-name" style="margin-left:300px; color: #ffffff;font-size:1.7em"> :صنف الشرابات</h4>

                    <p class="tm-list-item-description" style="margin-left: 80px;
                    color: #ffffff;font-size:1.5em";> .يمكنك من هنا إضافة المزيد من أصناف الشرابات المختلفة</p>

                    <button type="button" class=" btn btn-white mt-5" style="margin-left:320px;
                    height: 40px; width: 70px; border-radius: 40px; background-color:  rgb(194, 193, 193);border: #099;;" >
                      <a href="{{route('addmed')}}" class="i" style="text-decoration: none;
                       color: #099;; font-size:x-large;">إضافة</a></button>
                  </div>
                </div>
                <div class="tm-list-item">
                  <img src="{{asset('images/pexels-anna-shvets-3962516.jpg')}}"
                   alt="Image" class="tm-list-item-img" style=" border-radius: 40px;">
                  <div class="tm-black-bg tm-list-item-text">
                    <h4 class="tm-list-item-name" style="margin-left:300px; color: #ffffff;font-size:1.7em"> :صنف المعقمات</h4>

                    <p class="tm-list-item-description" style="margin-left: 80px ;
                    color: #ffffff;font-size:1.5em"> .يمكنك من هنا إضافة المزيد من أصناف المعقمات المختلفة</p>

                    <button type="button" class=" btn btn-white mt-5" style="margin-left:320px;
                    height: 40px; width: 70px; border-radius: 40px;background-color: rgb(194, 193, 193);; border: #099;;" >
                      <a href="{{route('addmed')}}" class="i" style="text-decoration: none;
                       color: #099; font-size:x-large;">إضافة</a></button>
                  </div>
                </div>
                <div class="tm-list-item">
                  <img src="{{asset('images/pexels-ray-piedra-2720447.jpg')}}"
                   alt="Image" class="tm-list-item-img " style=" border-radius: 40px;">
                  <div class="tm-black-bg tm-list-item-text">
                    <h4 class="tm-list-item-name" style="margin-left:310px; color: #ffffff;font-size:1.7em"> :صنف الكريمات</h4>

                    <p class="tm-list-item-description" style="margin-left: 80px
                     ;color: #ffffff;font-size:1.5em";> .يمكنك من هنا إضافة المزيد من أصناف الكريمات المختلفة</p>

                    <button type="button" class=" btn btn-white mt-5" style="margin-left:320px;
                    height: 40px; width: 70px; border-radius: 40px; background-color: rgb(194, 193, 193);border: #099;;" >
                      <a href="{{route('addmed')}}" class="i" style="text-decoration: none;
                       color: #099;; font-size:x-large;">إضافة</a></button>
                  </div>
                </div>

                <div class="tm-list-item">
                  <img src="{{asset('images/hero_1.jpg')}}"
                   alt="Image" class="tm-list-item-img"
                    style=" border-radius: 40px; background-color: rgb(235, 229, 229);">
                 <div class="tm-black-bg tm-list-item-text">
                     <h4 class="tm-list-item-name" style="margin-left:300px; color: #ffffff;font-size:1.7em"> :أصناف أخرى</h4>
                     <p class="tm-list-item-description" style="margin-left: 170px; color: #ffffff;font-size:1.5em;";>
                       .يمكنك من هنا إضافة أنواع الأدوية الجديدة</p>
                     <button type="button" class=" btn btn-white mt-5" style="margin-left:320px;
                     height: 40px; width: 70px;   background-color:  rgb(194, 193, 193);; border-radius: 40px; border: #099;;" >
                      <a href="{{route('addmed')}}" class="i" style="text-decoration: none; color:#099;;
                      font-size:x-large;">إضافة</a></button>
                 </div>
                </div>
     </div>
</div>
</div>

{{-- <div id="hot" class="tm-tab-content">
              <div class="tm-list" >

 <div class="tm-list-item" >
 <div class="tm-black-bg tm-list-item-text" style="background-color: rgb(194, 193, 193) ;flex:1">
  <div class="container" style="color: #099 ;width:auto; flex:1">
   <h2 style="color: #099; text-align:center"> اضغط لإختيار محتويات طبخة الأدوية</h2>
   <div class="dropup" style="margin-top: 190px; margin-left:180px ;">
   <button style="background-color:#099 ; height: 50px; width: 230px;font-size: xx-large; color: #fff; "
    class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">من هنا
   <span class="caret"></span></button>
   <ul class="dropdown-menu">
   <table style=" display: flex; justify-content:space-evenly;
   width: 330px; border: 1px solid #89cffa;
    background-color: #89cffa;
     border-collapse: collapse;
      padding-left: 40px;
       padding-right: 40px;">  <tr>
   <th  scope="col" class="text-primary"
    style=" padding-left: 25px; padding-right: 25px;
    font-size: x-large; color: #fff;">جميع الادوية </th>
    <th scope="col"  class="text-primary"
     style=" font-size: x-large; padding-left: 25px; color: #fff;
      padding-right: 25px;">     اختيار</th>
    </tr>
    @foreach($med as $m)
    <form method="GET" action="{{url ('addrecipe/'.($m->id))}}">
        @csrf
  <tr>
  <td style="text-align: right;"> {{$m->name}}</td>
  <td style="text-align: center;"><input type="checkbox" name="arr" id=""> </td>
  </tr>
   @endforeach
 </table>
 <button type="submit" class="tm-btn-primary tm-align-right" style="background-color:#89cffa ;border-radius: 45px;color: #fff; font-size: larger;">
  إضافة للجدول</button>
</form>
  </ul>

                      </div>
                     </div>

                  </div>
 </div> --}}






{{-- <div class="tm-list-item">

<div class="tm-black-bg tm-list-item-text" >
  <div class="table-box">
<table style="background-color:#fff; border-color: #493680;">
  <tr>
      <th  scope="col" class="text-primary"
      style="color:#493680;  padding: 20px;">نوع الدواء </th>
    <th scope="col" class="text-primary"
     style="color:#493680;  padding: 20px;">السعر للصيدلاني</th>
    <th scope="col" class="text-primary"
     style="color:#493680;  padding: 20px;">السعر للمستودع</th>
    <th scope="col"  class="text-primary"
    style="color:#493680;  padding: 20px;">الكمية</th>
    <th scope="col"  class="text-primary"
     style="color:#493680; padding: 20px;">تاريخ الانتهاء</th>
  </tr>
  <tr style="color: #493680;">
    <td  style="text-align: right;">بروفين1</td>
    <td style="text-align: right;">1500</td>
    <td style="text-align: right;">1800</td>
    <td style="text-align: right;">50</td>
    <td style="text-align: right;">20/3/2023</td>
  </tr>

</table>
  </div>
 </div>
</div> --}}


{{-- </div>
</div> --}}













<div id="juice" class="tm-tab-content">
  <div class="tm-list">
   <div class="tm-list-item">
    <div class="nonloop-block-3 owl-carousel ">
        @foreach ($compord as $co)
        <div class="text-center item mb-4 item-v2"
            style="height: 90%; border-color: #89cffa; background-color:rgb(194, 193, 193);">
            <div style="padding:50px;">
                <h4 style="color: #099; margin: 50px; text-align: right;">اسم المستودع : {{ $co->name }}</h4>
                <h4 style="color:#099; margin: 50px;
                   text-align: right;">سعر الطلبية  :{{ $co->price_order }}</h4>
                <h4 class="text" style="margin: 50px;color: #099; text-align: right;"> تاريخ الطلبية : {{ $co->created_at }}</h4>
                <a href="{{ route('showorder', $co->id) }}" class="btn btn-danger"
                    style="background-color: #099;margin-top: 45px;
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

 <div id="about" class="tm-page-content">
            <div class="tm-black-bg tm-mb-20 tm-about-box-1" style="background-color:rgb(194, 193, 193)">
              <h2 class=""
              style="color:  #099; margin-left: 300px;font-size:40px;font-weight: 400;">حول موقعنا</h2>
              <div class="tm-list-item tm-list-item-2">
                <img src="images/pexels-karolina-grabowska-4021801.jpg" style="background-color: rgb(245, 220, 220);
                border-radius: 40px;margin-left:20px; margin-bottom: 50px;" alt="Image" class="tm-list-item-img tm-list-item-img-big">
                <div class="tm-list-item-text-2">
                  <p style="font-size:25px; color:  #060507; text-align: right;"
                   lang="ar"> موقع الأدوية هذا هو موسوعة دوائية على شبكة الانترنت يوفر المعلومات لشركات إمكانية إضافة أدويتها بسهولة </p>
                  <p style="font-size:25px; color:  #060507; text-align: center;"
                   lang="ar">كل شركات الادوية يمكنها تقديم محتوياتها  من خلال هذا الموقع بطابع مميز ومختلف دون الحاجة لمندوب دوائي  </p>
                </div>
              </div>
            </div>
            <div class="tm-black-bg tm-mb-20 tm-about-box-2">
              <div class="tm-list-item tm-list-item-2">
                <div class="tm-list-item-text-2">
                  <h2 class="tm-text-primary "
                  style="color:  #060507; font-size:30px;font-weight: 400; margin-left:40px;">  كيف يمكنك الاستفادة من موقعنا؟</h2>
                  <p style="font-size:25px; color:  rgb(194, 193, 193); text-align: right;"> كل ماعليك هو أن تقوم بإنشاء حساب وتبدأ بعرض الأدوية التي تصنعها شركتك ليستطيع المهتمين بمعرفة محتوياتك وتجريبها وهناك المزيد من اليزات قم بزيارة الموقع </p>
                </div>
                <img src="images/hero_bg.jpg" alt="Image" style="background-color: rgb(245, 220, 220);
                border-radius: 40px; margin-right:15px; margin-top:30px;" class="tm-list-item-img tm-list-item-img-big tm-img-right">
              </div>
              <p></p>
            </div>
          </div>

          <!-- Special Items Page -->
<div id="special" class="tm-page-content">
            <div class="tm-special-items">
                @foreach($med as $m)
              <div class="tm-black-bg tm-special-item" style="width: 15rem; background-color:rgb(194, 193, 193);">
                <img  style="width:14rem;" height="150px" src="{{$m->photo}}" alt="Image">
                <div class="tm-special-item-description">
                  <h2 class="tm-text-primary tm-special-item-title">{{$m->name}}</h2>
                  <p class="tm-special-item-text">{{$m->classification}}</p>
                </div>
              </div>
              @endforeach
            </div>
</div>
          <!-- end Special Items Page -->

          <!-- Contact Page -->
<div id="contact" class="tm-page-content">
            <div class="tm-black-bg tm-contact-text-container">
              <h2 class="tm-text-primary" style="margin-left:240px; color:rgb(194, 193, 193);">للتواصل </h2>
              <p style="font-size: 22px; color:  #060507; text-align: center; "
              >للاستفسار وللمزيد من المعلومات  يمكنك التواصل معنا وإرسال ملاحظاتك وآرائك  برسالة نصية  من خلال بريدك الإلكتروني</p>
            </div>
            <div class="tm-black-bg tm-contact-form-container tm-align-right" style="background-color:  rgb(194, 193, 193)">
              <form action="post" method="contact" id="contact-form">
                @csrf
                <div class="tm-form-group" >
                  <input  style="color:#099; font-size: 18px; text-align: right;" type="text" name="name"
                    class="tm-form-control"  placeholder="الاسم"/>
                </div>
                <div class="tm-form-group">
                  <input style="color:  #099; font-size:18px ; text-align: right;"
                   type="email" name="email" class="tm-form-control"placeholder="الايميل الشخصي" required="" />
                </div>
                <div class="tm-form-group tm-mb-30">
                  <textarea  style="color: #099; font-size: 18px ; text-align: right;"
                   rows="6" name="message" class="tm-form-control" placeholder="رسالتك لنا" required=""></textarea>
                </div>
                <div>
                  <button type="submit" class="tm-btn-primary tm-align-right"
                   style="color:rgb(194, 193, 193); background-color: #099; font-size:19px">
                   إرسال
                  </button>
                </div>
              </form>
            </div>
          </div>
          <!-- end Contact Page -->

        </main>

      </div>
    </div>
    <footer class="tm-site-footer">
      <p class="tm-black-bg tm-footer-text">Copyright 2020 Wave Cafe

      | Design: <a href="https://www.tooplate.com" class="tm-footer-link" rel="sponsored" target="_parent">Tooplate</a></p>
    </footer>
  </div>


  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script>

    function setVideoSize() {
      const vidWidth = 1920;
      const vidHeight = 1080;
      const windowWidth = window.innerWidth;
      const windowHeight = window.innerHeight;
      const tempVidWidth = windowHeight * vidWidth / vidHeight;
      const tempVidHeight = windowWidth * vidHeight / vidWidth;
      const newVidWidth = tempVidWidth > windowWidth ? tempVidWidth : windowWidth;
      const newVidHeight = tempVidHeight > windowHeight ? tempVidHeight : windowHeight;
      const tmVideo = $('#tm-video');

      tmVideo.css('width', newVidWidth);
      tmVideo.css('height', newVidHeight);
    }

    function openTab(evt, id) {
      $('.tm-tab-content').hide();
      $('#' + id).show();
      $('.tm-tab-link').removeClass('active');
      $(evt.currentTarget).addClass('active');
    }

    function initPage() {
      let pageId = location.hash;

      if(pageId) {
        highlightMenu($(`.tm-page-link[href^="${pageId}"]`));
        showPage($(pageId));
      }
      else {
        pageId = $('.tm-page-link.active').attr('href');
        showPage($(pageId));
      }
    }

    function highlightMenu(menuItem) {
      $('.tm-page-link').removeClass('active');
      menuItem.addClass('active');
    }

    function showPage(page) {
      $('.tm-page-content').hide();
      page.show();
    }

    $(document).ready(function(){

      /***************** Pages *****************/

      initPage();

      $('.tm-page-link').click(function(event) {

        if(window.innerWidth > 991) {
          event.preventDefault();
        }

        highlightMenu($(event.currentTarget));
        showPage($(event.currentTarget.hash));
      });


      /***************** Tabs *******************/

      $('.tm-tab-link').on('click', e => {
        e.preventDefault();
        openTab(e, $(e.target).data('id'));
      });

      $('.tm-tab-link.active').click(); // Open default tab


      /************** Video background *********/

      setVideoSize();

      // Set video background size based on window size
      let timeout;
      window.onresize = function(){
        clearTimeout(timeout);
        timeout = setTimeout(setVideoSize, 100);
      };

      // Play/Pause button for video background
      const btn = $("#tm-video-control-button");

      btn.on("click", function(e) {
        const video = document.getElementById("tm-video");
        $(this).removeClass();

        if (video.paused) {
          video.play();
          $(this).addClass("fas fa-pause");
        } else {
          video.pause();
          $(this).addClass("fas fa-play");
        }
      });
    });

  </script>
</body>
</html>
