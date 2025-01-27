<?php

declare(strict_types=1);

namespace Orchid\Press\Http\Layouts\Category;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CategoryListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'category';

    /**
     * HTTP data filters.
     *
     * @return array
     */
    public function filters(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            TD::make('name', __('Name'))
                ->render(function ($category) {
                    return '<a href="'.route('platform.systems.category.edit',
                            $category->id).'">'.$category->delimiter.' '.$category->term->GetContent('name').'</a>';
                }),
            TD::make('slug', __('Slug'))
                ->render(function ($category) {
                    return $category->term->slug;
                }),
            TD::make('created_at', __('Created'))
                ->render(function ($category) {
                    return $category->term->created_at;
                }),
        ];
    }
}
