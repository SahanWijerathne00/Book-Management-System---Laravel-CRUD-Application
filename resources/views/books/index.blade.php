@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">📚 Book Inventory</h1>
        <a href="{{ route('books.create') }}" class="btn btn-lg btn-primary shadow-sm">
            + Add Book
        </a>
    </div>

    <!-- Filter Section -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('books.index') }}">
                <div class="row g-3 align-items-center">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Filter by Category</label>
                        <select name="category" class="form-select" onchange="this.form.submit()">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Books Table -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                     <tbody class="text-center">
                        @forelse($books as $book)
                            <tr>
                                <td class="text-center">{{ $book->id }}</td>
                                <td class="fw-semibold">{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->category->name }}</td>
                                <td class="text-success fw-semibold">Rs.{{ number_format($book->price, 2) }}</td>
                                <td>
                                    @if($book->stock > 0)
                                        <span class="badge bg-success px-3 py-2">{{ $book->stock }}</span>
                                    @else
                                        <span class="badge bg-danger px-3 py-2">Out of Stock</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning me-1">
                                        Edit
                                    </a>
                                    <form action="{{ route('books.destroy', $book) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <h5 class="text-muted">No books found.</h5>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-3">
        {{ $books->links() }}
    </div>

</div>
@endsection
