
@if(isset($bookData) && $bookData)
    @foreach($bookData as $val)
        <tr>
            <td class="text-center">
                <input type="checkbox" class="checkBooks">
            </td>
            <td class="text-center">{{ $val['id'] }}</td>
            <td>{{ $val['barcode'] }}</td>
            <td>{{ $val['title'] }}</td>
            <td>{{ $val['description'] }}</td>
            <td>{{ $val['author_id'] }}</td>
        </tr>
    @endforeach
@endif