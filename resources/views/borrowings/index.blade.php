@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">📘 Book Borrowings</h1>
        <a href="{{ route('borrowings.create') }}" class="btn btn-lg btn-primary shadow-sm">
            + Borrow Book
        </a>
    </div>

<div class="table-responsive shadow-sm rounded">
    <table class="table table-hover align-middle">
       <thead class="table-primary text-center">
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Book</th>
                <th>Borrowed At</th>
                <th>Returned At</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>

         <tbody class="text-center">
            @forelse($borrowings as $borrowing)
                <tr>
                    <td class="fw-semibold">{{ $borrowing->id }}</td>
                    <td>{{ $borrowing->user->name }}</td>
                    <td>{{ $borrowing->book->title }}</td>

                    <td>
                        <span class="text-muted">
                            {{ $borrowing->borrowed_at->format('Y-m-d • H:i') }}
                        </span>
                    </td>

                    <td>
                        @if($borrowing->returned_at)
                            <span class="text-success fw-semibold">
                                {{ $borrowing->returned_at->format('Y-m-d • H:i') }}
                            </span>
                        @else
                            <span class="text-muted">—</span>
                        @endif
                    </td>

                    <td>
                        @if($borrowing->status === 'borrowed')
                            <span class="badge bg-warning text-dark px-3 py-2">
                                Borrowed
                            </span>
                        @else
                            <span class="badge bg-success px-3 py-2">
                                Returned
                            </span>
                        @endif
                    </td>

                    <td class="text-center">
                        @if($borrowing->status === 'borrowed')
                            <form action="{{ route('borrowings.return', $borrowing) }}" 
                                  method="POST" class="d-inline">
                                @csrf
                                <button type="submit" 
                                        class="btn btn-sm btn-success px-3 shadow-sm"
                                        onclick="return confirm('Mark this book as returned?')">
                                    Return
                                </button>
                            </form>
                        @else
                            <span class="text-muted">—</span>
                        @endif
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="7" class="text-center py-4 text-muted">
                        No borrowing records found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-3">
    {{ $borrowings->links() }}
</div>

@endsection
