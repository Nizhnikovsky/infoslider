<?php


namespace App\Http\Controllers;


use App\Models\AboutMe;
use App\Models\InstagramFeed;
use App\Models\Review;
use App\Models\Speciality;
use App\Repositories\CategoryRepository;
use App\Repositories\ContactsRepository;
use App\Repositories\PortfolioRepository;
use App\Repositories\PostRepository;
use App\Repositories\SliderMediaRepository;
use App\Repositories\SliderVideoRepository;
use App\Transformers\PortfolioWithCategoriesTransformer;
use Illuminate\Support\Facades\Storage;

class MainPageController extends Controller {

    private $sliderMediaRepository;

    private $portfolioRepository;

    private $categoryRepository;

    private $postRepository;

    private $sliderVideoRepository;

    public function __construct(
        SliderMediaRepository $mediaTypeRepository,
        PortfolioRepository $portfolioRepository,
        CategoryRepository $categoryRepository,
        PostRepository $postRepository,
        SliderVideoRepository $sliderVideoRepository
    )
    {
        $this->sliderVideoRepository = $sliderVideoRepository;
        $this->sliderMediaRepository = $mediaTypeRepository;
        $this->portfolioRepository = $portfolioRepository;
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $sliderImages = $this->sliderMediaRepository->all();
        $sliderVideo = $this->sliderVideoRepository->all();
//        PortfolioWithCategoriesTransformer::transformPortfolios($this->portfolioRepository->getAll());
        $portfolios = $this->portfolioRepository->getAll();
        $specialties = Speciality::all();
        $posts = $this->postRepository->getRandomPosts();
        $reviews = Review::all();
        $instagramFeed = InstagramFeed::all()->first();
        $aboutMe = AboutMe::all()->first();

        return view('main',
            [
                "sliderImages" => $sliderImages,
                "sliderVideo" => $sliderVideo,
                "portfolios" => $portfolios,
                "specialties" => $specialties,
                "posts" => $posts,
                "reviews" => $reviews,
                "insta_feed" => $instagramFeed,
                "about_me" => $aboutMe
            ]);
    }
}
