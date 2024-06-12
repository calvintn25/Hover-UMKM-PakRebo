@extends('layouts.app')

@section('content')

<div class="container">
  <h2>
    {{ __('Product Categories') }} - {{ $productCategory->name }}
  </h2>
</div>

<div class="input-group mb-3 justify-content-end">
  <input type="text" class="form-control-sm">
  <button class="btn btn-outline-secondary me-5" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
</div>

<div class="d-flex ms-5 mb-4">
  <a href="{{route('admin.products.create')}}" type="button" class="btn btn-primary me-5">
    <i class="fa-solid fa-plus"></i> Add Product
  </a>
</div>

<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        {{-- <th scope="col">
          <div class="d-flex justify-content-center">
            <input class="form-check-input" type="checkbox" value="" id="checkbox-all">
            <label class="form-check-label" for="checkbox-all">
          </div>
        </th> --}}
        <th scope="col">Name</th>
        <th scope="col">Category</th>
        <th scope="col">Price</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @if (count($products) == 0)
      <tr>
        <th scope="row" colspan="6" class="text-center">
          --No Data--
        </th>
      </tr>
      @else
        @foreach ($products as $product)
          <tr>
            {{-- <th scope="row">
              <div class="d-flex justify-content-center">
                <input class="form-check-input" type="checkbox" value="" id="checkbox-1">
                <label class="form-check-label" for="checkbox-1">
              </div>
            </th> --}}

            <td>{{ $product ->name }}</td>
            <td>{{ $product ->product_category_id ? $product ->product_category->name : '-' }}</td>
            <td>{{ $product ->price }}</td>
            <td>
              <img src="{{asset('storage/images/' . $product->image)}}" class="img-thumbnail" width="200" alt="image-photo">
            </td>

            {{-- Edit Button --}}
            <td>
              <a href="{{ route('admin.products.edit', $product) }}" class="link-light link-underline-opacity-0">
                <button class="btn btn-primary mt-5">
                  <i class="fa-solid fa-pencil"></i> Edit
                </button>
              </a>
            {{-- End Of Edit Button --}}

            {{-- Delete Button --}}
              <a class="link-light  link-underline-opacity-0" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $product->id }}"  
              x-data=""
              x-on:click.prevent="$dispatch('open-modal', 'confirm-product-deletion-{{ $product->id }}')">
                <button class="btn btn-danger mt-5">
                  <i class="fa-solid fa-trash"></i> Delete 
                </button>
              </a>
            {{-- End of Delete Button --}}

            {{-- Modal --}}
              <div class="modal fade" id="exampleModal-{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel-{{ $product->id }}" aria-hidden="true" >
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel-{{ $product->id }}">Product Deletion</h1>
                      </div>

                      <div class="modal-body" name="confirm-product-category-deletion-{{ $product->id }}" :show="$errors->productCategory Deletion->isNotEmpty()" focusable>
                        <form method="post" action="{{ route('admin.products.destroy', $product) }}" class="p-6">
                          @csrf
                          @method('delete')

                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Are you sure you want to delete this product?') }}
                        </h2>

                        <h3>{{ $product->name }}</h3>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> {{ __('Cancel') }}</button>
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
    </div>
  </div>
</div>
@endsection