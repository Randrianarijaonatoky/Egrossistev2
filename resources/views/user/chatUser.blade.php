@extends('user.layouts.master')
@section('contenue')

<section class="chat">
    <div class="chat-cards">

        @if ($conversation)
            @foreach ($conversation->chats as $chat)

            <div class="chat-cards-card">
                <p class="chat-cards-card">{{$chat->message}}</p>
            </div>
            @endforeach
            <form action="{{ route('newChat', ['conversationId' => $conversation->id])  }}" method="POST" class="chat-cards-send">
                @csrf
                <img src="{{ asset('storage/imageUser/'.Auth::user()->pdp) }}" alt="" class="chat-cards-send-img">
                <textarea name="message" id="" cols="30" rows="10" class="chat-cards-send-textarea"></textarea>
                <button type="submit" class="chat-cards-send-btn">Envoyer</button>
            </form>
            @else
            <p>Aucune conversation disponible pour le moment.</p>
            <form action="{{ route('startChat') }}" method="POST" class="chat-cards-send">
                @csrf
                <img src="{{ asset('storage/imageUser/'.Auth::user()->pdp) }}" alt="" class="chat-cards-send-img">
                <textarea name="message" id="" cols="30" rows="10" class="chat-cards-send-textarea"></textarea>
                <button type="submit" class="chat-cards-send-btn">Envoyer</button>
            </form>
        @endif



{{--
        <form action="{{route('newChat', ['conversationId' => $conversation->id])}}" method="POST" class="chat-cards-send">
            <img src="{{asset('storage/imageUser/'.Auth::user()->pdp)}}" alt="" class="chat-cards-send-img">
            <textarea name="message" id="" cols="30" rows="10" class="chat-cards-send-textarea"></textarea>
            <button type="submit" class="chat-cards-send-btn">Enoyer</button>
        </form> --}}
    </div>
</section>

@endsection
