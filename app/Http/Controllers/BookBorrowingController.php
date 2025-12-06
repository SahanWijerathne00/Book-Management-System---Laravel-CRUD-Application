<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookBorrowing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookBorrowingController extends Controller
{
    public function index()
    {
        $borrowings = BookBorrowing::with(['user', 'book'])
            ->orderBy('created_at', 'asc')
            ->paginate(15);
            
        return view('borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        $books = Book::where('stock', '>', 0)->get();
        $users = User::all();
        
        return view('borrowings.create', compact('books', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id'
        ]);

        $book = Book::findOrFail($validated['book_id']);

        if ($book->stock <= 0) {
            return back()->with('error', 'Book is out of stock.');
        }

        DB::transaction(function () use ($validated, $book) {
            BookBorrowing::create([
                'user_id' => $validated['user_id'],
                'book_id' => $validated['book_id'],
                'borrowed_at' => now(),
                'status' => 'borrowed'
            ]);

            $book->decrement('stock');
        });

        return redirect()->route('borrowings.index')
            ->with('success', 'Book borrowed successfully.');
    }

    public function return(Request $request, BookBorrowing $borrowing)
    {
        if ($borrowing->status === 'returned') {
            return back()->with('error', 'Book already returned.');
        }

        DB::transaction(function () use ($borrowing) {
            $borrowing->update([
                'returned_at' => now(),
                'status' => 'returned'
            ]);

            $borrowing->book->increment('stock');
        });

        return redirect()->route('borrowings.index')
            ->with('success', 'Book returned successfully.');
    }
}