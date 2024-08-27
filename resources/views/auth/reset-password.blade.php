<x-layout>
    <div>
        <h1>Reset Password</h1>
        <form action="{{route('password.reset')}}" method="POST">
            @csrf
            <input type="hidden" value="{{$request->token}}">
            <div>
                <label for="">Email</label>
                <input type="text" name="email">
                @error('email')
                    <p>{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="">Password</label>
                <input type="text" name="password">
                @error('password')
                    <p>{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="">Confirm Password</label>
                <input type="text" name="password_confirmation">
                @error('password_confirmation')
                    <p>{{$message}}</p>
                @enderror
            </div>
            <button type="submit">reset</button>
        </form>
    </div>
</x-layout>
