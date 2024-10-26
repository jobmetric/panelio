@extends('panelio::layout.layout')

@section('body')
    @foreach($menus as $menu)
        <div class="row gy-5 g-xl-10">
            <h2>{{ trans($menu['title']) }}</h2>
            @foreach($menu['links'] as $link)
                <div class="col-sm-6 col-xl-2 mb-xl-10 mt-2">
                    <x-tile-link name="{{ trans($link['name']) }}" link="{{ $link['link'] }}">
                        {!! str_replace('{class}', 'fs-7x', $link['icon']) !!}
                    </x-tile-link>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection
