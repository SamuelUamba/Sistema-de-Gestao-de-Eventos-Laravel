<!--herdando a estrutura do html  com header e footer-->
@extends('layouts.main')

<!--Atribuindo titulo a pagina-->
@section('title','Editando: '.$event->titlo)


<!--Seccao do conteudo da pagina-->
@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{$event->titlo}}</h1>

    <form class="row g-3" action="/events/update/{{$event->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-12">
            <label for="image">Imagem do Evento</label>
            <input type="file" name="image" id="image" class="form-control-file">
            <img src="/img/events/{{$event->image}}" alt="{{$event->titlo}}" class="img-preview">
        </div>
       
        <div class="col-12">
            <label for="titlo" class="form-label">Evento</label>
            <input type="text" class="form-control" id="titlo" name="titlo" placeholder="Nome do  Evento" value="{{$event->titlo}}">
        </div>
        <div class="col-12">
            <label for="data" class="form-label">Data do Evento</label>
            <input type="date" class="form-control" id="data" name="data" value="{{$event->data->format('Y-m-d')}}">
        </div>
        <div class="col-md-6">
            <label for="cidade" class="form-label">Local do Evento</label>
            <input type="text" class="form-control" id="cidade" name="cidade" value="{{$event->cidade}}">
        </div>
        <div class="col-md-6">
            <label for="privado" class="form-label">O Evento e privado?</label>
            <select id="privado" class="form-select" name="privado">
                <option value="0">Nao</option>
                <option value="1"{{$event->privado== 1 ? "selected='selected'":""}}>Sim</option>
            </select>
        </div>

        <div class="col-12">
            <label for="descricao" class="form-label">Descricao do Evento</label>
            <textarea name="descricao" id="descricao" class="form-control" placeholder="o que sera abordado no evento">{{$event->descricao}}</textarea>
        </div>
        <div class="col-12">
            <label for="descricao" class="form-label">Itens de infraestruturas</label>
            <div class="form-goup">
                <input type="checkbox" name="itens[]" id="itens" value="Cadeiras"> Cadeiras
            </div>
            <div class="form-goup">
                <input type="checkbox" name="itens[]" id="itens" value="Palco"> Palco
            </div>
            <div class="form-goup">
                <input type="checkbox" name="itens[]" id="itens" value="Cerveja Gratis"> Cerveja gratis
            </div>
            <div class="form-goup">
                <input type="checkbox" name="itens[]" id="itens" value="Brindis"> Brindes
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Editar Evento</button>
        </div>
    </form>

</div>

@endsection