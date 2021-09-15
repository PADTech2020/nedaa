<?php

namespace Botble\Offers\Listeners;


use Botble\Offers\Models\Offers;
use SiteMapManager;


class RenderingSiteMapListener
{


    /**
     * RenderingSiteMapListener constructor.
     * @param PostInterface $postRepository
     * @param CategoryInterface $categoryRepository
     * @param TagInterface $tagRepository
     */
    public function __construct(

    ) {

    }

    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle()
    {





        $Offers = Offers::all();

        foreach ($Offers as $Offer) {
            SiteMapManager::add('/offer/'.$Offer->id.'/'.$Offer->slug, $Offer->updated_at, '0.3', 'weekly');
        }
    }
}
