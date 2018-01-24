<article class="flex ph1">
  <a href="{{ the_permalink() }}" class="link" style="line-height: 0;" >
    <div class="w4 w5-ns ba b--dark-blue">
      @if( get_field('image-1') )
        {!! wp_get_attachment_image( get_field('image-1'), 'medium', false, array( 'class' => 'h-auto' )) !!}
      @else
        <img src="@asset('images/00_noren.png')">
      @endif
    </div>
  </a>
  <div class="w-100 ml1 ml2-ns">
    <div class="f4 f3-ns mv1 my-purple b">
      <a href="{{ the_permalink() }}" class="link my-purple">
        {{ the_title() }}
      </a>
    </div>
    <div class="f4-ns mv1">{!! do_shortcode( get_post_meta($post->ID, 'access', true) ) !!}</div>
    <p class="dn tr f6 f5-ns fw8"><time class="updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date('Y.m.d') }}</time>&nbsp;更新</p>
  </div>
</article>
