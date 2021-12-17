<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | MyHotel</title>
    <link rel="icon" href="img/icon.ico">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style_relog.css">
</head>

    <body>
        <div class="tm-main-content" id="top">
            <section class="ftco-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center mb-5">
                            <h2 class="heading-section">Login ke MyHotel</h2>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-7 col-lg-5">
                            
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="wrap">
                                <div class="img" style="background-image: url(img/bg-1.jpg);"></div>
                                <div class="login-wrap p-4 p-md-5">
                              <div class="d-flex">
                                  <div class="w-100">
                                      <h3 class="mb-4">Sign In</h3>
                                  </div>
                                  
                              </div>
                                <form action="{{ route('login.post') }}" method="POST" class="signin-form" autocomplete="off">
                                    @csrf
                                  <div class="form-group mt-3">
                                      <input type="email" class="form-control" name="email" required value="{{old('email')}}">
                                      <label class="form-control-placeholder" for="email">Email</label>
                                      @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                  </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" name="password" class="form-control" required>
                                    <label class="form-control-placeholder" for="password">Password</label>
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                                </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50 text-left">
                                    <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                    <input type="checkbox" name="remember_me">
                                    <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="#" onclick="alert('Fitur ini masih dalam tahap pengerjaan');">Lupa Password</a>
                                </div>
                            </div>
                          </form>
                          <p class="text-center">Belum memiliki akun? <a data-toggle="tab" href="/register">Daftar</a></p>
                        </div>
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

        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script>
            (function($) {

                "use strict";

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





