@extends('layout')

@section('main')

@unless(count($episodes) == 0)
    <div class="w-full flex justify-center mt-9">
        <table class="w-full border-separate border-spacing-2 border border-slate-400">
            <thead class="bg-nav text-white h-12 text-xl">
                <tr>
                    <th>ID <i class="fa-solid fa-sort"></i></th>
                    <th>Name <i class="fa-solid fa-sort"></i></th>
                    <th>Episode <i class="fa-solid fa-sort"></i></th>
                    <th>URL <i class="fa-solid fa-sort"></i></th>
                    <th>Air Date <i class="fa-solid fa-sort"></i></th>
                    <th>Created <i class="fa-solid fa-sort"></i></th>
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
