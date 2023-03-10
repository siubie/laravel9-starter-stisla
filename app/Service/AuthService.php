<?php


namespace App\Service;


use App\Contract\AuthContract;
use App\Models\User;
use DB;
use Exception;
use Hash;
use Throwable;

class AuthService implements AuthContract
{

    public function login(array $payload): Exception|array
    {

        try {

            $user = User::query()->where("email", $payload["email"])->first();

            if (!$user || !Hash::check($payload["password"], $user->password)) {
                return new Exception("The provided credential is incorrect");
            }

            $token = $user->createToken($payload["device_name"])->plainTextToken;

            return [
                "token" => $token
            ];

        } catch (Exception | Throwable $exception) {
            return $exception;
        }

    }

    public function register(array $data): Throwable|Exception|array
    {

        try {
            $payload = array_merge($data, ["password" => Hash::make($data["password"])]);

            DB::beginTransaction();
            $user = User::create($payload);
            $user->assignRole('user');
            DB::commit();

            return [];

        } catch (Exception | Throwable $exception) {
            return $exception;
        }

    }

    public function logout(): Throwable|Exception|array
    {
        try {
            auth()->user()->tokens()->delete();
            return [];
        } catch (Exception | Throwable $exception) {
            return $exception;
        }
    }
}
