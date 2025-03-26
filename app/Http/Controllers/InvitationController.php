<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function invitation()
    {
        return view('index');
    }

    public function ticket($id)
    {
        return view('pages.ticket', [
            'id' => $id
        ]);
    }
}
