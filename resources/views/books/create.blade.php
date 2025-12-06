@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6"> 
        <div class="card shadow-sm border-0" style="border-radius: 15px;">
            <div class="card-header bg-primary text-white" style="border-radius: 15px 15px 0 0;">
                <h4 class="mb-0 text-center">➕ Add New Book</h4>
            </div>

            <div class="card-body" style="padding: 20px 25px;">
                <form action="{{ route('books.store') }}" method="POST">
                    @csrf

                    
                    <div class="mb-2">
                        <label for="title" class="form-label fw-semibold">📘 Title *</label>
                        <input type="text" class="form-control form-control-sm @error('title') is-invalid @enderror"
                               id="title" name="title" value="{{ old('title') }}" required>
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                 
                    <div class="mb-2">
                        <label for="author" class="form-label fw-semibold">✍️ Author *</label>
                        <input type="text" class="form-control form-control-sm @error('author') is-invalid @enderror"
                               id="author" name="author" value="{{ old('author') }}" required>
                        @error('author')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                  
                    <div class="mb-2">
                        <label for="book_category_id" class="form-label fw-semibold">📂 Category *</label>
                        <select class="form-select form-select-sm @error('book_category_id') is-invalid @enderror"
                                id="book_category_id" name="book_category_id" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ old('book_category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('book_category_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                   
                    <div class="mb-2">
                        <label for="price" class="form-label fw-semibold">💸 Price *</label>
                        <input type="number" step="0.01" class="form-control form-control-sm @error('price') is-invalid @enderror"
                               id="price" name="price" value="{{ old('price') }}" required>
                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                   
                    <div class="mb-3">
                        <label for="stock" class="form-label fw-semibold">📦 Stock *</label>
                        <input type="number" class="form-control form-control-sm @error('stock') is-invalid @enderror"
                               id="stock" name="stock" value="{{ old('stock') }}" required>
                        @error('stock')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('books.index') }}" class="btn btn-sm btn-secondary px-3">Cancel</a>
                        <button type="submit" class="btn btn-sm btn-primary px-3">
                            Create Book
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
