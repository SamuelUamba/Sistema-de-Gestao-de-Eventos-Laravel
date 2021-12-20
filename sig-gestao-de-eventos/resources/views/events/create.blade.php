<!--herdando a estrutura do html  com header e footer-->
@extends('layouts.main')

<!--Atribuindo titulo a pagina-->
@section('title','Criar Evento')


<!--Seccao do conteudo da pagina-->
@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Adicione e poste um evento</h1>

    <form class="row g-3" action="/events" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
            <label for="image">Imagem do Evento</label>
            <input type="file" name="image" id="image" class="form-control-file">

        </div>
       
        <div class="col-12">
            <label for="titlo" class="form-label">Evento</label>
            <input type="text" class="form-control" id="titlo" name="titlo" placeholder="Nome do  Evento">
        </div>
        <div class="col-12">
            <label for="data" class="form-label">Data do Evento</label>
            <input type="date" class="form-control" id="data" name="data">
        </div>
        <div class="col-md-6">
            <label for="cidade" class="form-label">Local do Evento</label>
            <input type="text" class="form-control" id="cidade" name="cidade">
        </div>
        <div class="col-md-6">
            <label for="privado" class="form-label">O Evento e privado?</label>
            <select id="privado" class="form-select" name="privado">
                <option selected>Escolha...</option>
                <option value="0">Nao</option>
                <option value="1">Sim</option>
            </select>
        </div>

        <div class="col-12">
            <label for="descricao" class="form-label">Descricao do Evento</label>
            <textarea name="descricao" id="descricao" class="form-control" placeholder="o que sera abordado no evento"></textarea>
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
            <button type="submit" class="btn btn-primary">Postar</button>
        </div>
    </form>

</div>

@endsection