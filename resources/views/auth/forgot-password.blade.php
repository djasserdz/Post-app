<x-layout>
    <div class="password-reset-container">
        <h1>Password Reset</h1>
        <p class="instruction">Enter your email address and we'll send you a password reset link.</p>

        @if (session('status'))
            <p class="alert alert-success">{{session('status')}}</p>
        @endif
        @if (session('email'))
            <p class="alert alert-info">{{session('email')}}</p>
        @endif

        <form action="{{route('password.email')}}" method="POST" class="password-reset-form">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                @error('email')
                    <p class="error-message">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="submit-btn">Send Reset Link</button>
        </form>
    </div>

    <style>
        .password-reset-container {
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
            margin-bottom: 1rem;
        }

        .instruction {
            text-align: center;
            color: var(--text-color);
            margin-bottom: 1.5rem;
        }

        .alert {
            padding: 0.75rem;
            border-radius: 4px;
            margin-bottom: 1rem;
            text-align: center;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }

        .password-reset-form {
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

        input[type="email"] {
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
