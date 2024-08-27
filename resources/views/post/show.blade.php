<x-layout>
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
</x-layout>
