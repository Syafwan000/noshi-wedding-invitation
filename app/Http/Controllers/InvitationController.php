<?php

namespace App\Http\Controllers;

use App\Models\Invite;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function index(Invite $invite)
    {
        return view('invitation', [
            'title' => 'NoShi Invitation | ' . $invite->name,
            'name' => $invite->name,
            'uniqid' => $invite->uniqid,
            'presence' => $invite->presence,
            'time' => $invite->time
        ]);
    }
}
