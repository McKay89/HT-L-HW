<?php

namespace App\Services;

use App\Models\Episode;

class EpisodeService
{
    public function sortEpisodes($column, $direction)
    {
        return Episode::orderBy($column, $direction)->paginate(7);
    }

    public function filterEpisodesByName($filterValue)
    {
        return Episode::where('ep_name', 'like', '%' . $filterValue . '%')->paginate(7);
    }

    public function filterEpisodesByCreatedDate($filterValueFrom, $filterValueTo)
    {
        $query = Episode::query();

        if (!empty($filterValueFrom)) {
            $filterValueFrom = date('Y-m-d H:i:s', strtotime($filterValueFrom));
            $query->where('ep_created', '>=', $filterValueFrom);
        }
    
        if (!empty($filterValueTo)) {
            $filterValueTo = date('Y-m-d H:i:s', strtotime($filterValueTo));
            $query->where('ep_created', '<=', $filterValueTo);
        }
    
        return $query->paginate(7);
    }

    public function filterEpisodesByAirDate($filterValueFrom, $filterValueTo)
    {
        $query = Episode::query();

        if (!empty($filterValueFrom)) {
            $filterValueFrom = date('Y-m-d', strtotime($filterValueFrom));
            $query->whereDate('ep_air_date', '>=', $filterValueFrom);
        }
    
        if (!empty($filterValueTo)) {
            $filterValueTo = date('Y-m-d', strtotime($filterValueTo));
            $query->whereDate('ep_air_date', '<=', $filterValueTo);
        }
    
        return $query->paginate(7);
    }
}