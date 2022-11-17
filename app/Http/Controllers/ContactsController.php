<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\User;
use App\Message;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public  function getexpert()
    {
        //je vais recevoir tous les users sauf qu'il sont authentifier 
        $contacts = User::where('id', '!=', auth()->id())->where('role', 'EXPERT')->get();
        //obtenir une collection d'éléments où sender_id est l'utilisateur qui nous a envoyé un message
        // et messages_count est le nombre de messages non lus que nous avons de lui
        $unreadIds = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
        ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();

            // ajoute une clé non lue à chaque contact avec le nombre de messages non lus
            $contacts = $contacts->map(function($contact) use ($unreadIds) {
                $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();
    
                $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;
    
                return $contact;
            });


        return response()->json($contacts);
    }
    public  function get()
    {
        //je vais recevoir tous les users sauf qu'il sont authentifier 
        $contacts = User::where('id', '!=', auth()->id())->get();
        //obtenir une collection d'éléments où sender_id est l'utilisateur qui nous a envoyé un message
        // et messages_count est le nombre de messages non lus que nous avons de lui
        $unreadIds = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
        ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();

            // ajoute une clé non lue à chaque contact avec le nombre de messages non lus
            $contacts = $contacts->map(function($contact) use ($unreadIds) {
                $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();
    
                $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;
    
                return $contact;
            });


        return response()->json($contacts);
    }
    public function getMessagesFor($id)
    {
        // mark all messages with the selected contact as read
        Message::where('from', $id)->where('to', auth()->id())->update(['read' => true]);

        // get all messages between the authenticated user and the selected user
        $messages = Message::where(function($q) use ($id) {
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function($q) use ($id) {
            $q->where('from', $id);
            $q->where('to', auth()->id()); 
        })
        ->get(); // (a=1 and b=2) or (c=1 and d=2)

        return response()->json($messages);
    }
    public function send(Request $request)
    {   
       $message = Message::create([
            'from' => auth()->id(),
            'to' => $request->contact_id,
            'text' => $request->text
        ]);
        broadcast(new NewMessage($message));
        return response()->json($message);
    }
}