<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>company</title>
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <!-- https://fontawesome.com/ -->

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
    <!-- https://fonts.google.com/ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/tooplate-wave-cafe.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-5.12.0-web/css/all.min.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>

<body>
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post">
                <br>
                <br>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">الكمية</th>
                            <th scope="col">اسم الدواء</th>
                            <th scope="col">الصورة</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($showorderdetail as $show)
                            <tr>
                                <td>
                                    <h2 class="h5 text-black">{{ $show->quantity }}</h2>
                                </td>
                                <td>
                                    <h2 class="h5 text-black" style="font-size: 20px;  ">{{ $show->name }}</h2>
                                </td>
                                <td><img style="width:11rem; height=150px" src="{{ $show->photo }}" alt="Image"
                                        class="img-fluid " style="width: 20% ; hight:20%"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
                                    onclick="window.location='{{ route('confirm', $showorderdetail[0]->id) }}'">تلبية
                                    الطلبية</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
</body>

</html>
