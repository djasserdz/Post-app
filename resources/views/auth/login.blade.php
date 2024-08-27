<x-layout>
    <div class="login-container">
        <h1>Login</h1>
        @if (session('false'))
            <p class="alert alert-danger">{{session('false')}}</p>
        @endif
        <form action="{{route('login')}}" method="POST" class="login-form">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" >
                @error('email')
                    <p class="error-message">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" >
                @error('password')
                    <p class="error-message">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group checkbox-group">
                <label>
                    <input type="checkbox" name="remember">
                    <span>Remember me</span>
                </label>
                <a href="{{route('password.request')}}" class="forgot-password">Forgot Password?</a>
            </div>
            <button type="submit" class="submit-btn">Login</button>
        </form>
        <div class="social-login">
            <a href="{{route('google.redirect')}}" class="google-btn">
                <i class="fab fa-google"></i> Sign in with Google
            </a>
        </div>
    </div>

    <style>
        .login-container {
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

        .alert {
            padding: 0.75rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .login-form {
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

        input[type="text"],
        input[type="password"] {
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

        .checkbox-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .checkbox-group label {
            display: flex;
            align-items: center;
        }

        .checkbox-group input[type="checkbox"] {
            margin-right: 0.5rem;
        }

        .forgot-password {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.875rem;
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

        .social-login {
            margin-top: 1rem;
            text-align: center;
        }

        .google-btn {
            display: inline-block;
            background-color: #4285F4;
            color: white;
            padding: 0.75rem 1rem;
            border-radius: 4px;
            text-decoration: none;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .google-btn:hover {
            background-color: #357ae8;
        }

        .google-btn i {
            margin-right: 0.5rem;
        }
    </style>
</x-layout>
