<form id="delete-form" action="{{ route('users.destroy', $user->id) }}" method="DELETE" style="display: none;">
    {{ csrf_field() }}
    <input type="text" value="test"/>
</form>