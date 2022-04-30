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

    }

    /**
     * Store an Book
     * @param Request $request
     * @return use Illuminate\Http\Response;
     */
    public function store(Request $request)
    {

    }

    /**
     * Show a Book
     * @param Request $request
     * @return use Illuminate\Http\Response;
     */

    public function show($bookId)
    {

    }

    /**
     * Update a Book
     * @param Request $request
     * @return use Illuminate\Http\Response;
     */
    public function update(Request $request, $bookId)
    {

    }

    /**
     * Remove an Book
     * @return use Illuminate\Http\Response;
     */

    public function destroy($bookId)
    {

    }
}