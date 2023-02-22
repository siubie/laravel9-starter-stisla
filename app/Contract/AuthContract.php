<?php


namespace App\Contract;


interface AuthContract
{

    public function login(array $payload);

    public function register(array $data);

    public function logout();
}
