<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Invite;
use Livewire\Component;

class QRCode extends Component
{
    public $nameGuest;
    public $quotaGuest;
    public $timeAttend;
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
    
                $find->update([
                    'presence' => "true",
                    'time' => Carbon::now()->toDateTimeString()
                ]);
                $this->nameGuest = $get[0]->name;
                $this->quotaGuest = $get[0]->quota;
                $this->timeAttend = Carbon::now()->toDateTimeString();
                
                $this->popup = true;

            }
        }

        // $this->emit('attend', $uniqid);
    }

    public function render()
    {
        return view('livewire.q-r-code');
    }
}
