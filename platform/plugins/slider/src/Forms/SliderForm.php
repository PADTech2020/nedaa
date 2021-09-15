<?php

namespace Botble\Slider\Forms;

use Botble\Base\Forms\FormAbstract;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Blog\Repositories\Interfaces\CategoryInterface;
use Botble\Researchers\Models\Researchers;
use Botble\Slider\Http\Requests\SliderRequest;
use Botble\Slider\Models\Slider;

class SliderForm extends FormAbstract
{

    /**
     * {@inheritDoc}
     */
    public function buildForm()
    {
        $researchers = Researchers::getALlResearchers();
        $categories = \Botble\Blog\Models\Category::where(['status'=>'published'])->pluck('name', 'id')->toArray();
        $this
            ->setupModel(new Slider)
            ->setValidatorClass(SliderRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label'      => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            
            ->add('image', 'mediaImage', [
                'label' => __('Image'),
                'label_attr' => ['class' => 'control-label'],
            ])
            ->add('slug', 'text', [
                'label'      => trans('core/base::forms.slug'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'data-counter' => 120,
                ],
            ])
            ->add('content', 'editor', [
                'label' => __('content'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'with-short-code' => false, // if true, it will add a button to select shortcode
                    'without-buttons' => false, // if true, all buttons will be hidden
                ],
            ])
            ->add('button_1', 'text', [
                'label'      => trans('plugins/slider::slider.button_1'),
                'label_attr' => ['class' => 'control-label '],
                'attr'       => [
                    'data-counter' => 120,
                ],
            ])
            ->add('button_1_url', 'text', [
                'label'      => trans('plugins/slider::slider.button_1_url'),
                'label_attr' => ['class' => 'control-label '],
                'attr'       => [
                    'data-counter' => 120,
                ],
            ])
//            ->add('button_2', 'text', [
//                'label'      => trans('plugins/slider::slider.button_2'),
//                'label_attr' => ['class' => 'control-label '],
//                'attr'       => [
//
//                    'data-counter' => 120,
//                ],
//            ])
//            ->add('button_2_url', 'text', [
//                'label'      => trans('plugins/slider::slider.button_2_url'),
//                'label_attr' => ['class' => 'control-label '],
//                'attr'       => [
//                    'data-counter' => 120,
//                ],
//            ])
            ->add('order_num', 'number', [
                'label'      => trans('Order'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 10,
                ],
            ])


            ->add('status', 'customSelect', [
                'label'      => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label '],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => BaseStatusEnum::labels(),
            ])
            ->add('category', 'select', [
                'label' => __('Category'),
                'label_attr' => ['class' => 'control-label required'],
                'choices' => $categories,
            ])
            ->add('researcher_id', 'select', [
                'label' => __('Author'),
                'label_attr' => ['class' => 'control-label required'],
                'choices' => $researchers,
            ])
            ->setBreakFieldPoint('status');
    }
}
