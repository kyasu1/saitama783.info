@extends('layouts.app')

@section('content')
  @php
  $areas = get_terms( array(
    'taxonomy' => 'area',
    'hide_empty' => false,
  ));
  @endphp

  <div class="ph1">
    @foreach( $areas as $area)
    <h2 class="shopinfo-h2">{{ preg_replace("/^.{3}/", "", $area->name) }}</h2>
    @php
    $args = array(
      'post_type' => 'shopinfo',
      'orderby' => 'meta_value',
      'order' => 'ASC',
      'meta_key' => 'id',
      'tax_query' => array(
        array(
          'taxonomy' => 'area',
          'field' => 'slug',
          'terms' => $area->slug,
        )
      )
    );
    $the_query = new WP_Query( $args );
    @endphp
    @while( $the_query->have_posts() ) @php($the_query->the_post())
      @include('partials.content-shopinfo')
    @endwhile @php(wp_reset_postdata())
  
    @endforeach
  </div>
  {!! get_the_posts_navigation() !!}
@endsection
