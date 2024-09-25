<?php

namespace App\Services;

use App\Models\Slider;

class SliderService extends Service
{
    public function __construct(Slider $model)
    {
        parent::__construct($model);
    }
}
