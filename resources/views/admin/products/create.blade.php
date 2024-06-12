@extends('layouts.app')

@section('content')
<div class="container head-content">
  <h1 class="text-light">Add Product</h1>
</div>
<div class="container main-content">
  <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
    @csrf

    {{-- Name --}}
        <label for="name" class="form-label">{{ __(' Name') }}</label>

        <input id="name" type="text" class="form-control form-control-sm custom-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
          <br>

      {{-- Choose product categories --}}
          <label for="product-categories" class="form-label">{{ __('Select Product Category') }}</label>
          <select id="product-categories" class="form-select" aria-label="Default select example" name="product_category_id"  >
          <option>Choose a product category</option>
          @foreach ($productCategories as $productCategory)
            <option value="{{ $productCategory->id }}" {{ old('product_category_id') && old('product_category_id') == $productCategory->id ? 'selected' : ''}}>{{ $productCategory->name }}</option>
          @endforeach
          </select>

          @error('product_category_id')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message}}</strong>
              </span>
          @enderror
      <br>

      {{-- price --}}
        <label for="price" class="form-label">{{ __(' Price') }}</label>

        <input id="price" type="number" class="form-control form-control-sm custom-input @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

        @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message}}</strong>
            </span>
        @enderror
        <br>

    {{-- sampai image blm kelar --}}

    {{-- Image --}}
          <label for="image" class="form-label">{{ __(' Image') }}</label>

          <input id="image" type="file" name="image" class="form-control form-control-sm custom-input">

          @error('image')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror 
        <br>

        <button type="submit" class="btn btn-primary float-end" font-weight="bold">
        {{ __('Submit') }}
        </button>

        <a href="{{route('admin.products.index')}}">
          <button type="button" class="btn btn-danger float-end me-3" font-weight="bold">
            {{ __('Back') }}
            </button>
        </a>

          <br>
    
  </form> 
</div>



@endsection
