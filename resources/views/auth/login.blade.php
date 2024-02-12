@extends('auth.layouts')

@section('content')

<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            
            {{-- <p style="text-align: justify; text-justify: inter-word;" class="col-lg-10 fs-4">an innovative online platform tailored specifically for student councils. Our user-friendly interface simplifies the voting process, enabling students to cast their votes conveniently and securely from anywhere.</p> --}}
            <img src="{{ URL('images/login-illustration.svg') }}" alt="Council Cast Illustration" style="max-width: 480px; height: auto; left: 30px; display: block; margin-left: auto; margin-right: auto; width: 100%;">
            
            {{-- <h4 style="display: block; margin-left: auto; margin-right: auto; width: 50%; text-align: center; color: #555; font-size: 18px; font-weight: normal;">Digital Voting System</h4> --}}

        </div>
        <br><br>
        <div class="col-md-10 mx-auto col-lg-5">
            <form class="p-4 p-md-5 border rounded-3 bg-light" action="{{ route('authenticate') }}" method="post">
                @csrf
                <div class="col-lg-10 fs-8 fw-bold">
                    VOTER
                </div>
                <h1 class="display-8 fw-bold lh-1 mb-3">
                    Login
                    <div class="float-end">
                        <a href="{{ route('personnel.login') }}" class="btn btn-primary btn-sm">Personnel &rarr;</a>
                    </div>
                </h1>
                
                <hr class="my-4">
                <div class="form-floating mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class='bx bx-id-card'></i></span> <!-- Email icon -->
                        <input type="loginID" class="form-control @error('loginID') is-invalid @enderror" id="loginID" name="loginID" value="{{ old('loginID') }}" placeholder="Enter Student ID">
                        @if ($errors->has('loginID'))
                            <div class="invalid-feedback">{{ $errors->first('loginID') }}</div> <!-- Error message with Bootstrap error style -->
                        @endif
                    </div>
                    
                </div>
                {{-- <div class="form-floating mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class='bx bxs-lock'></i></span> <!-- Password icon -->
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="•••••••">
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">{{ $errors->first('password') }}</div> <!-- Error message with Bootstrap error style -->
                        @endif
                    </div>
                </div> --}}
                {{-- <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div> --}}
                <input type="submit" class="w-100 btn btn-lg btn-primary" value="Login">
                {{-- <hr class="my-4"> --}}<br><br>
                
                <small class="text-muted">By logging in, you agree to the terms of use.</small>
            </form>
            
        </div>
    </div>
</div>



@endsection