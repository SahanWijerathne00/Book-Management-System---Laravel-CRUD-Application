@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6"> 
        <div class="card shadow-sm border-0" style="border-radius: 15px;">
            <div class="card-header bg-primary text-white" style="border-radius: 15px 15px 0 0;">
                <h4 class="mb-0 text-center">📚 Borrow Book</h4>
            </div>

            <div class="card-body" style="padding: 20px 25px;">
                <form action="{{ route('borrowings.store') }}" method="POST">
                    @csrf

                    <div class="mb-2">
                        <label for="user_id" class="form-label fw-semibold">👤 User *</label>
                        <select class="form-select form-select-sm @error('user_id') is-invalid @enderror" 
                                id="user_id" name="user_id" required>
                            <option value="">Select User</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="book_id" class="form-label fw-semibold">📖 Book *</label>
                        <select class="form-select form-select-sm @error('book_id') is-invalid @enderror" 
                                id="book_id" name="book_id" required>
                            <option value="">Select Book</option>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                                    {{ $book->title }} by {{ $book->author }} (Stock: {{ $book->stock }})
                                </option>
                            @endforeach
                        </select>
                        @error('book_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('borrowings.index') }}" class="btn btn-sm btn-secondary px-3">Cancel</a>
                        <button type="submit" class="btn btn-sm btn-primary px-3">
                             Borrow Book
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
