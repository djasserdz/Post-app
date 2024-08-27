<x-layout>
    <div>
        <h1>Verify Email</h1>
        <p>we have sent you a link to verify your email</p>
         @if (session('true'))
             <p>{{session('true')}}</p>
         @endif
        <form action="{{route('verification.send')}}" method="POST">
            @csrf
            <button type="submit">Send again!</button>
        </form>
    </div>
</x-layout>
