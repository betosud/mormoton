<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Libro</th>
        <th>Pregunta</th>
        <th>Respuesta</th>
        <th>Capturado por</th>
    </tr>
    </thead>
    <tbody>
    @foreach($questions as $question)
    <tr>
        <th scope="row">{!! $question->id !!}</th>
        <td>{!! $question->libro->name !!}</td>
        <td>{!! $question->question !!}</td>
        <td>{!! $question->respuesta->answer !!}</td>
        <td>{!! $question->userdata->name !!}</td>
    </tr>
    @endforeach
    </tbody>
</table>