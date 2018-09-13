<?php


namespace App;


use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;

class PasswordlessUserProvider extends EloquentUserProvider
{
    /**
     * PasswordlessUserProvider constructor.
     *
     * @param HasherContract $hasher
     * @param string $model
     */
    public function __construct(HasherContract $hasher, $model)
    {
        parent::__construct($hasher, $model);
    }

    public function validateCredentials(UserContract $user, array $credentials)
    {
        return true;
    }
}