<x-layout>
    <div>
        <h1>Setting Password</h1>
        <p>Set a password for your account</p>
        <form action="{{route('set.password')}}" method="POST">
            @csrf
            <div>
                <label for="">Password</label>
                <input type="password" name="password">
                @error('password')
                    <p>{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="">Confirm Password</label>
                <input type="password" name="password_confirmation">
                @error('password_confirmation')
                    <p>{{$message}}</p>
                @enderror
            </div>
            <button type="submit">Set</button>
        </form>
    </div>
</x-layout>
