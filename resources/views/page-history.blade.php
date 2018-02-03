@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    @include('partials.content-page')
    @if( have_rows('history') ) @while( have_rows('history') ) @php( the_row() )
        <div class="flex flex-column flex-row-ns relative ml5 history lh-copy">
            <div class="history-year flex">
                <div class="pa1 pl3 w4">{{ the_sub_field('wareki') }}</div>
                <div class="pa1">({{ the_sub_field('year') }})</div>
            </div>
            <div class="history-events pa1 ml4 ml2-ns">
                {{ the_sub_field('events') }}
            </div>
        </div>
    @endwhile @endif
  @endwhile
@endsection
