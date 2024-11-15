<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="tooplate-wave-cafe.css">
    <title>Login</title>
</head>
<body style="background: url(Bubble-Background.svg) ;">
  <div class="container  d-flex justify-content-center pt-5">
   <div class="login-form row border mt-5 rounded " style="background-color:#89cffa;
    ; border-radius: 12px !important;">
    <div class="col-sm-12 text-center mt-2 text-light"><h2>تسجيل الدخول</h2></div>
   <div class="col-sm-6">
    {{-- @if ($errors->any())
     <div class="alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
      </ul>
      </div>
     @endif --}}
    <form method="post" action="loginware">
        @csrf

   <div class="form-group mt-5 ">
    <label for="exampleInputEmail1" class="text-light text-bold float-right"
     style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">رقم الهاتف</label>
    <input type="phone" name="phone_number_call" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="text-align: right;"
      placeholder="أدخل رقم هاتف الاتصال">
   </div>
   <span style="color:red">@error('phone_number_call'){{$message}}@enderror</span>

  <div class="form-group">
    <label for="exampleInputPassword1"  class="text-light text-bold float-right"
    style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;"
    >كلمة المرور</label>
    <input type="password" name="password" class="form-control " style="text-align: right;"
     id="exampleInputPassword1" placeholder="أدخل كلمةالمرور">
  </div>
   <span style="color:red">@error('password'){{$message}}@enderror</span>

  <div class="h22">
    <button type="submit" class="btn bg-light mb-2 mt-5 text-bold mx-5"
    style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
    <a href="{{route('create2')}}">إنشاء حساب</a>
  </button>
    <button type="submit" class="btn bg-light mb-2 mt-5 text-bold"
    style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; ">
    تسجيل الدخول </button>
  </div>

</form></div>
<div class="col-sm-6">
  <img src="images/7375206.png" class="img-fluid w-75  mt-5"  alt=""></div>

   </div>
  </div>


</body>
</html>
