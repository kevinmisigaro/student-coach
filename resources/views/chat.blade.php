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
                <img src="{{ asset('images/tutor2.jpg') }}" style="max-width: 150px" class="rounded-circle" alt="..." />
                <br /><br>
                <p>
                    <strong>{{ $coach->name }}</strong> <br><br>
                    {{ $coach->city->name }}, <br> {{ $coach->city->country->name }}
                </p>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" wire:poll>

                @if (count($texts) > 0)
                    @foreach (\App\Models\Chat::where('conversation_id', $conversation->id)->get() as $text)
                        @if (\Illuminate\Support\Facades\Auth::id() == $text->sender_id)
                        <div class="row">
                            <div class="col-md-6 offset-md-6 reciever text-white mb-2 rounded">
                                {{ $text->message }}
                            </div>
                        </div>
                        @else
                        <div class="row">
                            <div class="col-md-6 sender mb-2 rounded">
                                {{ $text->message }}
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endif

                <form wire:submit.prevent="submit">
                    <input type="text" wire:model="sms" class="form-control">
                    <button type="submit" class="btn btn-primary mt-3">
                        Send
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
