<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionGroup extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "question_groups";

    protected $fillable = [
		'title',
		'priority',
		'examination_id'
	];

    public function examination(): BelongsTo
    {
        return $this->belongsTo(Examination::class,'examination_id','id');
    }

    public function question(): HasMany
    {
        return $this->hasMany(Question::class,'question_group_id','id');
    }

    public function user_examinations(): HasMany
    {
        return $this->hasMany(UserTakenExamination::class,'question_group_id','id');
    }
}
