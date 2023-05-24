<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class BookFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const USER_ID = 'user_id';
    public const GENRE_ID = 'genre_id';


    protected function getCallbacks(): array
    {
        return [
            self::USER_ID => [$this, 'user_id'],
            self::GENRE_ID=>[$this,'genre_id'],
            self::NAME=>[$this,'name']
        ];
    }

    public function user_id(Builder $builder, $value)
    {
     $builder->where('user_id',$value);
    }

    public function genre_id(Builder $builder, $value)
    {
        $builder->where('genre_id',$value);
    }
    public function name(Builder $builder, $value)
    {
        $builder->where('name',$value);
    }
}
