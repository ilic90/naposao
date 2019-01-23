@if(count($errors))

    <div class="alert alert-danger">

        <ul class="errors_holder">

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif