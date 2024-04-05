<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Http\Request;
use App\Services\EpisodeService;

class EpisodeController extends Controller
{
    protected $episodeService;

    public function __construct(EpisodeService $episodeService)
    {
        $this->episodeService = $episodeService;
    }

    public function sortedEpisodes($column, $direction)
    {
        $episodes = $this->episodeService->sortEpisodes($column, $direction);

        return view('main', compact('episodes'));
    }

    public function filterEpisodes(Request $request)
    {
        $filterType = $request->input('filterType');
        $filteredEpisodes = null;

        if($filterType == 'name') {
            $filterValue = $request->input('filterValue');

            $filteredEpisodes = $this->episodeService->filterEpisodesByName($filterValue);
        } else if($filterType == 'created')  {
            $filterValueFrom = $request->input('filterValueFrom');
            $filterValueTo = $request->input('filterValueTo');

            $filteredEpisodes = $this->episodeService->filterEpisodesByCreatedDate($filterValueFrom, $filterValueTo);
        } else if($filterType == 'air') {
            $filterValueFrom = $request->input('filterValueFrom');
            $filterValueTo = $request->input('filterValueTo');

            $filteredEpisodes = $this->episodeService->filterEpisodesByAirDate($filterValueFrom, $filterValueTo);
        }

        $episodes = $filteredEpisodes->appends($request->except('page'));

        return view('main', compact('episodes'));
    }
}