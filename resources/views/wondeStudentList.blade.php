@foreach ($classes as $class)
    @foreach ($class['students'] as $student)
        <tr class="{{ $class['classId'] }}">
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $student->forename }}</td>
            <td>{{ $student->surname }}</td>
            <td>{{ $class['className'] }}</td>
        </tr>
    @endforeach
@endforeach
