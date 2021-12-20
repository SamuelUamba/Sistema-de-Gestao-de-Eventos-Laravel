<!--herdando a estrutura do html  com header e footer-->
@extends('layouts.main')

<!--Atribuindo titulo a pagina-->
@section('title','Dashboard')


<!--Seccao do conteudo da pagina-->
@section('content')
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Eventos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events)>0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">likes e Confirmados</th>
                    <th scope="col">Accoes</th>
                </tr>
            </thead>
        
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td scropt="row">{{$loop->index + 1}}</td>
                    <td ><a href="/events/{{$event->id}}">{{$event->titlo}}</a></td>
                    <td>{{count($event->users)}}</td>
                    <td>
                        <a href="/events/edit/{{$event->id}}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a> 
                        <form action="/events/{{$event->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                        </form>
                    </td>
                </tr>

            @endforeach
        </tbody>
        </table>
    @else

    <p>Voce ainda nao tem eventos, <a href="/events/create">Criar Evento</a></p>
    @endif
</div>


@endsection