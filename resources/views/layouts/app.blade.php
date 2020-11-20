<!DOCTYPE html>
<html lang="utf-8">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oficina Codificar - @yield('title')</title>

        <!-- UIkit CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/css/uikit.min.css" />
        <link rel="stylesheet" href="{{ asset('app.css') }}" />
        <!-- UIkit JS -->
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/js/uikit-icons.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.rawgit.com/plentz/jquery-maskmoney/master/dist/jquery.maskMoney.min.js"></script>
        
        <script>
            $(document).ready(function(){
                $("#currency-input").maskMoney({
                     decimal: ",",
                     thousands: ""
                 });
            });
        </script>

    </head>
    <body>
    	<div class="uk-section-primary uk-preserve-color">
            <nav class="uk-light" uk-navbar>
                <div class="uk-navbar-left">
                	<a class="uk-navbar-item uk-logo" href="/" uk-navbar-toggle-icon></a>
                    <ul class="uk-navbar-nav">
                        <li class="{{ request()->is('estimate/create') ? 'uk-active' : ''}}">
                            <a href="/estimate/create">Novo orçamento</a>
                        </li>
                        <li class="{{ request()->is('estimate') ? 'uk-active' : ''}}">
                        	<a href="/estimate">Lista de orçamentos</a>
                        </li>
                    </ul>
            
                </div>
            </nav>
        </div>
    	<div>
    		@yield('content')
    	</div>
    </body>
</html>
