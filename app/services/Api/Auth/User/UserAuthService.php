<?php
 namespace App\Services\Api\Auth\User;

use App\Http\Requests\Authentication\RegisterRequest;
use App\Repositories\Api\Auth\User\UserAuthRepositoryInterface;
use Illuminate\Http\Request;
 class UserAuthService
 {
    public function  __construct(
        protected UserAuthRepositoryInterface $userAuthRepositoryInterface
    ){
      $this->userAuthRepositoryInterface= $userAuthRepositoryInterface;
    }
    public function register($request){
       return $this->userAuthRepositoryInterface->register($request);
    }
    public function profile(Request $request){
      return $this->userAuthRepositoryInterface->profile($request);
    }

 }