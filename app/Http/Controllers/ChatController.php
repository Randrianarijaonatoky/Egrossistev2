<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Models\{Chat, Conversation};
use Illuminate\Http\Request;

class ChatController extends Controller
{
    //

    public function showChat($userId){
          // Vérifiez l'ID utilisateur

        $conversations = Conversation::where('user_id', $userId)->with('chats')->get();
        // dd($conversations);
        $conversation = $conversations->first();
        return view('user.chatUser' , compact('conversations', 'conversation'));
    }

    public function showConversation($conversationId)
    {
        // Récupérer la conversation avec les messages associés
        $conversation = Conversation::with('chats')->findOrFail($conversationId);

        // Passer la conversation à la vue
        return view('user.ChatUser', [
            'conversation' => $conversation,
        ]);
    }


    public function startConversation(Request $request)
    {
        // Obtenir l'utilisateur connecté
        $userId = auth()->id();

        // Créer une nouvelle conversation pour cet utilisateur
        $conversation = Conversation::create([
            'user_id' => $userId,
        ]);

        // Rediriger vers la vue de chat avec la nouvelle conversation
        return redirect()->route('showChat', ['userId' => $userId]);
    }

    public function newChat(Request $request, $conversationId) {
        $user_id = auth()->user();
        $message = Chat::create([
            "conversation_id" => $conversationId,
            'sender_id' => $user_id->id,
            'message' => $request->input('message'),
        ]);

        return  back();
    }
}
