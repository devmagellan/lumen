<?php

namespace WGT\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class FirmUser extends Pivot
{
    /**
     * @var bool
     */
    public $incrementing = true;

}
