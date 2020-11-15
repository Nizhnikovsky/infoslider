<?php

namespace App\Repositories;

use App\Models\Post;


class PostRepository extends AbstractRepository
{
    const POST_COUNT = 6;

    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

    public function getPostBySlug(string $slug)
    {
        return Post::where("slug",$slug)->first();
    }

    public function getRandomPosts()
    {
        $posts = Post::all();
        $postsCount = $posts->count();
        $count = ($postsCount > self::POST_COUNT)? self::POST_COUNT : $postsCount;

        return $posts->random($count);
    }

    public function getPostsCount($tagId = null)
    {
        $query = Post::whereIn("status", ["PUBLISHED"]);
        if ($tagId){
            $query = $query->where("category_id", "=", $tagId);
        }
        return $query->count();
    }

    public function getPostByTag(int $tagId)
    {
        return Post::where("category_id", $tagId)->get();
    }

    public function getAll()
    {
       return Post::with('category')->get();
    }
}
