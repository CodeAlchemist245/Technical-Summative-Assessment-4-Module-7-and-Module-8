<form method="POST"
      action="/users/{{ $user->id }}"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <input name="username"
           value="{{ old('username',$user->username) }}">

    <input name="full_name"
           value="{{ old('full_name',$user->full_name) }}">

    <input type="file"
           name="avatar">

    <button type="submit">
        Update User
    </button>

</form>
