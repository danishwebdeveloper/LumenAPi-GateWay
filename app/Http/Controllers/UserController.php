<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Display All books
     * @return Illuminate\Http\Response;
     */

    public function index()
    {
        $users = User::all();
        return $this->validResponse($users);
    }

    /**
     * Store an Book
     * @param Request $request
     * @return use Illuminate\Http\Response;
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ];

        $this->validate($request, $rules);

        // Password Should Be encrypted, So
        $fields = $request->all();
        $fields['password'] = Hash::make($request->password);
        $user = User::create($fields);
        $user->save();

        return $this->validResponse($user, Response::HTTP_CREATED);
    }

    /**
     * Show a
     * @param Request $request
     * @return use Illuminate\Http\Response;
     */

    public function show($userId)
    {
        $user = User::findOrFail($userId);
        return $this->validResponse($user);
    }

    /**
     * Update a
     * @param Request $request
     * @return use Illuminate\Http\Response;
     */
    public function update(Request $request, $userId)
    {
        $rules = [
            'name' => 'alpha|max:255',
            'email' => 'email|unique:users,email' . $userId,
            'password' => 'min:6|confirmed',
        ];

        $this->validate($request, $rules);
        $user = User::findOrFail($userId);
        $user->fill($request->all());

        // If user try to update his password
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($user->isClean()) {
            return $this->errorResponse("Update At least single field", Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $user->update();
        return $this->validResponse($user);
    }

    /**
     * Remove an Book
     * @return use Illuminate\Http\Response;
     */

    public function destroy($userId)
    {

        $user = User::findOrFail($userId);
        $user->delete();
        return $this->validResponse($user);
    }
}