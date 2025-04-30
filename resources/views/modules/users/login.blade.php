@extends('welcome')

@section('login')
    <div class="login-box">
        <div class="login-logo">
            <img class="img-responsive" src="{{ url('storage\plantilla\logo-blanco-bloque.png') }}" alt=""
                style="padding: 30px 100px 0px 100px;">
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body" style="border-radius: 20px;">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                    @error('email')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row" style="padding: 20px;">
                    {{-- <div class="col-xs-6">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div> --}}
                    <!-- /.col -->
                    <div class="col-xs-12" style="padding: 2px;">
                        <button type="submit" class="btn btn-primary btn-block btn-flat" style="border-radius: 20px;">Sign
                            In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            {{-- <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign
                    in using
                    Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i>
                    Sign in using
                    Google+</a>
            </div> --}}
            <!-- /.social-auth-links -->
            {{--
            <a href="#">I forgot my password</a><br>
            <a href="register.html" class="text-center">Create an account</a> --}}

        </div>
        <!-- /.login-box-body -->
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');

            form.addEventListener('submit', function(e) {
                const email = form.querySelector('input[name="email"]').value.trim();
                const password = form.querySelector('input[name="password"]').value.trim();

                if (email === '' || password === '') {
                    e.preventDefault();

                    Swal.fire({
                        icon: 'warning',
                        title: 'Campos obligatorios',
                        text: 'Por favor, completa el email y la contraseña.',
                    });
                }
            });
        });
    </script>
@endsection
