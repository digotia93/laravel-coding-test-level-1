<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use Exception;

class HomeController extends ApiController
{
    public function calculate(Request $request) {        
        $cachedOutputNumber = Redis::get('outputNumber') ?? 0;
        
        try {
            $operators = ['+', '-', '*', '/'];
            if (!in_array($request->operator, $operators)) {
                throw new Exception('Invalid operator!');
            }

            switch ($request->operator) {
                case '+':
                    $output = $cachedOutputNumber + $request->second_number;
                    break;
                case '-':
                    $output = $cachedOutputNumber - $request->second_number;
                    break;
                case '*':
                    $output = $cachedOutputNumber * $request->second_number;
                    break;
                case '/':
                    if ($request->second_number == 0) {
                        throw new Exception('Division by 0 is not allowed!');
                    }
                    $output = $cachedOutputNumber / $request->second_number;
                    break;
                default:
                    $output = 0;
                    break;
            }

            Redis::set('outputNumber', $output);
            return response()->json([
                'error' => false,
                'data' => $output
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
                'data' => null
            ]); 
        }
    }

    public function getFriends($id) {
        // currently no model for friends according to id, so use hardcoded instead
        $friends = [
            'Amy Chong',
            'Teck Foo',
            'Jason Lee',
            'Edmund Lam',
            'Kenny Lopez',
            'Mary Chin',
            'Toga Busun',
        ];

        return response()->json([
            'error' => false,
            'data' => $friends
        ]);
    }

    public function getWatchedMovies($userId) {
        // to get watched movies from table watched_movies ('user_id', and 'movie_id'), but no model, so use hardcoded instead
        // $watchedMovies = Movies::whereHas('watched_movies', function ($query) {
        //     $query->where('user_id', $userId);
        // });

        $watchedMovies = [
            [
                'image' => 'https://image.tmdb.org/t/p/w185/jcTq6gIskCsHlKDvCKKouEfiU66.jpg',
                'name' => 'The Invitation',
            ],
            [
                'image' => 'https://image.tmdb.org/t/p/w185/rLrfEvJhQP3SubJR9SYwHWE9tlZ.jpg',
                'name' => 'Vesper',
            ],
            [
                'image' => 'https://image.tmdb.org/t/p/w185/hiaeZKzwsk4y4atFhmncO5KRxeT.jpg',
                'name' => 'Smile',
            ],
            [
                'image' => 'https://image.tmdb.org/t/p/w185/4gXt7RoeV4J4U08C5nGxkUnvBK7.jpg',
                'name' => 'The Batman',
            ],
            [
                'image' => 'https://image.tmdb.org/t/p/w185/jOgbnL5FB30pprEjZaY1E1iPtPM.jpg',
                'name' => 'Blonde',
            ],
            [
                'image' => 'https://image.tmdb.org/t/p/w185/zhLKlUaF1SEpO58ppHIAyENkwgw.jpg',
                'name' => 'The Northman',
            ],
            [
                'image' => 'https://image.tmdb.org/t/p/w185/AcKVlWaNVVVFQwro3nLXqPljcYA.jpg',
                'name' => 'Nope',
            ],
        ];

        return response()->json([
            'error' => false,
            'data' => $watchedMovies
        ]);
    }

    public function getRecommendedMovies($userId) {
        // to filter out the movies where user has watched but no model, so use hardcoded instead
        // $recommmendedMovies = Movies::whereDoesntHave('watched_movies', function ($query) {
        //     $query->where('user_id', $userId);
        // });

        $recommmendedMovies = [
            [
                'image' => 'https://image.tmdb.org/t/p/w185/v28T5F1IygM8vXWZIycfNEm3xcL.jpg',
                'name' => 'Fall',
            ],
            [
                'image' => 'https://image.tmdb.org/t/p/w185/yph9PAbmjYPvyvbeZvdYIhCZHEu.jpg',
                'name' => 'Bandit',
            ],
            [
                'image' => 'https://image.tmdb.org/t/p/w185/z63D1Y8udrrFOhLFCT9YElcTr0w.jpg',
                'name' => 'Bad Sisters',
            ],
            [
                'image' => 'https://image.tmdb.org/t/p/w185/7jSWOc6jWSw5hZ78HB8Hw3pJxuk.jpg',
                'name' => 'Cyberpunk: Edgerunners',
            ],
            [
                'image' => 'https://image.tmdb.org/t/p/w185/6M7RMK2SokM82UNTeJOAOrdQpKM.jpg',
                'name' => 'Andor',
            ],
            [
                'image' => 'https://image.tmdb.org/t/p/w185/bqGvWXI2kV99ejEh25AUiAHGSk9.jpg',
                'name' => 'Interview with the Vampire',
            ],
            [
                'image' => 'https://image.tmdb.org/t/p/w185/z2yahl2uefxDCl0nogcRBstwruJ.jpg',
                'name' => 'House of the Dragon',
            ],
        ];

        return response()->json([
            'error' => false,
            'data' => $recommmendedMovies
        ]);
    }
}
