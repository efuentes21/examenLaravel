<div>
    <h1>Login</h1>
    <form method="POST" action="{{ route('login.commit') }}">
        @csrf
        <div>
            <label for="nick">Nick</label>
            <input type="text" name="nick" id="nick" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Log in</button>
    </form>
    <a href="{{ route("register.show") }}"> Not a user? Register here </a>
        
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