<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    @include('layouts.style')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
</head>
<body>
    <main>
        <div class="wrapper-login">
            <div class="from-area w-50 m-auto p-3 rounded shadow bg-white">
                @include('error.error_message')
                <div class="login-title text-center text-black">
                    <h2>Login</h2>
                    <p>Task Management System</p>
                </div>
                <form action="{{route('login.store')}}" method="POST" class="">
                    @csrf
                   
                   <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control required" name="email" placeholder="Email">
                      @if ($errors->has('email'))
                          <span class="error text-danger">{{ $errors->first('email') }}</span>
                      @endif
                  </div>
    
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="password" value="">
                        @if ($errors->has('password'))
                            <span class="error text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary m-auto text-center d-block">Submit</button>
                </form>
                <div class="register">
                    <span>don't have account?</span>
                    <a href="{{route('register')}}">register</a>
                </div>
            </div>
        </div>
    </main>

    @include('layouts.script')
</body>
</html>