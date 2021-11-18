<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    
    public function index()
    {
        $search = request('search');

        if ($search) {
            $events = Event::where([
                ['titlo', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $events = Event::all();
        }
        return view('welcome', ['events' => $events, 'search' => $search]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $event = new Event;
        $event->titlo = $request->titlo;
        $event->privado = $request->privado;
        $event->cidade = $request->cidade;
        $event->descricao = $request->descricao;
        $event->itens = $request->itens;
        $event->data = $request->data;
        // upload da imagem
        if ($request->hasFile('image') && $request->file('image')->isvalid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request->image->move(public_path('img/events'), $imageName);

            $event->image = $imageName;
        }

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return Redirect('/')->with('msg', 'Evento Criado com sucesso!');
    }


    public function show($id)
    {
        $event = Event::findOrFail($id);

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();
        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);
    }

    public function dashboard()
    {
        $user = auth()->user();
        $events = $user->events;
        $eventsAsParticipant = $user->eventsAsParticipant;
        return view('events.dashboard', ['events' => $events,
                                         'eventsasparticipant'=>$eventsAsParticipant]);
    }


 

    public function destroy($id) {
        Event::findOrFail($id)->delete();

        return Redirect('/dashboard')->with('msg','Evento Excluido com sucesso!'); 
    }

    public function edit($id){

        $event = Event::findOrFail($id);

      return view('events.edit',['event'=> $event]);
    }

    public function update(Request $request){
        $data=$request->all();
        $event =Event::findOrFail($request->id); 
        $event->titlo = $request->titlo;
        $event->privado = $request->privado;
        $event->cidade = $request->cidade;
        $event->descricao = $request->descricao;
        $event->itens = $request->itens;
        $event->data = $request->data;
        // upload da imagem
        if ($request->hasFile('image') && $request->file('image')->isvalid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request->image->move(public_path('img/events'), $imageName);

            $event->image = $imageName;
        }else{
            $event->itens = $request->image;
        }
      
        $event->update();
        return Redirect('/dashboard')->with('msg','Evento Editado com sucesso!'); 
    }

    public function joinEvent($id){
        $user = auth()->user();
        $user->eventsAsParticipant()->attach($id);
        $event =Event::findOrFail($id); 
        return Redirect('/dashboard')->with('msg',
        'Sua Participação Foi Cofirmmada
        para '.$event->titlo); 

    }
    

}
