<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function invitation()
    {
        return view('index');
    }

    public function ticket($id)
    {
        $invitation = Invitation::where('identifier', $id)->first();
        $title = $invitation->name . "'s " . "Invitation Ticket";

        if (!$invitation) {
            return abort(404);
        }

        return view('ticket', [
            'title' => $title,
            'invitation' => $invitation
        ]);
    }
}
