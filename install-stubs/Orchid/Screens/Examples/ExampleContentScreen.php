<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Examples;

use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Contents\Compendium;
use Orchid\Screen\Presenters\Card;
use Orchid\Screen\Screen;

class ExampleContentScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Content templates';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Ready-made templates for displaying your data';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'card'       => new class implements Card
            {

                /**
                 * @return string
                 */
                public function title(): string
                {
                    return 'Title of a longer featured blog post';
                }

                /**
                 * @return string
                 */
                public function descriptions(): string
                {
                    return 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a
                  little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This
                  content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional
                  content. This content is a little bit longer.';
                }

                /**
                 * @return string
                 */
                public function image(): ?string
                {
                    return 'https://picsum.photos/600/300';
                }

                /**
                 * @return mixed
                 */
                public function status()
                {
                    return 'success';
                }

                /**
                 * @return mixed
                 */
                public function users()
                {
                    return [];
                }
            },
            'compendium' => [
                'В прошлом месяце'  => '30 0000 руб',
                'Проектов в работе' => 14,
                'Просрочек'         => '1',
                'Клиентов'          => '10',
                'Сотрудников'       => '21',
            ],
        ];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [];
    }

    /**
     * Views.
     *
     * @return array
     * @throws \Throwable
     *
     */
    public function layout(): array
    {
        return [
            new \Orchid\Screen\Contents\HorizontalCard('card', [
                Button::make('Example Button')
                    ->method('example')
                    ->icon('icon-bag'),
                Button::make('Example Button')
                    ->method('example')
                    ->icon('icon-bag'),
            ]),

            new Compendium('compendium'),
        ];
    }
}
