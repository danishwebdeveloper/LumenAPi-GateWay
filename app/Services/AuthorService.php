<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;

class AuthorService
{

    use ConsumesExternalServices;

    /**
     * The base uri to consume the authors service
     *
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the authors service
     *
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.authors.base_uri');
        $this->secret = config('services.authors.secret');
    }

    /**
     * Obtain the full list of authors from the author service
     *
     * @return string
     */
    public function obtainAuthors()
    {
        return $this->performRequest("GET", "/authors");
    }

    /**
     * createAuthor for the author service
     *
     * @return string
     */
    public function createAuthor($data)
    {
        return $this->performRequest("POST", "/authors", $data);
    }

    /**
     * showAuthor for the author service
     *
     * @return string
     */
    public function obtainAuthor($authorId)
    {
        return $this->performRequest("GET", "/authors/{$authorId}");
    }

    /**
     * editAuthor for the author service
     *
     * @return string
     */
    public function editAuthor($data, $authorId)
    {
        return $this->performRequest("PUT", "/authors/{$authorId}", $data);
    }

    /**
     * deleteAuthor for the author service
     *
     * @return string
     */
    public function deleteAuthor($authorId)
    {
        return $this->performRequest("DELETE", "/authors/{$authorId}");
    }

}
