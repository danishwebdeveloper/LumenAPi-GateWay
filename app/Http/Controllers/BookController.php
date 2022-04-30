<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Services\BookService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{

    use ApiResponser;

    /**
     * The service to consume the Books microservice
     *
     * @var BookService
     */

    public $bookService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookService $bookService)
    {
        return $this->bookService = $bookService;
    }

    /**
     * Display All books
     * @return Illuminate\Http\Response;
     */

    public function index()
    {
        return $this->successResponse($this->bookService->obtainBooks());
    }

    /**
     * Store an Book
     * @param Request $request
     * @return use Illuminate\Http\Response;
     */
    public function store(Request $request)
    {
        return $this->successResponse($this->bookService->createBook($request->all()), Response::HTTP_CREATED);
    }

    public function show($BookId)
    {
        return $this->successResponse($this->bookService->obtainBook($BookId));

    }

    public function update(Request $request, $BookId)
    {
        return $this->successResponse($this->bookService->editBook($request->all(), $BookId));

    }

    public function destroy($BookId)
    {
        return $this->successResponse($this->bookService->deleteBook($BookId));

    }
}