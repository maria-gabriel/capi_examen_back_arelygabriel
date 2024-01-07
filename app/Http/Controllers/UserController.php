<?php

namespace App\Http\Controllers;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /*
    GET: http://localhost:8000/api/usuarios

    [
        {
            "id": 1,
            "name": "Theodore Kling",
            "email": "agutmann@example.org",
            "email_verified_at": "2024-01-07T00:06:33.000000Z",
            "created_at": "2024-01-07T00:06:34.000000Z",
            "updated_at": "2024-01-07T00:06:34.000000Z",
            "fecha_nacimiento": "1995-09-09",
            "user_id": 1,
            "domicilio": "63576 Pacocha Plains",
            "numero_exterior": "722",
            "colonia": "burgh",
            "cp": "36380",
            "ciudad": "North Madisonshire",
            "edad": 28
        },...
    ]
    */
    public function usuarios(){
        $usuarios_domicilio = User::join('user_domicilio', 'users.id', '=', 'user_domicilio.user_id')
        ->select('users.*', 'user_domicilio.*', DB::raw('YEAR(CURDATE()) - YEAR(users.fecha_nacimiento) - (RIGHT(CURDATE(), 5) < RIGHT(users.fecha_nacimiento, 5)) as edad'))
        ->get();

        return response()->json($usuarios_domicilio);
    }
}
