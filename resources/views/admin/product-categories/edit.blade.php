@extends('layouts.app')

@section('content')

<div class="container head-content">
  <h1 class="text-light">Edit Product Category</h1>
</div>
      <div class="container main-content">
        <form method="POST" action="{{ route('admin.product-categories.update',$productCategory) }}">
          @csrf
          @method('PUT')
              <label for="name" class="form-label">{{ __(' Name') }}</label>

              <input id="name" type="text" class="form-control form-control-sm custom-input @error('name') is-invalid @enderror" name="name" value="{{ old('name', $productCategory->name) }}" required autocomplete="name" autofocus>
              <br>
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror

              <button type="submit" class="btn btn-primary float-end" font-weight="bold">
              {{ __('Submit') }}
              </button>

              <button type="submit" class="btn btn-danger float-end me-3" font-weight="bold">
                {{ __('Back') }}
                </button>
              <br>
         </form>
      </div>
@endsection
