@if (count($post->tags))
  <ul>
    @foreach ($post->tags as $tag)
      <li>
        <a href="/posts/tags/{{ $tag->name }}">
          {{ $tag->name }}
        </a>
      </li>
    @endforeach
  </ul>
@endif
