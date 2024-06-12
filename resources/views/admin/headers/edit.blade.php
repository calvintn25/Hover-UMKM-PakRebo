@extends('layouts.app')

@section('content')

<div class="container head-content">
  <h1>Edit Top Product</h1>
</div>

<div class="container main-content">
  <form method="POST" action="{{ route('admin.headers.update', $header) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- Name --}}
    <div class="container">
      <label for="name" class="form-label">{{ __(' Name') }}</label>

      <input id="name" type="text" class="form-control form-control-sm custom-input @error('name') is-invalid @enderror" name="name" value="{{ old('name', $header->name) }}" required autocomplete="name" autofocus>

      @error('name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      <br>

      {{-- Edit Image --}}
      <label for="image" class="form-label">{{ __(' Image') }}</label>

      <input id="image" type="file" name="image" class="form-control form-control-sm custom-input" value="{{ old('image' ,asset('img/' . $header->image) )}}">
      
      @error('image')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror 
      <br>

      {{-- Submit Button --}}
      <button type="submit" class="btn btn-primary float-end" font-weight="bold">
      {{ __('Submit') }}
      </button>

      {{-- Back Button --}}
      <a href="{{route('admin.headers.index')}}">
        <button type="button" class="btn btn-danger float-end me-3">
          {{ __('Back') }}
        </button>
      </a>
      <br>
    </div>
  </form>
</div>
@endsection
