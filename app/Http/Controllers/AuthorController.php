<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{

    use ApiResponser;
    /**
     * The service to consume the authors microservice
     *
     * @var AuthorService
     */
    public $authorService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthorService $authorService)
    {
        return $this->authorService = $authorService;
    }

    public function index()
    {
        return $this->successResponse($this->authorService->obtainAuthors());
    }

    /**
     * Store an Author
     * @param Request $request
     * @return use Illuminate\Http\Response;
     */
    public function store(Request $request)
    {
        return $this->successResponse($this->authorService->createAuthor($request->all()), Response::HTTP_CREATED);
    }

    public function show($authorId)
    {
        return $this->successResponse($this->authorService->obtainAuthor($authorId));

    }

    public function update(Request $request, $authorId)
    {
        return $this->successResponse($this->authorService->editAuthor($request->all(), $authorId));

    }

    public function destroy($authorId)
    {
        return $this->successResponse($this->authorService->deleteAuthor($authorId));

    }
}