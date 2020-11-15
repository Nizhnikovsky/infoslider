<?php

namespace App\Http\Controllers;

use App\Models\AboutMe;
use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;

class BlogController extends Controller
{
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index(Request $request)
    {
        $current_page = $request->get("page") ?? 1;

        $allPosts = $this->postRepository->getAll();
        $posts = $allPosts->forPage($current_page,3);
        $postsCount = $this->postRepository->getPostsCount();
        $tags = \App\Models\Category::has('posts')->get();

        $popularPosts = $allPosts->random(4);
        $about = AboutMe::all()->first();

        return view('blog',[
            "posts" => $posts,
            "tags" => $tags,
            "current_page" => $current_page,
            "pages" => ceil($postsCount/3),
            "popularPosts" => $popularPosts,
            "about" => $about
        ]);
    }

    public function getPostsByTag(Request $request)
    {
        $tagId = $request->route("tag_id");
        $current_page = $request->get("page") ?? 1;

        $posts = $this->postRepository->getPostByTag($tagId)->forPage($current_page,3);
        $postsCount = $this->postRepository->getPostsCount($tagId);

        $popularPosts = $this->postRepository->getAll()->random(4);
        $about = AboutMe::all()->first();

        $tags = \App\Models\Category::has('posts')->get();

        return view('blog',[
            "posts" => $posts,
            "tags" => $tags,
            "current_page" => $current_page,
            "pages" => ceil($postsCount/3),
            "popularPosts" => $popularPosts,
            "about" => $about
        ]);
    }

    public function getPost(Request $request)
    {
        $postSlug = $request->route("slug");
        $post = $this->postRepository->getPostBySlug($postSlug);

        $tags = \App\Models\Category::has('posts')->get();
        $popularPosts = $this->postRepository->getAll()->random(4);
        $about = AboutMe::all()->first();

        if (!$post){
            return redirect("/blog");
        }
        return view('blog_single',["post" => $post,"tags" => $tags,"popularPosts" => $popularPosts,
            "about" => $about]);
    }
}
