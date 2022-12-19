<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Services\ParseSearchRequestService;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;

class BookController extends Controller
{
    /**
     * Get all books
     **/
    public function index()
    {
        return BookResource::collection(Book::all());
    }

    public function search()
    {
        request()->merge(ParseSearchRequestService::parse(request()));

        $books = QueryBuilder::for(Book::class)
            ->with('author')
            ->allowedFilters('title', AllowedFilter::partial('author_id', 'author.name'))
            ->allowedSorts('id', 'title', AllowedSort::field('author_name', 'author_id'), 'published_at', 'updated_at', 'created_at')
            ->paginate(request('rowsPerPage'));

        return BookResource::collection($books);
    }

    /**
     * Store a book
     **/
    public function store(BookRequest $request)
    {
        $book = Book::create($request->validated());

        return new BookResource($book);
    }

    /**
     * Get one book
     **/
    public function show(Book $book)
    {
        return new BookResource($book);
    }

    /**
     * Update a book
     **/
    public function update(BookRequest $request, Book $book)
    {
        $book->update($request->validated());
        return new BookResource($book);
    }

    /**
     * Delete a book
     **/
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->noContent();
    }
}
