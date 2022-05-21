<?php

namespace App\Http\Livewire;

use App\Models\Invite;
use Livewire\Component;

class QRCode extends Component
{
    public $nameGuest;
    public $quotaGuest;
    public $popup = false;
    protected $listeners = ['getUniqID'];

    public function closePopup()
    {
        $this->nameGuest = '';
        $this->quotaGuest = '';
        $this->popup = false;
    }

    public function getUniqID($uniqid)
    {
        $find = Invite::where('uniqid', $uniqid);
        $get = $find->get();

        if(count($get)) {
            if($get[0]->presence == "false") {
    
                $this->nameGuest = $get[0]->name;
                $this->quotaGuest = $get[0]->quota;
                $find->update(['presence' => "true"]);
                
                $this->popup = true;

            }
        }
    }

    public function render()
    {
        return view('livewire.q-r-code');
    }
}
