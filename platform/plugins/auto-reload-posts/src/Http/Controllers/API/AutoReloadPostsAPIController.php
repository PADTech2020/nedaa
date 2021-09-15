<?php

namespace Botble\AutoReloadPosts\Http\Controllers\API;

use Botble\Base\Enums\BaseStatusEnum;
use Carbon\Carbon;
use Botble\Slug\Repositories\Interfaces\SlugInterface;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Botble\Blog\Models\Post;
use Illuminate\Support\Facades\Response;

class AutoReloadPostsAPIController extends Controller
{

    /**
     * @var PostInterface
     */
    protected $postRepository;

    /**
     * @var SlugInterface
     */
    protected $slugRepository;

    /**
     * AuthenticationController constructor.
     *
     * @param PostInterface $postRepository
     */
    public function __construct()
    {

    }

    public function ajaxFeaturedPosts($request, array $with = [])
    {
        $limit = 1;
        $offset = isset($_POST['offset'])?$_POST['offset']:1;
        $lang = isset($_POST['lang']) ? $_POST['lang'] : 'ar';
        $posts = Post::select('*')
            ->join('language_meta', function ($join) {
                $join->on('language_meta.reference_id', '=', 'posts.id');

            })
            ->where([
                'language_meta.reference_type' => Post::class,
                'language_meta.lang_meta_code' => $lang,
                'posts.status' => BaseStatusEnum::PUBLISHED,

            ])
            ->whereBetween('created_at', [Carbon::now()->subWeek()->format("Y-m-d H:i:s"), Carbon::now()])
            ->with('slugable')
            ->orderBy('posts.views', 'desc')
            ->limit($limit)->offset($offset)
            ->get();

        $view =view('plugins/auto-reload-posts::post', ['post' => $posts[0]])->render();
        return Response::json(['status' => 200, 'view' => $view]);
        //return $post[0];
    }


}
