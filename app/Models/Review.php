<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Review extends Eloquent
{
    protected $collection = "review";
}