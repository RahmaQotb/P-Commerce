<?php
namespace App\Repositories\Api\Auth\User;

use App\Http\Requests\Authentication\RegisterRequest;
use Illuminate\Http\Request;
interface UserAuthRepositoryInterface{
    public function register(RegisterRequest $request);
    public function profile(Request $request);

}