<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuariosController extends Controller
{
    public function panel()
    {
        return view('Admin.panel');
    }
}
