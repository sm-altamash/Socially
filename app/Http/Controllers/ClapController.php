<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ClapController extends Controller
{
    public function clap(Post $post)
    {
        $hasClapped = auth()->user()->hasClapped($post);

        if ($hasClapped) {
            $post->claps()->where('user_id', auth()->id())->delete();
        } else {
            $post->claps()->create([
                'user_id' => auth()->id(),
            ]);
        }

        return response()->json([
            'clapsCount' => $post->claps()->count(),
        ]);
    }
}
