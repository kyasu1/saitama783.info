@extends('layouts.app')

@section('content')
  <h1>コルソのページ</h1>
  @while(have_posts()) @php(the_post())
    @include('partials.content-single-'.get_post_type())
  @endwhile
@endsection
