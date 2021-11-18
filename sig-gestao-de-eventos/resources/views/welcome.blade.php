<!--herdando a estrutura do html  com header e footer-->
@extends('layouts.main')

<!--Atribuindo titulo a pagina-->
@section('title','Dashboard Eventos')


<!--Seccao do conteudo da pagina-->
@section('content')
<div id="search-container" class="col-md-12">
  <h1>Busque um Evento</h1>
  <form action="/" method="GET">
    <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
  </form>
</div>

<div id="events-container" class="col-md-12">

  @if($search)
   <h2>Buscando por: {{$search}} </h2>
   @else
   <h2>Proximos Eventos </h2>
   <p class="subtitle">Veja os Eventos dos próximos dias</p>
  @endif
  
  <div id="cards-container" class="row">
    @foreach($events as $event)
    <div id="card" class="col-md-3">
      <img src="/img/events/{{$event->image}}" alt="{{$event -> titlo}}">
      <div class="card-body">
        <p class="card-date">{{date('d/m/Y',strtotime($event->data))}}</p>
        <h5 class="card-title">{{$event -> titlo}}</h5>
        <p class="card-participants">{{count($event->users)}}  participantes Confirmados</p>
        <a href="/events/{{$event->id}}" class="btn btn-primary">Saber mais</a>
      </div>
    </div>
    @endforeach


  </div>
  @if(count($events)==0 && $search)
  <p>Não foi possivel encontar algum evento com {{$search}}! <a id="vertodos" href="/">Ver todos!</a></p>
  @elseif(count($events)==0)
  <p>Não existem eventos disponíveis</p>
  @endif
</div>
@endsection