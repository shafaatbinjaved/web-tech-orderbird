<tr>
    <td>
        {{ $lead->first_name  }}
    </td>
    <td>{{ $lead->last_name  }}</td>
    <td>{{ $lead->email  }}</td>
    <td>{{ $lead->phone_num  }}</td>
    <td>{{ $lead->created_at->toFormattedDateString()  }}</td>
</tr>