<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\HomeController as ApiHomeController;
use Illuminate\Support\Facades\Redis;
use Session;

class HomeController extends Controller
{
    public function questionOne() {
        $cachedOutputNumber = Redis::get('outputNumber') ?? 0;
        return view('admin.questions.question_one', compact('cachedOutputNumber'));
    }

    public function clearOutputNumberCache() {
        Redis::del('outputNumber');
        return true;
    }

    public function calculate(Request $request) {
        $apiController = new ApiHomeController();
        $response = $apiController->calculate($request);
        $response = $response->getData();
        if ($response->error) {
            Session::flash('error', $response->message);
        }
        return redirect()->route('question-one');
    }

    public function questionTwo() {
        return view('admin.questions.question_two');
    }
    
    public function userInterface() {
        $apiController = new ApiHomeController();

        // currently without modal for user so we assume user id is 1
        $userId = 1;
        $friendsResponse = $apiController->getFriends($userId)->getData();
        $watchedMoviesResponse = $apiController->getWatchedMovies($userId)->getData();
        $recommendedMoviesResponse = $apiController->getRecommendedMovies($userId)->getData();
        $friends = $friendsResponse->data;
        $watchedMovies = $watchedMoviesResponse->data;
        $recommendedMovies = $recommendedMoviesResponse->data;

        return view('admin.questions.user_interface', compact('friends', 'watchedMovies', 'recommendedMovies'));
    }
}
