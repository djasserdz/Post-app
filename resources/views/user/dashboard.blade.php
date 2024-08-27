@props(['posts'])

<x-layout>
    <div class="dashboard">
        <h2>Manage Posts</h2>
        <a href="{{route('post.create')}}"><button>Add post</button></a>

        @foreach($posts as $post)
            <div class="post-container">
                <img class="post-image" src="{{ asset('storage/'.$post->image_path) }}" alt="{{ $post->title }}">
                <div class="post-content">
                    <h1 class="post-title">{{ $post->title }}</h1>
                    <div class="post-meta">
                        <p>Posted by {{ $post->user->username }} • {{ $post->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="post-body">
                        {{ $post->body }}
                    </div>
                    <div class="post-actions">
                        <!-- Update Button -->
                        <a href="{{route('post.edit',$post->id)}}" class="btn btn-update">Update</a>

                        <!-- Delete Button with Form -->
                        <form action="{{ route('post.destroy',$post) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        <div>
            {{ $posts->links('pagination::tailwind') }}

        </div>
    </div>

    <style>
        .dashboard {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .dashboard h2 {
            font-size: 32px;
            margin-bottom: 30px;
            color: #2c3e50;
        }
        .post-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden;
            margin-bottom: 20px;
        }
        .post-image {
            width: 100%;
            height: auto;
            display: block;
        }
        .post-content {
            padding: 20px;
        }
        .post-title {
            font-size: 24px;
            margin-bottom: 10px;
            color: #2c3e50;
        }
        .post-meta {
            font-size: 14px;
            color: #7f8c8d;
            margin-bottom: 15px;
        }
        .post-body {
            font-size: 16px;
            line-height: 1.8;
        }
        .post-actions {
            margin-top: 20px;
            display: flex;
            justify-content: flex-end;
        }
        .btn {
            padding: 10px 15px;
            margin-left: 10px;
            border-radius: 5px;
            color: #fff;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
        }
        .btn-update {
            background-color: #3498db;
        }
        .btn-delete {
            background-color: #e74c3c;
        }
        .btn-delete:hover {
            background-color: #c0392b;
        }
        .btn-update:hover {
            background-color: #2980b9;
        }
    </style>
</x-layout>
