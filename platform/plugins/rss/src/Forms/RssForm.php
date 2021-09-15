<?php

namespace Botble\Rss\Forms;

use Botble\Base\Forms\Fields\TagField;
use Botble\Base\Forms\FormAbstract;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Member\Http\Requests\PostRequest;
use Botble\Rss\Http\Requests\RssRequest;
use Botble\Rss\Models\Rss;

class RssForm extends FormAbstract
{

    /**
     * {@inheritDoc}
     */
    public function buildForm()
    {






        $this
            ->setupModel(new Rss)
            ->setValidatorClass(RssRequest::class)
            ->withCustomFields()

            ->add('name', 'text', [
                'label' => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])

            ->add('description', 'textarea', [
                'label' => trans('core/base::forms.description'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'rows' => 4,
                    'placeholder' => trans('core/base::forms.description_placeholder'),
                    'data-counter' => 400,
                ],
            ])

            ->add('content', 'editor', [
                'label' => trans('core/base::forms.content'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'rows' => 4,
                    'placeholder' => trans('core/base::forms.description_placeholder'),
                    'with-short-code' => true,
                ],
            ])
            ->add('status', 'customSelect', [
                'label' => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'choices' => BaseStatusEnum::labels(),
            ])

//            ->add('categories[]', 'categoryMulti', [
//                'label' => trans('plugins/blog::posts.form.categories'),
//                'label_attr' => ['class' => 'control-label required'],
//                'choices' => get_categories_with_children(),
//                'value' => old('categories', $selectedCategories),
//            ])
            ->add('published_at', 'text', [
                'label' => __('Published At'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'class' => 'form-control datepicker',
                ],
                'default_value' => now(config('app.timezone'))->format('m/d/Y'),
            ])


            ->add('image', 'mediaImage', [
                'label' => trans('core/base::forms.image'),
                'label_attr' => ['class' => 'control-label'],
            ])

            ->setBreakFieldPoint('status');
    }
}
