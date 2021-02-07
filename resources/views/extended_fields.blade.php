<table class="table">
    <thead>
    <tr>
        <th scope="col">字段名</th>
        <th scope="col">字段值</th>
    </tr>
    </thead>
    <tbody>
    @foreach($value as $item)
        <tr>
            <td>{{$item['key']}}</td>
            <td>{{$item['value']}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
