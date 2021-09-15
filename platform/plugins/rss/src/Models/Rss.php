<?php

namespace Botble\Rss\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

class Rss extends BaseModel
{
    use EnumCastable;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rss';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'content',
        'url',
        'src',
        'author',
        'imageUrl',
        'status',
        'published_at',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];
    public static function RemoveRSSRorLast2Days(){

    }
    public static function GetRSS($src){
        $source='sources='.$src.'&';
        $api_key='33344873d9e34bc08d821cd20ea26733';//'319ec775af774c948b374b0e3f53d745';
        $country = '';//'country=sy&';
        $q = 'q=syria&';
        $date = 'from=' . date('Y-m-d') . '&';
        $url = 'https://newsapi.org/v2/top-headlines?' . $source . '' . $country . '' . $date . 'apiKey='.$api_key;
        echo $url;
        $response = file_get_contents($url);
        $news = json_decode($response);
        echo '<pre>';
        print_r($news->articles);
        echo '</pre>';
        foreach ($news->articles as $article) {
            $model = Rss::where(['name' => $article->title])->first();
            if (!$model) {
                $rss = new Rss();
                $rss->name = $article->title;
                $rss->description = $article->description;
                $rss->url = $article->url;
                $rss->imageUrl = $article->urlToImage;
                //$rss->author = $article['author'];
                $rss->content = $article->content;
                $rss->src = $article->source->name;
                $rss->save();
            }

            //$rss
        }
    }
}
