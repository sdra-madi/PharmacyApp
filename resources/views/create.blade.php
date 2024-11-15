<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="css/tooplate-wave-cafe.css">
    <title>createaccount</title>
</head>
<body>
  <div class="create"style="background-color: #89cffa;margin-top: 15px;border-radius: 80px;
   font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">

  <div class="icon">
     <h1 class="text1"  style="text-align: center; margin: 30px;color:#fff;">انضم الينا و أنشىء حساب</h1>
  </div>
<form method="POST" action="create" enctype="multipart/form-data">
    @csrf
<div class="input"
 style="  display: flex;
 justify-content: center;
 font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">

<div class="di1">
    <label for="uname" class="lable" >
      <b style="margin-left: 200px;"> :اسم الشركة</b>
       <input type="text" name="name" class="inpu border" style="text-align: right;"
        placeholder="ادخل اسم الشركة">
       </input>
    </label>
    <span style="color:red">@error('name'){{$message}}@enderror</span>
    <label for="uname" class="lable" ><b  style="margin-left: 200px;"> :كلمة المرور</b>
      <input type="text" name="password"  class="inpu border" style="text-align: right;"
       placeholder="ادخل كلمة المرور"></input>
    </label>
    <span style="color:red">@error('password'){{$message}}@enderror</span>
    <label for="uname" class="lable" >
        <b style="margin-left: 180px;"> :تحديد ايام العمل</b>
        <input type="text" name="workdayes" placeholder="مثال:من يوم الاحد الى الخميس" style="text-align: center;"></input>
      </label>
      <span style="color:red">@error('workdayes'){{$message}}@enderror</span>
    </div>
          <div class="di2">
              <label for="uname" class="lable" ><b style="margin-left: 260px;">:المدينة</b>
                <input type="text" name="city" class="inpu border" style="text-align: right;"
                placeholder="ادخل المدينة"></input>
              </label>
              <span style="color:red">@error('city'){{$message}}@enderror</span>
               <label for="uname" class="lable" >
               <b style="margin-left: 200px;">:اسم المسؤول</b>
              <input type="text" name="name_ofresponse" class="inpu border" style="text-align: right;"
              placeholder="ادخل الاسم"></input>
              </label>
              <span style="color:red">@error('name_ofresponse'){{$message}}@enderror</span>
                <label for="uname" class="lable" >
                <b style="margin-left: 150px;"> :تحديد اوقات العمل</b>
                <input type="time" name="worktime_from"  style="text-align: center;"></input>
                <span style="color:red">@error('worktime_from'){{$message}}@enderror</span>
                 <input type="time" name="worktime_to"  style="text-align: center;" ></input>
                 <span style="color:red">@error('worktime_to'){{$message}}@enderror</span>
              </label>

            </div>

        <div class="di3">
              <label for="uname" class="lable" >
                <b style="margin-left: 215px;"> :رقم الهاتف</b>
                <input type="text" name="phone_number" class="inpu border" style="text-align: right;"
                 placeholder="ادخل رقم الهاتف" ></input>
              </label>
              <span style="color:red">@error('phone_number'){{$message}}@enderror</span>
         <div style="display: flex; flex-direction: column; text-align: right; margin-top: 45px;">
             <label for="medname" class="float-right text-light" style="color:#89cffa  ; font-size:30px; margin-right: 20px;">:صورة الشعار
                <input type="file" name="photo" class=" form-control " style="width: 70%; margin-left: 100px;"
                 id="medname" >
                </label>
                <span style="color:red">@error('photo'){{$message}}@enderror</span>
         </div>
              <label for="uname" class="lable" ><b style="margin-left: 230px;">:رقم الترخيص </b>
                <input type="text" name="license_number" class="inpu border"style="text-align: right;"
                 placeholder="ادخل رقم الترخيص" ></input>
              </label>
              <span style="color:red; text-align:center;">@error('license_number'){{$message}}@enderror</span>
            </div>
            </div>
            <div class="bt" style="display: flex; justify-content:space-evenly;  margin: 10px;">
              <button type="submit" class=" btn btn-white mt-5" style="background-color:rgb(15, 127, 179); ">حفظ</button>
              {{-- <button type="button" class="btn  btn-white  mt-5" style="background-color:rgb(223, 30, 30);">إلغاء</button> --}}
            </div>
</div>
</form>
</div>
</body>
</html>
