<h1>Edit User</h1>

<p>Name: {{ $user->name }}</p>
<p>Email: {{ $user->email }}</p>
<p>Status: {{ $user->active ? 'Active' : 'Inactive' }}</p>

<form action="{{ route('users.toggleStatus', $user->id) }}" method="POST">
    @csrf
    <button type="submit">Toggle Status</button>
</form>