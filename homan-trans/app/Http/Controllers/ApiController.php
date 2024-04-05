<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller {
    private static $uploadInProgress = false;

    public function index(){
        // Check if data uploading is in progress
        if (self::$uploadInProgress) {
            return response()->json(['success' => false, 'message' => 'Upload in progress']);
        }

        self::$uploadInProgress = true;

        // Fetching Rick and Morty API
        $response = Http::get('https://rickandmortyapi.com/api/episode');
        $episodes = $response->json();
        
        $uploadedEpisodes = self::upload($episodes);

        self::$uploadInProgress = false;

        if ($uploadedEpisodes) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    private static function upload($episodes) {
        $success = false;

        foreach ($episodes['results'] as $episodeData) {
            // Check if episode already uploaded
            $existingEpisode = Episode::where('ep_id', $episodeData['id'])->first();
            
            // If episode does not exist, upload to database
            if (!$existingEpisode) {
                $episode = new Episode();
                $episode->ep_id = $episodeData['id'];
                $episode->ep_name = $episodeData['name'];
                $episode->ep_air_date = date('Y-m-d', strtotime($episodeData['air_date']));
                $episode->ep_episode = $episodeData['episode'];
                
                $characters = [];

                foreach ($episodeData['characters'] as $characterUrl) {
                    $characterResponse = Http::get($characterUrl);
                    $characterData = $characterResponse->json();
                    $characters[] = [
                        'id' => $characterData['id'],
                        'name' => $characterData['name']
                    ];
                }

                $episode->ep_characters = json_encode($characters);
                
                $episode->ep_url = $episodeData['url'];
                $episode->ep_created = date('Y-m-d H:i:s', strtotime($episodeData['created']));
                $episode->save();
                $success = true;
            }
        }

        return $success;
    }
}
