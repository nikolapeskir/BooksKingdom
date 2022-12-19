<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookAuthorRequest;
use App\Http\Resources\BookAuthorResource;
use App\Models\BookAuthor;
use App\Services\ParseSearchRequestService;
use Spatie\QueryBuilder\QueryBuilder;

class BookAuthorController extends Controller
{
    /**
     * Get all authors
     **/
    public function index()
    {
        return BookAuthorResource::collection(BookAuthor::all());
    }

    public function search()
    {
        request()->merge(ParseSearchRequestService::parse(request()));

        $authors = QueryBuilder::for(BookAuthor::class)
            ->allowedFilters(BookAuthor::filterable())
            ->allowedSorts(BookAuthor::sortable())
            ->paginate(request('rowsPerPage'));

        return BookAuthorResource::collection($authors);
    }

    /**
     * Store a author
     **/
    public function store(BookAuthorRequest $request)
    {
        $bookAuthor = BookAuthor::create($request->validated());

        return new BookAuthorResource($bookAuthor);
    }

    /**
     * Get one author
     **/
    public function show(BookAuthor $bookAuthor)
    {
        return new BookAuthorResource($bookAuthor);
    }

    /**
     * Update a author
     **/
    public function update(BookAuthorRequest $request, $id)
    {
        $bookAuthor = bookAuthor::findOrFail($id);

        $this->authorize('update', $bookAuthor);

        $bookAuthor->update($request->validated());

        return new BookAuthorResource($bookAuthor);
    }

    /**
     * Delete a author
     **/
    public function destroy($id)
    {
        $bookAuthor = bookAuthor::findOrFail($id);

        $this->authorize('delete', $bookAuthor);

        $response = $bookAuthor->delete();

        if ($response) {
            return response()->noContent();
        }
    }
}
