<x-layout>
    <style>
        /* General styling for the post container */
.post-container {
    display: flex;
    flex-direction: column;
    width: 300px; /* Adjust width for smaller size */
    margin: 0 auto; /* Center horizontally */
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

/* Styling for the post image */
.post-image {
    width: 100%; /* Full width of container */
    height: 180px; /* Adjust height as needed */
    object-fit: cover; /* Cover the container without distortion */
}

/* Styling for the post content */
.post-content {
    padding: 15px;
}

/* Styling for the post title */
.post-title {
    font-size: 18px; /* Smaller title font size */
    margin: 0 0 10px 0; /* Margin below the title */
}

/* Styling for post meta */
.post-meta {
    font-size: 12px; /* Smaller font size for meta info */
    color: #777;
    margin-bottom: 15px; /* Margin below meta info */
}

/* Styling for the post body */
.post-body {
    font-size: 14px; /* Smaller font size for body text */
    color: #333;
}

    </style>
    @foreach($posts as $post)
    <!-- Display your post content -->
    <div class="post-container">
        <img class="post-image" src="{{ asset('storage/'.$post->image_path) }}" alt="{{ $post->title }}">
        <div class="post-content">
            <h1 class="post-title">{{ $post->title }}</h1>
            <div class="post-meta">
                <p>Posted by {{ $post->user->username }} • {{ $post->created_at->diffForHumans() }}</p>
            </div>
            <div class="post-body">
                {{ $post->body }} <a href="{{route('post.show',$post)}}">Read more &rarr;</a>
            </div>
        </div>
    </div>
@endforeach

<!-- Display pagination links -->
<div class="pagination-links">
    {{ $posts->links('pagination::bootstrap-5') }}

</div>

</x-layout>
