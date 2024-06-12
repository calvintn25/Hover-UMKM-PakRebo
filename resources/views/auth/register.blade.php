 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ea590c57b3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="registerstyle.css">
</head>

{{-- @extends('layouts.app')

@section('content') --}}
<body class="bg">
	<section class="ctr-div">
		<div class="mask d-flex align-items-center h-100 gradient-custom-3">
			<div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        	<div class="col-12 col-md-9 col-lg-7 col-xl-6">
						<div class="card-body p-5 border-none">
							<div class="float-start">
								<h2 class="text-uppercase text-center">Create an account</h2>
                <h6>Already have an account? <a href="/login">Login</a></h3>
              </div> <br><br><br><br>
								{{-- <div class="card-header">{{ __('Register') }}</div> --}}

							<form method="POST" action="{{ route('register') }}">
									@csrf

								<div class="row pb-3">
									<div class="col">
										<label for="name">{{ __(' Name') }}</label>

										<input id="name" type="text" class="form-control form-control-sm custom-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

										@error('name')
												<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
												</span>
										@enderror
									</div>
								</div>
								<div class="row pb-3">
									<div class="col">
										<label for="email p-2"> {{ __('Email Address') }}</label>
										<input id="email" type="email" class="form-control form-control-sm custom-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

										@error('email')
												<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
												</span>
										@enderror
									</div>
								</div>

								<div class="row pb-3">
									<div class="col">
										<label for="password">{{ __('Password') }}</label>
										<input id="password" type="password" class="form-control form-control-sm custom-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

										@error('password')
												<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
												</span>
										@enderror
									</div>
									<div class="col">
										<label for="password-confirm">{{ __('Confirm Password') }}</label>
										<input id="password-confirm" type="password" class="form-control form-control-sm custom-input" name="password_confirmation" required autocomplete="new-password">
									</div>
									<button type="submit" data-mdb-button-init
									data-mdb-ripple-init class="btn-block text-body register-btn mt-3" font-weight="bold">
											{{ __('Register') }}
									</button>
								</div>
							</form>
						</div>
          </div>
        </div>
    	</div>
		</div>
	</section>
{{-- @endsection --}}
</body>
</html>