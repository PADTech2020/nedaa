<?php

namespace Theme\NedaaPost\Http\Controllers;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Theme\Http\Controllers\PublicController;
use Botble\Blog\Models\Post;
use Botble\Researchers\Models\Researchers;
use Theme;
use SeoHelper;


class NedaaPostController extends PublicController
{
    /**
     * {@inheritDoc}
     */
    public function getIndex(BaseHttpResponse $response)
    {
        return parent::getIndex($response);
    }

    /**
     * {@inheritDoc}
     */
    public function getView(BaseHttpResponse $response, $key = null)
    {
        return parent::getView($response, $key);
    }

    /**
     * {@inheritDoc}
     */
    public function getSiteMap()
    {
        return parent::getSiteMap();
    }
    public function home2()
    {
        return \Theme::layout('home2')->scope('home2')->render();
    }
    public function contact()
    {
        SeoHelper::setTitle('تواصل معنا في نداء بوست - منصة إخبارية سياسية ومنوعة')
                    ->setDescription('موقع نداء بوست الإلكتروني منصة إخبارية سياسية ومنوعة، أسسته ثلة من الصحفيين السوريين، يعنى بالشؤون العربية الساخنة والأحداث الدولية الكبرى من منظور القارئ العربي وعلى ضوء اهتماماته الراهنة والمتجددة، مع اهتمام خاص بالقضية السورية.');
        return \Theme::layout('home2')->scope('contact')->render();
    }

    public function postsForResearchers($id)
    {
        // Posts of reseaarcher.
        $posts = Post::join("language_meta", function ($join) {
            $join->on("language_meta.reference_id", "=", "id")
                ->where(["language_meta.reference_type"=> 'Botble\Blog\Models\Post','language_meta.lang_meta_code'=>'ar']);
        })->where(['status' => BaseStatusEnum::PUBLISHED(), 'researcher_id' => $id])->paginate(8);

        // Researcher Details.
        $researcher = Researchers::find($id);

        if (!$researcher) {
            abort(404);
        }
            
        if(isset($researcher)){
        SeoHelper::setTitle('الكاتب '.$researcher->name)
                    ->setDescription($researcher->summary);
        }

        return Theme::scope('posts_researchers', ['posts' => $posts, 'researcher' => $researcher])->render();
    }

    public function aboutPage()
    {
        SeoHelper::setTitle('نحن في - نداء بوست - منصة إخبارية سياسية ومنوعة')
                    ->setDescription('موقع نداء بوست الإلكتروني منصة إخبارية سياسية ومنوعة، أسسته ثلة من الصحفيين السوريين، يعنى بالشؤون العربية الساخنة والأحداث الدولية الكبرى من منظور القارئ العربي وعلى ضوء اهتماماته الراهنة والمتجددة، مع اهتمام خاص بالقضية السورية.');

        return Theme::scope('about')->render();
    }

    public function researcherPage($id)
    {
        // Posts of reseaarcher.
        $posts = Post::join("language_meta", function ($join) {
            $join->on("language_meta.reference_id", "=", "id")
                ->where(["language_meta.reference_type"=> 'Botble\Blog\Models\Post','language_meta.lang_meta_code'=>'ar']);
        })->where(['status' => BaseStatusEnum::PUBLISHED(), 'researcher_id' => $id])->paginate(8);

        $researcher = Researchers::find($id);

        if (!$researcher) {
            abort(404);
        }
                
        if(isset($researcher)){
            SeoHelper::setTitle($researcher->name)
                        ->setDescription($researcher->summary);
        }

        return Theme::scope('researcher_profile', ['posts' => $posts, 'researcher' => $researcher])->render();
    }


}
