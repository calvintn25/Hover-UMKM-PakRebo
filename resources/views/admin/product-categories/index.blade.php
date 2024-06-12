@extends('layouts.app')

@section('content')
<div class="container mb-5">
  <h1>
    {{ __('Product Categories') }}
  </h1>
</div>



{{-- Add product menggunakan modal --}}
<button type="button" class="btn btn-primary d-flex ms-5 mb-4" data-bs-toggle="modal" data-bs-target="#addProduct">
  <i class="fa-solid fa-plus mt-1 me-2"></i> Add Product Category
</button>

{{-- Modal add product --}}
<div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addProductLabel">Add New Product Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form method="POST" action="{{ route('admin.product-categories.store') }}">
          @csrf
          <label for="name" class="form-label">{{ __(' Name') }}</label> <br>
          <input id="name" type="text" class="form-control form-control-sm custom-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

          @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
        <div class="modal-footer">
          {{-- Back Button --}}
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>

          {{-- Submit Button --}}
          <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary" font-weight="bold">
            {{ __('Add Category') }}
          </button>

        </div>
      
        </form>
    </div>
  </div>
</div>

<div class="container">
  <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
      @if (count($productCategories) == 0)
      <tr>
        <th scope="row" colspan="3" class="text-center">
          --No Data--
        </th>
      </tr>
      @else
        @foreach ($productCategories as $productCategory)
          <tr>
            <td>{{ $productCategory ->name }}</td>
            
            <td>
              {{-- Show Button --}}
              <a href="{{ route('admin.product-categories.show', $productCategory) }}" class="link-light  link-underline-opacity-0">
                <button class="btn btn-success">
                  <i class="fa-solid fa-eye"></i> Show
                </button>
              </a>
              {{-- End Of Show Button --}}

              {{-- Edit Button --}}
              <a href="{{ route('admin.product-categories.edit', $productCategory) }}" class="link-light  link-underline-opacity-0">
                <button class="btn btn-primary">
                  <i class="fa-solid fa-pencil"></i> Edit
                </button>
              </a>
              {{-- End Of Edit Button --}}

              {{-- Delete Button --}}
              <a class="link-light link-underline-opacity-0" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $productCategory->id }}"  
              x-data=""
              x-on:click.prevent="$dispatch('open-modal', 'confirm-product-category-deletion-{{ $productCategory->id }}')">
                <button class="btn btn-danger">
                  <i class="fa-solid fa-trash"></i> Delete 
                </button>
              </a>
            
              {{-- End of Delete Button --}}

              {{-- Modal --}}
              <div class="modal fade" id="exampleModal-{{ $productCategory->id }}" tabindex="-1" aria-labelledby="exampleModalLabel-{{ $productCategory->id }}" aria-hidden="true" >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel-{{ $productCategory->id }}">Product Deletion</h1>
                    </div>

                    <div class="modal-body" name="confirm-product-category-deletion-{{ $productCategory->id }}" :show="$errors->productCategory Deletion->isNotEmpty()" focusable>
                    <form method="post" action="{{ route('admin.product-categories.destroy', $productCategory) }}" class="p-6">
                      @csrf
                      @method('delete')

                      <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                          {{ __('Are you sure you want to delete this product category?') }}
                      </h2>

                      <h3>{{ $productCategory->name }}</h3>
                    </div>

                    <div class="modal-footer">
                      {{-- Cancel Button --}}
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> 
                        {{ __('Cancel') }}
                      </button>

                      {{-- Submit Button --}}
                      <button type="submit" class="btn btn-danger ms-3">
                        {{ __('Delete ') }}
                      </button>
                    </div>

                    </form>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        @endforeach
      @endif
    </tbody>
  </table>
</div>
@endsection