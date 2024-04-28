<?php

declare(strict_types=1);

namespace Main\Support\Models;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property int $title
 * @property int $description
 * @property int $status
 * @property CarbonImmutable $created_at
 * @property CarbonImmutable $updated_at
 * @property-read StatusModel $statusModel
 */
final class TaskModel extends Model
{
    use HasFactory;

    public const OPEN_STATUS = 1;

    /**
     * @var string
     */
    protected $table = 'task';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'status',
    ];

    public function statusModel(): HasOne
    {
        return $this->hasOne(StatusModel::class, 'id', 'status');
    }
}
