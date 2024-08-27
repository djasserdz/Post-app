@props(['posts'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
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
    </style>
</head>
<body>
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
            </div>
        </div>
    @endforeach
</body>
</html>
