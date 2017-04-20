@if (count($post->tags))
  <div class="card">
    <div class="card-block">
      <h5 class="list-group">Tags related to this post.</h5>

      <ul>
        @foreach ($post->tags as $tag)
          <li>
            <a href="/posts/tags/{{ $tag->name }}">
              {{ $tag->name }}
            </a>
          </li>
        @endforeach
      </ul>

    </div>
  </div>
@endif
