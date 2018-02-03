@php
/*
<article @php(post_class())>
  <header>
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>
    @include('partials/entry-meta')
  </header>
  <div class="entry-summary">
    @php(the_excerpt())
  </div>
</article>
*/
@endphp
<article @php(post_class('flex'))>
  <a href="{{ the_permalink() }}" class="link">
    <div class="w4 w5-ns ba" style="line-height: 0">
      {{ the_post_thumbnail( 'medium', array( 'class' => 'h-auto')) }}
    </div>
  </a>
  <div class="w-100 ml1 flex flex-column justify-between">
    <div class="pv1"><a href="{{ the_permalink() }}" class="link f5 black b">{{ the_title() }}</a></div>
    <div class="dn db-ns flex-auto">{{ the_excerpt() }}</div>
    <div class="tr f6 fw8 pv1"><time class="updated" datetime="{{ get_the_modified_date('c', true) }}">{{ get_the_modified_date('Y.m.d') }}</time>&nbsp;更新</div>
  </div>
</article>
<hr class="my-bg-dark-blue">
