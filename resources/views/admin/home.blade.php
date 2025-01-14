@extends('layouts.sidebar')
@section('content')


<h2 class="px-2 text-4xl font-semibold text-gray-800 py-14">Analytics</h2>

<div class="grid grid-cols-4 grid-rows-4 gap-8 py-4">
    <div class="flex w-full min-h-full justify-left items-left">
        {{ $chart->container () }}
    </div>

    <div class="flex min-h-full col-start-1 row-start-2 justify-left items-left">
        {{ $chart5->container () }}
    </div>
    <div class="col-span-3 col-start-2 row-span-2 row-start-1 justify-left items-left">
        {{ $chart2->container ()}}
    </div>

    <div class="col-span-4 row-span-2 row-start-3 justify-left items-left">
        {{ $chart3->container ()}}
    </div>

    <div class="col-span-4 row-span-2 row-start-5 justify-left items-left">
        {{ $chart4->container ()}}
    </div>
</div>

<script src="{{ $chart->cdn() }}"></script>
<script src="{{ $chart5->cdn() }}"></script>
<script src="{{ $chart2->cdn() }}"></script>
<script src="{{ $chart3->cdn() }}"></script>
<script src="{{ $chart4->cdn() }}"></script>

{{ $chart->script() }}
{{ $chart5->script()}}
{{ $chart2->script()}}
{{ $chart3->script()}}
{{ $chart4->script()}}

@endsection