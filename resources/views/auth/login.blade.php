<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

		<!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ea590c57b3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="loginstyle.css">
    <link rel="shortcut icon" type="image/jpg" href="img/logo.png"/>

</head>
<body>

{{-- @extends('layouts.app')

@section('content') --}}
<section class="vh-100">
	<div class="container-fluid h-custom">  
		<div class="row d-flex justify-content-center align-items-center h-100">
			<div class="col-md-9 col-lg-6 col-xl-5">
        <img src="img/logo.png"
          class="img-fluid" alt="logo">
      </div>
							{{-- <div class="card"> --}}
									{{-- <div class="card-header">{{ __('Login') }}</div>  --}}

									<div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
										<h1 class="display-5 mb-5"> LOGIN </h1>
											<form method="POST" action="{{ route('login') }}">
													@csrf

													<div data-mdb-input-init class="form-outline mt-0 d-inline-flex custom-width">
														<label for="form3Example4" class="form-label me-3 my-3">
																<i class="fa-solid fa-envelope" style="font-size: 22px;"></i>
																{{ __() }}</label>

															<div class="col-md-6">
																	<input id="form3Example4" type="email" class="form-control py-3 mb-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email">

																	@error('email')
																			<span class="invalid-feedback" role="alert">
																					<strong>{{ $message }}</strong>
																			</span>
																	@enderror
															</div>
													</div>

													<div data-mdb-input-init class="form-outline mb-3 mt-0 d-inline-flex custom-width">
														{{-- iki for ny sama kek email? --}}
														<label for="form3Example4" class="form-label me-3 my-3">
															<i class="fa-solid fa-lock pb-1" style="font-size: 25px;"></i>
															{{ __('') }}
														</label>

															<div class="col-md-6">
																	<input id="form3Example4" type="password" class="form-control py-3 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter password">

																	@error('password')
																			<span class="invalid-feedback" role="alert">
																					<strong>{{ $message }}</strong>
																			</span>
																	@enderror
															</div>
													</div>

													{{-- container remember+forgot password --}}
													{{-- <div class="d-flex justify-content-between align-items-center"> --}}

													{{-- <div class="row mb-0">
														<div class="text-center text-lg-start mt-4 pt-2">
																<button type="submit" class="btn btn-primary btn-lg ms-5" style="padding-left: 2.5rem; padding-right: 2.5rem;">
																		{{ __('Login') }}
																</button>
														</div>
													</div> --}}
																	<div class="text-center text-lg-start pt-2 d-grid">
																		<button  type="submit" class="btn btn-primary btn-lg ms-5"
																			style="padding-left: 2.5rem; padding-right: 2.5rem; ">
																			{{ __('Login') }}
																		</button>
																	</div>
														
											</form>
									</div>
							</div>
					</div>
			</div>
	</div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"><script>
</body>
</html>
