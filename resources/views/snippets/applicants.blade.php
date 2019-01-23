<div class="list-group">
	@foreach($applicants as $applicant)
		<a href="{{ route('getProfile', ['uid' => $applicant->user->id]) }}" class="list-group-item">{{$applicant->user->first_name}} {{ $applicant->user->first_name }}</a>
	@endforeach
</div> 