<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="main.css">
    <title>Add Medicen</title>
 </head>
 <body style="min-height: 100vh; background: url(images/hero_bg_2.jpg); background-size: cover; background-repeat: no-repeat;">
    <nav class="navbar navbar-expand-lg navbar-light bg-none">
        <a class="navbar-brand" href="#">
        <button class="navbar-toggler"
         type="button" data-toggle="collapse"
          data-target="#navbarSupportedContent"
           aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="container">
        @if(Session::has('message_sent'))
        <div class="alert alert-success">
            {{Session::get('message_sent')}}
       </div>
       @endif
<h1 class="" style="margin-left:540px; color: #099;">أضف دواءً جديداً</h1>
<div class="container  p-5 d-flex justify-content-center">
    <form method="POST" action="storemed" class=" p-5 rounded" style="background-color:rgba(68, 68, 68, 0.6) ;margin-left: 330px;" enctype="multipart/form-data">
        @csrf
     <div class="row" style="margin-left: 135px;">
        <div class="form-group col-sm-6 ">
          <label for="medname" class="float-right text-light"
          style="float: right;" > :اسم الدواء</label>
            <input type="text" name="name" class="form-control" style="float: left;"
            id="medname" aria-describedby="emailHelp" placeholder="أدخل اسم الدواء" required>

          </div>
     </div>
     <div class="row" style="margin-left: 135px;">
        <div class="form-group col-sm-6">
          <label for="medname" class="float-right text-light"> التصنيف </label>
          <input type="text" name="classification" class="form-control" id="medname" aria-describedby="emailHelp" placeholder="أدخل التصنيف" required>

        </div>
     </div>

     <div class="row" style="margin-left: 135px;">
              <div class="form-group col-sm-6">
                <label for="medname" class="float-right text-light"> التصنيف المفصل</label>
                <input type="text" name="classification_detail" class="form-control" id="medname" aria-describedby="emailHelp" placeholder="أدخل التصنيف المفصل" required>

              </div>
     </div>
     <div class="row " style="margin-left: 135px;">

              <div class="form-group col-sm-6 " >
                <label for="medname" class="float-right text-light">:الباركود الخاص بالدواء </label>
                <input type="text" name="parcode" class="form-control" id="medname" aria-describedby="emailHelp"
                placeholder="أدخل الباركود" required>

              </div>
     </div>
     <div class="form-group col-sm-6" style="margin-left:75px;">
      <label for="medname"
      class="float-right text-light"
      style="color:#099  ;">:صورة للدواء </label>
      <input type="file" name="photo" class=" form-control "
       id="medname" aria-describedby="emailHelp" >
     </div>
     <div class="col-sm-12 w-100 py-5 d-flex justify-content-center"
          style="margin-right: 10px;">
        <button type="submit" class="btn btn-danger px-5"
         style=" background-color:#099; margin-right: 42px;
          border-color:#89cffa ;">إضافة دواء</button>
     </div>
 </form>
</div>

</div>
</body>
</html>
