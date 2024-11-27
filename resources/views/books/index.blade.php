@extends('layouts.app')

@section('content')
<div class="container">

    <div class="py-4">
        <form action="{{ route('books.search') }}" method="GET" class="d-flex">
            <input type="text" name="query" class="form-control me-2" placeholder="Search for books..." value="{{ request('query') }}">
            <button type="submit" class="btn btn-outline-success">Search</button>
        </form>
    </div> 

    @if(isset($query))
        <h5>Search Results for "{{ $query }}":</h5>
    @endif

    @if($books->isEmpty())
        <p>No books found.</p>
    @else
        <div class="row">
            @foreach($books as $book)
                <div class="col-sm-1 col-md-2 col-lg-4">
                    <div class="card mb-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">
                                Author: {{ $book->author }}
                            </p>
                            <a href="{{ route('bookdetail', $book->id) }}" class="btn btn-primary">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <nav aria-label="Page navigation" class="mt-6">
        {{ $books->links() }}
    </nav>
</div>
@endsection
