<!--herdando a estrutura do html  com header e footer-->
@extends('layouts.main')

<!--Atribuindo titulo a pagina-->
@section('title','Evento: '.$event->titlo)


<!--Seccao do conteudo da pagina-->
@section('content')
<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/events/{{$event->image}}" class="img-fluid" alt="{{$event->titlo}}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{$event->titlo}}</h1>
            <p class="event-city">
                <ion-icon name="location-outline"></ion-icon> {{$event->cidade}}
            </p>
            <p class="events-participants">
                <ion-icon name="people-outline"></ion-icon> {{count($event->users)}} Participantes
            </p>
            <p class="event-owner">
                <ion-icon name="people-outline"></ion-icon> Dono do Evento: {{$eventOwner['name']}}
            </p>
            <form action="/events/join/{{$event->id}}" method="post">
                @csrf
                <a href="/events/join/{{$event->id}}" class="btn btn-primary" id="event-submit" onclick="event.preventDefault();
           this.closest('form').submit(); ">
                    Confirmar Presenca</a>
            </form>
            <h3>O Evento conta com: </h3>
            <ul id="itens-list">
                @foreach($event->itens as $iten)
                <li>
                    <ion-icon name="location-outline"></ion-icon><span>{{$iten}}</span>
                </li>

                @endforeach
            </ul>
        </div>
        <div class="col-md-12" id="description-container">
            <h3> Sobre o Evento</h3>
            <p class="event-description">{{$event->descricao}}</p>
        </div>
    </div>
</div>

@endsection