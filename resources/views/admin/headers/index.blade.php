@extends('layouts.app')

@section('content')
<div class="container head-content">
  <h1 class="text-light ms-4"> {{ __('Headers') }}</h1>
</div>

<div class="container main-content">
  {{-- Add Top Seller Product Link --}}
  <div class="d-flex ms-5 mb-4">
    <a href="{{route('admin.headers.create')}}" type="button" class="btn btn-primary me-5">
      <i class="fa-solid fa-plus"></i> Add Product
    </a>
  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @if (count($headers) == 0)
      <tr>
        <th scope="row" colspan="6" class="text-center">
          --No Data--
        </th>
      </tr>
      @else
        @foreach ($headers as $header)
          <tr>
            <td>{{ $header ->name }}</td>
            
            <td>
              <img src="{{asset('storage/images/' . $header->image)}}" class="img-thumbnail" width="200" alt="image-photo">
            </td>

            {{-- Edit Button --}}
            <td>
              <a href="{{ route('admin.headers.edit', $header) }}" class="link-light link-underline-opacity-0">
                <button class="btn btn-primary mt-5"><i class="fa-solid fa-pencil"></i>
                  Edit
                </button>
              </a>
              {{-- End Of Edit Button --}}

              {{-- Delete Button --}}
              <a class="link-light link-underline-opacity-0" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $header->id }}"  
              x-data=""
              x-on:click.prevent="$dispatch('open-modal', 'confirm-product-deletion-{{ $header->id }}')">
                <button class="btn btn-danger mt-5"><i class="fa-solid fa-trash"></i> Delete 
                </button>
              </a>
              {{-- End of Delete Button --}}

              {{-- Modal --}}
              <div class="modal fade" id="exampleModal-{{ $header->id }}" tabindex="-1" aria-labelledby="exampleModalLabel-{{ $header->id }}" aria-hidden="true" >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel-{{ $header->id }}">Product Deletion</h1>
                    </div>

                    <div class="modal-body" name="confirm-product-category-deletion-{{ $header->id }}" :show="$errors->productCategory Deletion->isNotEmpty()" focusable>
                      <form method="post" action="{{ route('admin.products.destroy', $header) }}" class="p-6">
                        @csrf
                        @method('delete')

                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Are you sure you want to delete this product?') }}
                        </h2>

                        <h3>{{ $header->name }}</h3>
                    </div>

                      <div class="modal-footer">
                        {{-- cancel button --}}
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