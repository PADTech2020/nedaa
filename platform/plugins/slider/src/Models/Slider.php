<?php

namespace Botble\Slider\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use Botble\Blog\Models\Category;
use Botble\Researchers\Models\Researchers;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Slider extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sliders';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
        'content',
        'slug',
        'category',
        'researcher_id',
        'order_num',
        'button_1',
//        'button_2',
        'button_1_url',
//        'button_2_url',
        'status',
    ];


    public function researcher()
    {
        return Researchers::where(['id' => $this->researcher_id])->first();
    }

    public function categoryPost()
    {
        if ($this->id != null)
            return Category::where(['id' => $this->category])->first();
    }

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    public static function getSlider($slug)
    {
        return Slider::where(['status' => 'published', 'slug' => $slug])->orderBy('order_num', 'ASC')->get();
    }
}
