<div>
    <h2>Register</h2>
    <form method="POST" action="{{ route('register.commit') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="nick">Nick</label>
            <input type="text" name="nick" id="nick" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <label for="password_confirmation">Password confirmation</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>
        <button type="submit">Register</button>
    </form>
    <a href="{{ route("login.show") }}"> Already a user? Log in here</a>
    @if($errors)
        <div>
            <ul>
                @foreach($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>