<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;

class CoachChatRoom extends Component
{
    public $studentID;
    public $student;
    public $coversation;
    public $texts;
    public $sms;

    public function mount($studentID){

        $this->studentID = $studentID;
        $this->student = User::find($studentID);

        $this->conversation = Conversation::firstOrCreate(
            ['coach_id' => Auth::id(), 'student_id' => $this->studentID]
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
        return view('coachchat')->layout('layouts.main');
    }
}
