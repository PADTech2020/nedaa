<?php

namespace Botble\AutoReloadPosts\Http\Controllers\API;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Blog\Http\Resources\PostResource;
use Botble\Blog\Http\Resources\ListPostResource;
use Botble\Blog\Repositories\Interfaces\PostInterface;
use Botble\Blog\Supports\FilterPost;
use Botble\Slug\Repositories\Interfaces\SlugInterface;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Botble\Blog\Models\Post;

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
    public function __construct(PostInterface $postRepository, SlugInterface $slugRepository)
    {
        $this->postRepository = $postRepository;
        $this->slugRepository = $slugRepository;
    }

    public function ajaxFeaturedPosts($request, array $with = [])
    {
        $limit=1;
        $offset=$request->input('offset');
        return Post::where([
            'posts.status' => BaseStatusEnum::PUBLISHED,
            'posts.is_featured' => 1,
        ])->whereDate('created_at', '<=', Carbon::now())
            ->limit($limit)
            ->with(array_merge(['slugable'], $with))
            ->orderBy('posts.created_at', 'desc')->get();

    }


}
