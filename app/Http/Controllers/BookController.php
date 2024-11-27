<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use App\Models\Rating;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); 
        $books = Book::when($search, function ($query, $search) {
            $query->where('title', 'like', "%$search%")
                  ->orWhere('author', 'like', "%$search%");
        })->paginate(6); 

        return view('books.index', compact('books', 'search'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        
        $books = Book::where('title', 'like', "%{$query}%")
                    ->orWhere('author', 'like', "%{$query}%")
                    ->paginate(10);

        return view('books.index', compact('books', 'query'));
    }


    public function bookdetail($id)
    {
        $book = Book::with('comments.user', 'ratings.user')->findOrFail($id);
        $averageRating = $book->ratings->avg('rating'); 

        return view('books.bookdetails', compact('book', 'averageRating'));
    }

    public function storeComment(Request $request, $id)
    {
        $request->validate(['content' => 'required|string|max:500']);
        $book = Book::findOrFail($id);
    
        $book->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->input('content'),
        ]);
    
        return redirect()->route('bookdetail', $id)->with('success', 'Comment added successfully.');
    }
    

    public function updateRating(Request $request, $id)
    {
        $request->validate(['rating' => 'required|integer|between:1,5']);
        $book = Book::findOrFail($id);
        $rating = $request->input('rating');
    
        $book->ratings()->updateOrCreate(
            ['user_id' => auth()->id()],
            ['rating' => $rating]
        );
    
        $book->rating = $book->ratings()->avg('rating');
        $book->save();
    
        return redirect()->route('bookdetail', $id)->with('success', 'Rating updated successfully.');
    }
    

}

