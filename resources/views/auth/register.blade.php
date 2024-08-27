<x-layout>
    <div class="register-container">
        <h1>Register</h1>
        <form action="{{route('register')}}" method="POST" class="register-form" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
                @error('username')
                   <p class="error-message">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="text">Email</label>
                <input type="text" id="email" name="email">
                @error('email')
                   <p class="error-message">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                @error('password')
                   <p class="error-message">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" >
                @error('password_confirmation')
                   <p class="error-message">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="">Image</label>
                <input type="file" name="image">
                @error('image')
                    <p class="error-message">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="submit-btn">Register</button>
        </form>
    </div>

    <style>
        .register-container {
            max-width: 400px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
        }

        .register-form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-color);
        }

        input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        .error-message {
            color: var(--hover-color);
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .submit-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: var(--secondary-color);
        }
    </style>
</x-layout>
