<?php

declare (strict_types=1);
namespace App\Model\Demo;

use Hyperf\DbConnection\Model\Model;
/**
 * @property int $id 
 * @property string $name 
 * @property int $gender 
 * @property int $snow_flake_id 
 * @property int $create_at 
 * @property int $update_at 
 */
class User extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'demo';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'gender' => 'integer', 'snow_flake_id' => 'integer', 'create_at' => 'integer', 'update_at' => 'integer'];

    protected $dateFormat = 'U';
}