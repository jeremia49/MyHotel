<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tambah Room | MyHotel Admin</title>
    <link rel="icon" href="/img/icon.ico">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style_relog.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

    <body>
        <div class="tm-main-content" id="top">
            <section class="ftco-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center mb-5">
                            <h2 class="heading-section">Tambah Room</h2>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-7 col-lg-5">
                            <div class="wrap">
                                <div class="img" style="background-image: url(/img/bg-1.jpg);"></div>
                                <div class="login-wrap p-4 p-md-5">
                                <div class="d-flex">
                                    <div class="w-100">
                                        <h3 class="mb-4">Add Room</h3>
                                    </div>                                  
                                </div>
                                <form action="{{route('tambahroom.post')}}" method="POST" class="signin-form" autocomplete="off">
                                    @csrf
                                    
                                    <div class="form-group mt-3">
                                        <select class="select-basic-single @error('hotel_id') is-invalid @enderror" name="hotel_id" id="inputCity" required width="100%">
                                            <option value="">Hotel</option>
                                            @foreach ($hotels as $hotel)
                                              <option value="{{$hotel->id}}">{{$hotel->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mt-3">
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required value="{{ old('nama') }}">
                                        <label class="form-control-placeholder" for="nama">Nama Room</label>
                                    </div>
                                    <div class="form-group mt-3">
                                        <input type="number" class="form-control @error('max_capacity') is-invalid @enderror" id="max_capacity" name="max_capacity" required value="{{ old('max_capacity') }}">
                                        <label class="form-control-placeholder" for="max_capacity">Banyak Room</label>
                                    </div>
                                    <div class="form-group mt-3">
                                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" required value="{{ old('price') }}">
                                        <label class="form-control-placeholder" for="price">Harga</label>
                                    </div>
                                    <div class="form-group mt-3">
                                        <input type="text" class="form-control @error('tamu') is-invalid @enderror" id="tamu" name="tamu" required value="{{ old('tamu') }}">
                                        <label class="form-control-placeholder" for="tamu">Maksimal Tamu</label>
                                    </div>
                                    <div class="form-group mt-3">
                                        <input type="text" class="form-control @error('luas') is-invalid @enderror" id="luas" name="luas" required value="{{ old('luas') }}">
                                        <label class="form-control-placeholder" for="luas">Luas</label>
                                    </div>
                                    <div class="form-group mt-3">
                                        <input type="text" class="form-control @error('fasilitas') is-invalid @enderror" id="fasilitas" name="fasilitas" required value="{{ old('fasilitas') }}">
                                        <label class="form-control-placeholder" for="fasilitas">Fasilitas</label>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="form-control btn btn-primary rounded submit px-3" >Tambah</button>
                                    </div>
                                    
                                </form>
                                @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <footer class="tm-bg-dark-blue">
                <div class="container">
                    <div class="row">
                        <p class="col-sm-12 text-center tm-font-light tm-color-white p-4 tm-margin-b-0">
                        Copyright &copy; <span class="tm-current-year">2021</span> Kelompok PPW Ilmu Komputer 2020</p>        
                    </div>
                </div>                
            </footer>
        </div>

        <script src="/js/jquery-1.11.3.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            (function($) {

                "use strict";
                
                $('#inputCity').select2({
                  width:'100%',
                });

                $(".toggle-password").click(function() {

                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
                });

            })(jQuery);

        </script>
</body>
</html>