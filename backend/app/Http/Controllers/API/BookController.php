<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Services\ParseSearchRequestService;
use Spatie\QueryBuilder\QueryBuilder;

class BookController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Book::class, 'book');
    }

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
            ->allowedFilters(Book::filterable())
            ->allowedSorts(Book::sortable())
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
