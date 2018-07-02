<div class="column is-7 approve-registration">
    <nav class="card">
        <header class="card-header">
            <p class="card-header-title">
                Registered users
            </p>
        </header>

        <div class="card-content">
            @if($registrationUsers !== null && !$registrationUsers->isEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Signed up at</td>
                            <td>Approve</td>
                            <td>Deny</td>
                        </tr>
                    </thead>
                    @foreach($registrationUsers as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->format('d-m-y')}}</td>
                            <td><a href="{{route('registration-approved', $user->id)}}"
                                   class="is-success button">Approve</a></td>
                            <td><a href="{{route('registration-denied', $user->id)}}"
                                   class="is-danger button">Deny</a></td>
                        </tr>
                    @endforeach
                </table>
            @else
                All users have been registered or denied.
            @endif
        </div>
    </nav>
</div>