@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ $book->title }}</h2>
                    <h5 class="card-subtitle mb-2 text-muted">By {{ $book->author }}</h5>
                    <p>{{ $book->description }}</p>

                    <h5>Average Rating: {{ number_format($averageRating, 1) }} / 5</h5>

                    @auth
                    <form action="{{ route('books.updateRating', $book->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="rating">Rate this book:</label>
                            <select name="rating" id="rating" class="form-control" required>
                                <option value="">Select rating</option>
                                <option value="1">1 Star</option>
                                <option value="2">2 Stars</option>
                                <option value="3">3 Stars</option>
                                <option value="4">4 Stars</option>
                                <option value="5">5 Stars</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Submit Rating</button>
                    </form>
                    @else
                    <p>Please <a href="{{ route('login') }}">login</a> to leave a rating.</p>
                    @endauth

                    <hr>

                    <h4>Comments:</h4>
                    @foreach($book->comments as $comment)
                        <div class="comment mb-3">
                            <strong>{{ $comment->user->name }}:</strong>
                            <p>{{ $comment->content }}</p>
                        </div>
                    @endforeach

                    @auth
                    <form action="{{ route('books.storeComment', $book->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="content">Leave a Comment:</label>
                            <textarea name="content" id="content" class="form-control" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Post Comment</button>
                    </form>
                    @else
                    <p>Please <a href="{{ route('login') }}">login</a> to leave a comment.</p>
                    @endauth

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
