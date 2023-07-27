<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;



class UserController extends Controller
{
    public function getUsersWithDomiciliosAndAge()
    {
        $usersWithDomiciliosAndAge = User::with('userDomicilio')
            ->get()
            ->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'birthdate' => $user->birthdate,
                    'age' => $this->calculateAge($user->birthdate),
                    'domicilio' => $user->domicilio,
                ];
            });

        return response()->json($usersWithDomiciliosAndAge);
    }

    private function calculateAge($birthdate)
    {
        return Carbon::parse($birthdate)->age;
    }
}
