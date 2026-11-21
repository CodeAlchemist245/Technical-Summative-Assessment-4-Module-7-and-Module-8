@if($user->avatar)

<img
src="{{ asset('storage/'.$user->avatar) }}"
width="80">

@else

<img
src="https://via.placeholder.com/80"
width="80">

@endif