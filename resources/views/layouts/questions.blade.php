<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Libro</th>
            <th>Pregunta</th>
            <th>Respuesta</th>
            <th>Capturado por</th>
            <th>Editar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($questions as $question)
        <tr>
            <th scope="row">{!! $question->id !!}</th>
            <td>{!! $question->libro->name !!}</td>
            <td>{!! $question->question !!}</td>
            <td>{!! $question->respuestacorrecta !!}</td>
            <td>{!! $question->userdata->name !!}</td>
            <td><a type="button" class="btn btn-primary" href="{!! route('editar',$question->id) !!}" >Editar</a></td>
        </tr>
        @endforeach
        </tbody>
</table>
</div>


<div class="pagination">

    {!! $questions->render() !!}

</div>