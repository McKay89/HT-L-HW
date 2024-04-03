@extends('layout')

@section('main')

@unless(count($episodes) == 0)
    <div class="w-full flex justify-center mt-9">
        <table class="w-full border-separate border-spacing-2 border border-slate-400">
            <thead class="h-12 text-xl">
                <tr>
                    <th></th>
                    <th>
                        <input type="text" id="filterByName" class="p-1 text-center" placeholder="Filter by 'Name'">
                    </th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>
                        <input type="text" id="filterByCreatedFrom" class="w-36 p-1 text-center" placeholder="FROM"> -
                        <input type="text" id="filterByCreatedTo" class="w-36 p-1 text-center" placeholder="TO">
                    </th>
                </tr>
                <tr class="bg-nav text-white">
                    <th><a href="{{ route('sorted-episodes', ['column' => 'ep_id', 'direction' => 'asc']) }}">ID <i class="fa-solid fa-sort"></i></a></th>
                    <th><a href="{{ route('sorted-episodes', ['column' => 'ep_name', 'direction' => 'asc']) }}">Name <i class="fa-solid fa-sort"></i></a></th>
                    <th><a href="{{ route('sorted-episodes', ['column' => 'ep_episode', 'direction' => 'asc']) }}">Episode <i class="fa-solid fa-sort"></i></a></th>
                    <th><a href="{{ route('sorted-episodes', ['column' => 'ep_url', 'direction' => 'asc']) }}">URL <i class="fa-solid fa-sort"></i></a></th>
                    <th><a href="{{ route('sorted-episodes', ['column' => 'ep_air_date', 'direction' => 'asc']) }}">Air Date <i class="fa-solid fa-sort"></i></a></th>
                    <th><a href="{{ route('sorted-episodes', ['column' => 'ep_created', 'direction' => 'asc']) }}">Created <i class="fa-solid fa-sort"></i></a></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($episodes as $episode)
                    <tr class="bg-table-body cursor-pointer hover:bg-table-body-hover text-lg hover:text-white transition text-center font-bold">
                        <td>{{ $episode->ep_id }}</td>
                        <td>{{ $episode->ep_name }}</td>
                        <td>{{ $episode->ep_episode }}</td>
                        <td>{{ $episode->ep_url }}</td>
                        <td>{{ $episode->ep_air_date }}</td>
                        <td>{{ $episode->ep_created }}</td>
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
            Please click on <strong>Download Data</strong> button !
        </span>
    </div>
@endunless

@endsection
