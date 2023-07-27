<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;



class UserController extends Controller
{
    public function getUsersWithDomiciliosAndAge()
    {
        $usersWithDomiciliosAndAge = User::join('user_domicilio', 'users.id', '=', 'user_domicilio.user_id')
            ->select('users.id', 'users.name', 'users.fecha_nacimiento', 'user_domicilio.domicilio', 'user_domicilio.numero_exterior', 'user_domicilio.colonia', 'user_domicilio.cp', 'user_domicilio.ciudad')
            ->get()
            ->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'birthdate' => $user->fecha_nacimiento,
                    'age' => $this->calculateAge($user->fecha_nacimiento),
                    'domicilio' => $user->domicilio,
                    'numero_exterior' => $user->numero_exterior,
                    'colonia' => $user->colonia,
                    'cp' => $user->cp,
                    'ciudad' => $user->ciudad,
                ];
            });

        return response()->json($usersWithDomiciliosAndAge);
    }

    private function calculateAge($birthdate)
    {
        return Carbon::parse($birthdate)->age;
    }
}
