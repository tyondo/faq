<?php

namespace Tyondo\Faq\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(config('tfaq.namespace').'User');
    }
}
