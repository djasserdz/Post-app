<x-layout>
    <div class="create-post-container">
        <h1>Create a Post</h1>
        @if (session('true'))
            <p>{{session('true')}}</p>
        @endif
        <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data" class="create-post-form">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}">
                @error('title')
                    <p class="error-message">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea id="body" name="body" rows="5">{{ old('body') }}</textarea>
                @error('body')
                    <p class="error-message">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" accept="image/*">
                @error('image')
                    <p class="error-message">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="submit-btn">Create Post</button>
        </form>
    </div>

    <style>
        .create-post-container {
            max-width: 600px;
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

        .create-post-form {
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
        textarea {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        textarea {
            resize: vertical;
        }

        input[type="file"] {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            background-color: #f8f9fa;
        }

        .error-message {
            color: #dc3545;
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
