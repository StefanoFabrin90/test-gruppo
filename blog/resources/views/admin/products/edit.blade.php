@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">Edit a product</h1>

        {{-- In case of error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ( $errors->all() as $error )
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
        @csrf

        {{-- Product name --}}
            <div class="mb-3">
                <label for="name" class="form-label">Product name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name ) }}">
            </div>
            {{-- Name error advertising --}}
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror

        {{-- Category id --}}
            <div class="mb-3">
                <label for="category_id" class="form-label">Category (id)</label>
                <input type="text" category_id="category_id" id="category_id" class="form-control" value="{{ old('category_id', $product->category_id ) }}">
            </div>
            {{-- Category id error advertising --}}
            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            {{-- Price --}}
            <div class="mb-3">
                <label for="price" class="form-label">Sales price:</label>
                <input type="text" name="price" id="price" class="form-control" value="{{ old('price', $product->price ) }}">
            </div>
            {{-- Price error advertising --}}
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            {{-- Old Price --}}
            <div class="mb-3">
                <label for="old_price" class="form-label">Original price:</label>
                <input type="text" name="old_price" id="old_price" class="form-control" value="{{ old('old_price', $product->old_price ) }}">
            </div>
            {{-- old_price error advertising --}}
            @error('old_price')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            {{-- Body --}}
            <div class="mb-3">
                <label for="body">Description:</label>
                <textarea name="body" id="body" class="form-control" rows="10">{{ old('body', $product->body ) }}</textarea>
                {{-- body error advertising --}}
                @error('body')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- Image --}}
            <div class="mb-3">
                <label for="image" class="form-label">Image path:</label>
                <input type="text" name="image" id="image" class="form-control" value="{{ old('image', $product->image ) }}">
            </div>
            {{-- image error advertising --}}
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            {{-- Frozen --}}
            <select name="frozen" id="frozen" class="form-control">
                <option value="true"
                @if ($product->frozen == 'true')selected @endif >
                    Frozen</option>
                <option value="false"
                @if ($product->frozen == 'false')selected @endif >
                    Fresh</option>
            </select>

            <button class="btn btn-success" type="submit">Edit product</button>
        </form>
    </div>
@endsection