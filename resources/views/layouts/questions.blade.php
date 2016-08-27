<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Pregunta</th>
        <th>Respuesta</th>
        <th>Capturado por</th>
    </tr>
    </thead>
    <tbody>
    @foreach($questions as $question)
    <tr>
        <th scope="row">$question->id</th>
        <td>$question->question</td>
        <td>$question->respuestadsc</td>
        <td>$question->usercapture</td>
    </tr>
    @endforeach
    </tbody>
</table>