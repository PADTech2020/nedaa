<?php

namespace Botble\Blog\Models;

use Botble\ACL\Models\User;
use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Researchers\Models\Researchers;
use Botble\Revision\RevisionableTrait;
use Botble\Slug\Traits\SlugTrait;
use Botble\Base\Models\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Post extends BaseModel
{
    use RevisionableTrait;
    use SlugTrait;
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * @var mixed
     */
    protected $revisionEnabled = true;

    /**
     * @var mixed
     */
    protected $revisionCleanup = true;

    /**
     * @var int
     */
    protected $historyLimit = 20;

    /**
     * @var array
     */
    protected $dontKeepRevisionOf = [
        'content',
        'views',
    ];

    /**
     * The date fields for the model.clear
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'content',
        'image',
        'images',
        'pdf_file',
        'is_featured',
        'is_popular',
        'breaking_news',
        'trending',
        'is_slider',
        'news_tape',
        'slider_order',
        'format_type',
        'status',
        'youtube_link',
        'author_id',
        'researcher_id',
        'author_type',
        'published_at',
        'caption',
        'short_link',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    /**
     * @deprecated
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    /**
     * @deprecated
     * @return BelongsTo
     */
    public function researcher(): BelongsTo
    {
        return $this->belongsTo(Researchers::class);
    }

    /**
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }

    /**
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'post_categories');
    }

    /**
     * @return MorphTo
     */
    public function author(): MorphTo
    {
        return $this->morphTo();
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function (Post $post) {
            $post->categories()->detach();
            $post->tags()->detach();
        });
    }

    public static function getPopularPosts($limit = 10, array $with = [])
    {
        return Post::where([
            'posts.status' => BaseStatusEnum::PUBLISHED,
//            'posts.is_popular' => 1,
        ])->whereDate('created_at', '<=', Carbon::now())
            ->limit($limit)
            ->with(array_merge(['slugable'], $with))
            ->orderBy('posts.views', 'desc')
            ->get();
    }

    public static function getLatestNews($limit = 5, array $with = [])
    {
        return Post::where([
            'posts.status' => BaseStatusEnum::PUBLISHED,
//            'posts.breaking_news' => 1,

        ])->whereDate('created_at', '<=', Carbon::now())
            ->limit($limit)
            ->with(array_merge(['slugable'], $with))
            ->orderBy('posts.id', 'desc')->get();
    }

    public static function getTrending($limit = 10, array $with = [])
    {
//        return Services::select('*')
//            ->join('language_meta', function ($join) {
//                $join->on('language_meta.reference_id', '=', 'services.id');
//            })
//            ->where([
//                'language_meta.reference_type' => Services::class,
//                'language_meta.lang_meta_code' => (app()->getLocale() == 'en') ? 'en_US' : 'ar',
//                'services.status' => 'published'])->orderBy('services.created_at', 'DESC')->get();
//

        return Post::select('*')
            ->join('language_meta', function ($join) {
                $join->on('language_meta.reference_id', '=', 'posts.id');

            })->where([
                'language_meta.reference_type' => Post::class,
                'language_meta.lang_meta_code' => (app()->getLocale() == 'en') ? 'en_US' : 'ar',
                'posts.status' => BaseStatusEnum::PUBLISHED,
                'posts.trending' => 1,
            ])->whereDate('created_at', '<=', Carbon::now())
            ->limit($limit)
            ->with(array_merge(['slugable'], $with))
            ->orderBy('posts.created_at', 'desc')->get();
    }

    public static function getPostsByCategory($cat_id, $limit = 10, $is_featured = 0, array $with = [])
    {
        //$cat_id = \Botble\Blog\Models\Category::getCategoryByLang($cat_id);
        $where = [];
        $where['posts.status'] = BaseStatusEnum::PUBLISHED;

        // $where[ 'posts.is_featured']=$is_featured;
        return Post::whereHas('categories', function (Builder $query) use ($cat_id) {
            $query->where('category_id', $cat_id);
        })->

        where($where)
            ->whereDate('created_at', '<=', Carbon::now())
            ->limit($limit)
            ->with(array_merge(['slugable'], $with))
            ->orderBy('posts.created_at', 'desc')->get();
    }

    public static function getAllPostsByCategory($cat_id, $limit = 10, array $with = [])
    {
        $cat_id = \Botble\Blog\Models\Category::getCategoryByLang($cat_id);
        $where = [
            'language_meta.reference_type' => Post::class,
            'language_meta.lang_meta_code' => (app()->getLocale() == 'en') ? 'en_US' : 'ar',
            'posts.status' => BaseStatusEnum::PUBLISHED,

        ];

        $where['posts.status'] = BaseStatusEnum::PUBLISHED;

        return Post::select('*')
            ->join('language_meta', function ($join) {
                $join->on('language_meta.reference_id', '=', 'posts.id');

            })
            ->
            whereHas('categories', function (Builder $query) use ($cat_id) {
                $query->where('category_id', $cat_id);
            })->

            where($where)
            ->whereDate('created_at', '<=', Carbon::now())
            ->limit($limit)
            ->with(array_merge(['slugable'], $with))
            ->orderBy('posts.created_at', 'desc')->get();
    }

    public static function getSlider($limit = 8, array $with = [])
    {
        $lang = (app()->getLocale() == 'en') ? 'en_US' : 'ar';
        return $data = Post::select('*')
//            ->join('language_meta', function ($join) {
//                $join->on('language_meta.reference_id', '=', 'posts.id');
//
//            })
//            ->where([
//                'language_meta.reference_type' => Post::class,
//                'language_meta.lang_meta_code' => (app()->getLocale() == 'en') ? 'en_US' : 'ar',
//                'posts.status' => BaseStatusEnum::PUBLISHED,
//
//            ])
            ->
            whereRaw('id IN (select MAX(id) FROM posts
             inner join `language_meta` on `language_meta`.`reference_id` = `posts`.`id`
             where is_slider = 1 and language_meta.reference_type like "%Post%"' .
                ' and language_meta.lang_meta_code="' . $lang . '" and posts.status="' . BaseStatusEnum::PUBLISHED . '"
        GROUP BY posts.slider_order)'
            )
            ->with(array_merge(['slugable'], $with))
           ->orderBy('posts.slider_order', 'asc')
            ->limit($limit)->get();
    }

    public static function getNewsTap($limit = 8, array $with = [])
    {
        return
            Post::select('*')
                ->join('language_meta', function ($join) {
                    $join->on('language_meta.reference_id', '=', 'posts.id');

                })
                ->where([
                    'language_meta.reference_type' => Post::class,
                    'language_meta.lang_meta_code' => (app()->getLocale() == 'en') ? 'en_US' : 'ar',
                    'posts.news_tape' => 1,
                    'posts.status' => BaseStatusEnum::PUBLISHED,

                ])
                ->whereDate('created_at', '<=', Carbon::now())
                ->limit($limit)
                ->with(array_merge(['slugable'], $with))
                ->orderBy('posts.created_at', 'desc')->get();
    }

    public static function getBreakingNews($limit = 10, array $with = [])
    {
        return Post::where([
            'posts.status' => BaseStatusEnum::PUBLISHED,
            'posts.breaking_news' => 1,

        ])->where('created_at', '>', Carbon::now()->subMinutes(10)->toDateTimeString())
            ->limit($limit)
            ->with(array_merge(['slugable'], $with))
            ->orderBy('posts.created_at', 'desc')->get();
    }

    public static function getPostShortLink($short_link)
    {
        return Post::where([
            'posts.status' => BaseStatusEnum::PUBLISHED,
            'posts.short_link' => $short_link,

        ])->where('id', '>', 0)
            ->limit(1)
            ->with(array_merge(['slugable'], []))
            ->orderBy('posts.created_at', 'desc')->first();
    }

}
