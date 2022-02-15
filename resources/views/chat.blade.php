<div class="container-fluid">
    <style>
        .sender {
            background: rgb(225, 225, 225);
            padding: 15px 15px;
        }

        .reciever {
            background: rgb(89, 89, 231);
            padding: 15px 15px;
        }

    </style>
    <div class="container">
        <div class="row my-5">
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 text-center">
                @if ($coach->avatar == null)
                    <img src="{{ asset('images/businessavatar.jpg') }}" 
                    style="max-width: 150px" class="rounded-circle" alt="..." />
                @else
                    <img src="{{ env('APP_URL') }}/{{ $coach->avatar }}" 
                    style="max-width: 150px" class="rounded-circle" alt="..." />
                @endif
                <br /><br>
                <p>
                    <strong>{{ $coach->name }}</strong> <br><br>
                    {{ $coach->city->name }}, <br> {{ $coach->city->country->name }}
                </p>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" wire:poll>

                <div style="overflow: scroll; height: 60vh">
                    @if (count($texts) > 0)
                    @foreach (\App\Models\Chat::where('conversation_id', $conversation->id)->get() as $text)
                        @if (\Illuminate\Support\Facades\Auth::id() == $text->sender_id)
                        <div class="row">
                            <div class="col-md-6 offset-md-6 mb-2 d-flex row justify-content-end">
                                <div class="reciever text-white rounded">
                                    {{ $text->message }}
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="row">
                            <div class="col-md-6 mb-2 d-flex row justify-content-start">
                                <div class="sender text-dark rounded">
                                    {{ $text->message }}
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endif
                </div>

                <form wire:submit.prevent="submit" class="row pt-0">
                    <hr>
                   <div class="col-md-10">
                    <input type="text" wire:model="sms" class="form-control">
                   </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">
                            Send
                        </button>
                    </div>
                </form>                
            </div>
        </div>
    </div>
</div>
