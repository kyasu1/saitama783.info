@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @if(in_category('bargain'))
      @include('partials.content-single-bargain')
    @else
      @include('partials.content-single-'.get_post_type())
    @endif
  @endwhile
@endsection
