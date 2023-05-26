@foreach ($search as $usr)
<tr>

    <td>{{ $usr->id }}</td>
    <td><img width = "30px" style="border-radius : 100%; " src="{{ $usr->provider_avatar }}" alt="{{ $usr->id }}"></td>
    <td>{{ $usr->first_name }}</td>
    <td>{{ $usr->last_name }}</td>
    <td>{{ $usr->provider_username }}</td>
    <td><small>{{ $usr->provider_email }}</small></td>
    @if ($check($usr->id))

        <td><a class="p-2 border text-danger" >Admin</a></td>
    @else
        <td><a onclick="add_user_to_confirm({{ $usr->id }})" type="button" class="p-2 border text-primary" data-toggle="modal" data-target="#exampleModalLive">Hire</a></td>
        
    @endif
    
    
</tr>
@endforeach