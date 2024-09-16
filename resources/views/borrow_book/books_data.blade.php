@if(isset($booksData) && $booksData)
    @foreach($booksData as $key => $val)
        <tr>
            <td>
                <input type = "checkbox" class = "checkBooks">
            </td>
            <td class = "text-center">{{ $val['id'] }}</td>
            <td>{{ $val['barcode'] }}</td>
            <td>{{ $val['title'] }}</td>
            <td>{{ $val['description'] }}</td>
            <td>{{ $val['author_id'] }}</td>
        </tr>
    @endforeach
@endif