<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;

class ChatRoom extends Component
{
    public $coachID;
    public $coach;
    public $coversation;
    public $texts;
    public $sms;

    public function mount($coachID){

        $this->coachID = $coachID;
        $this->coach = User::find($coachID);

        $this->conversation = Conversation::firstOrCreate(
            ['student_id' => Auth::id(), 'coach_id' => $this->coachID]
        );

        $checkIfTextsExist = Chat::where('conversation_id', $this->conversation->id)->exists();

        if($checkIfTextsExist){
            $this->texts = Chat::where('conversation_id', $this->conversation->id)->get();
        } else{
            $this->texts= [];
        }
    }

    protected $rules = [
        'sms' => 'required'
    ];

    public function submit()
    {
        $this->validate();
 
        Chat::create([
            'conversation_id' => $this->conversation->id,
            'sender_id' => Auth::id(),
            'message' => $this->sms,
        ]);

        $this->sms = null;
    }

    public function render()
    {
        return view('chat')->layout('layouts.main');
    }
}
