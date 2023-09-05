<?php

declare(strict_types=1);

namespace Modules\Job\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait FrontendSortable
{
    public function scopeSortableBy(Builder $builder, array $sortableColumns, array $defaultSort = ['name' => 'asc']): Builder
    {
        $request = request();
        $sorted = $request->has('sort_by') && in_array($request->input('sort_by'), $sortableColumns);

        /**
         * @var string $sortByRequest
         */
        $sortByRequest = $request->input('sort_by');
        /**
         * @var string $sortDirectionRequest
         */
        $sortDirectionRequest = $request->input('sort_direction', 'asc');

        return $builder->when($sorted, static function (Builder $builder) use ($sortByRequest, $sortDirectionRequest) : void {
            $builder->orderBy(
                (string) $sortByRequest,
                ('desc' == (string) $sortDirectionRequest) ? 'desc' : 'asc'
            );
        }, static function (Builder $builder) use ($defaultSort) : void {
            foreach ($defaultSort as $key => $direction) {
                $builder->orderBy($key, $direction);
            }
        });
    }
}
