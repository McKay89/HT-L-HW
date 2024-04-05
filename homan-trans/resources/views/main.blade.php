@extends('layout')

@section('main')
@include('partials._nav')
@include('partials._loader')

@unless(count($episodes) == 0)
    <div class="w-full flex justify-center mt-9">
        <table class="w-full border-separate border-spacing-2 border border-slate-400">
            <thead class="h-12 text-xl">
                <tr>
                    <th></th>
                    <th>
                        <input type="text" id="filterByNameInput" class="p-1 text-center" placeholder="Filter by 'Name'">
                        <button id="filterByNameSubmit" class="bg-button hover:bg-button-hover p-1 px-2 ml-2 transition text-white border border-blue-700 rounded">GO</button>
                    </th>
                    <th></th>
                    <th></th>
                    <th>
                        <input type="text" id="filterByAirFromInput" class="w-24 p-1 text-center" placeholder="FROM"> -
                        <input type="text" id="filterByAirToInput" class="w-24 p-1 text-center" placeholder="TO">
                        <button id="filterByAirDateSubmit" class="bg-button hover:bg-button-hover p-1 px-2 ml-2 transition text-white border border-blue-700 rounded">GO</button>
                    </th>
                    <th>
                        <input type="text" id="filterByCreatedFromInput" class="w-24 p-1 text-center" placeholder="FROM"> -
                        <input type="text" id="filterByCreatedToInput" class="w-24 p-1 text-center" placeholder="TO">
                        <button id="filterByCreatedDateSubmit" class="bg-button hover:bg-button-hover p-1 px-2 ml-2 transition text-white border border-blue-700 rounded">GO</button>
                    </th>
                </tr>
                <tr class="bg-nav text-white">
                    <th><a href="{{ route('sorted-episodes', ['column' => 'ep_id', 'direction' => 'asc']) }}"><span class="hover:underline">ID</span> <i class="fa-solid fa-sort"></i></a></th>
                    <th><a href="{{ route('sorted-episodes', ['column' => 'ep_name', 'direction' => 'asc']) }}"><span class="hover:underline">Name</span> <i class="fa-solid fa-sort"></i></a></th>
                    <th><a href="{{ route('sorted-episodes', ['column' => 'ep_episode', 'direction' => 'asc']) }}"><span class="hover:underline">Episode</span> <i class="fa-solid fa-sort"></i></a></th>
                    <th><a href="{{ route('sorted-episodes', ['column' => 'ep_url', 'direction' => 'asc']) }}"><span class="hover:underline">URL</span> <i class="fa-solid fa-sort"></i></a></th>
                    <th><a href="{{ route('sorted-episodes', ['column' => 'ep_air_date', 'direction' => 'asc']) }}"><span class="hover:underline">Air Date</span> <i class="fa-solid fa-sort"></i></a></th>
                    <th><a href="{{ route('sorted-episodes', ['column' => 'ep_created', 'direction' => 'asc']) }}"><span class="hover:underline">Created</span> <i class="fa-solid fa-sort"></i></a></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($episodes as $episode)
                    <tr class="bg-table-body cursor-pointer hover:bg-table-body-hover text-lg hover:text-white transition text-center font-bold" data-characters="{{ $episode->ep_characters }}" data-episode="{{ $episode->ep_name }}">
                        <td>{{ $episode->ep_id }}</td>
                        <td>{{ $episode->ep_name }}</td>
                        <td>{{ $episode->ep_episode }}</td>
                        <td>{{ $episode->ep_url }}</td>
                        <td>{{ date('Y-m-d', strtotime($episode->ep_air_date)) }}</td>
                        <td>{{ date('Y-m-d H:i:s', strtotime($episode->ep_created)) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="w-full flex justify-center mt-10">
        {{ $episodes->links() }}
    </div>
@else
    <div class="w-full flex justify-center mt-20 text-3xl text-center">
        <span>
            No episodes found !<br>
        </span>
    </div>
@endunless

@endsection
