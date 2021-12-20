<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Mudando o titlo Dinamicamente de acordo com a sessao-->
  <title>@yield('title')</title>

  <!-- Fonte do Google -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

  <!--CSS bootstrep -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <!-- CSS da aplicacao-->
  <link rel="stylesheet" href="/css/styles.css">

  <script src="/js/scripts.js"></script>

  <!-- icone das Paginas-->
  <link rel="shortcut icon" href="/img/emblema.jpg" >
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="collapse navbar-collapse" id="navbar">
        <a href="/" class="navbar-brand">
          <img src="/img/emblema.jpg" alt=" fundo">
        </a>
        <h2>Portal de Eventos Online</h2><br>
        
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="/" class="nav-link">Pagina Inicial</a>
          </li>
          <li class="nav-item">
            <a href="/events/create" class="nav-link">Postar Eventos</a>
          </li>
          @auth
          <li class="nav-item">
            <a href="/dashboard" class="nav-link">Meus Eventos</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Perfil</a>
          </li>
          <li class="nav-item">
            <form action="/logout" method="POST">
              @csrf
              <a href="/logout" 
              class="nav-link" 
              onclick="event.preventDefault();
              this.closest('form').submit()">
              Sair</a>
          </form>
          </li>

          @endauth
          @guest
          <li class="nav-item">
            <a href="/login" class="nav-link">Entrar</a>
          </li>
          <li class="nav-item">
            <a href="/register" class="nav-link">Cadastrar</a>
            
          </li>
          @endguest
        </ul><br>
        
      </div>
     
    </nav>

  
  </header>

  <main>
    <div class="container-fluid">
      <div class="row">
        <!-- Mudando o conteudo Dinamicamente de acordo com a sessao-->
        @if(session('msg'))
          <p class="msg">{{session('msg')}}</p>
        @endif
        @yield('content')
      </div>
    </div>
  </main>

  <footer>
    <p>Portal de Eventos  &copy; 2021</p>
  </footer>
  <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html> 