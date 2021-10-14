@if(session("mensaje"))
    <div class="alert alert-{{session('tipo') ? session("tipo") : "success"}}">
        {{session('mensaje')}}
    </div>
@endif
