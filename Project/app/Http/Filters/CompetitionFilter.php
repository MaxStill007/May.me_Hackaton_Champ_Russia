<?php

namespace App\Http\Filters;
use Illuminate\Database\Eloquent\Builder;

class CompetitionFilter extends AbstractFilter
{
    // 'id' => 'nullable',
    // 'type' => 'nullable',
    // 'description' => 'nullable',
    // 'start_date' => 'nullable',
    // 'end_date' => 'nullable',
    // 'location' => 'nullable',
    // 'participants' => 'nullable'

    public const ID = 'id';
    public const TYPE = 'type';
    public const DESCRIPTION = 'description';
    public const START_DATE = 'start_date';
    public const END_DATE = 'end_date';
    public const LOCATION = 'location';
    public const PARTICIPANTS = 'participants';

    protected function getCallbacks(): array
    {
        return[
        //   self::GROUP_ID => [$this, 'groupId'],

        self::ID => [$this, 'id'],
        self::TYPE => [$this, 'type'],
        self::DESCRIPTION => [$this, 'description'],
        self::START_DATE => [$this, 'startDate'],
        self::END_DATE => [$this, 'endDate'],
        self::LOCATION => [$this, 'location'],
        self::PARTICIPANTS => [$this, 'participants'],
        ];
    }

    public function id(Builder $builder, $value){
        $builder->where('id', $value);
    }
    public function type(Builder $builder, $value){
        $builder->where('type', $value);
    }
    public function description(Builder $builder, $value){
        $builder->where('description', 'like', "%{$value}%");
    }
    public function startDate(Builder $builder, $value){
        $builder->where('start_date', '>', $value);
    }
    public function endDate(Builder $builder, $value){
        $builder->where('end_date', '<', $value);
    }
    public function location(Builder $builder, $value){
        $builder->where('location', $value);
    }
    public function participants(Builder $builder, $value){
        $builder->where('participants', $value);
    }

    // public function userId(Builder $builder, $value){
    //     $builder->whereHas('user', fn($query) => $query->where('name', $value));
    // }
}
