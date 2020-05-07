<?php namespace Viauco\Realtime\Tests\Stubs\Models;

use Viauco\Realtime\Models\Model;

/**
 * Class     User
 *
 * @package  Viauco\Realtime\Tests\Models
 */
class User extends Model
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    protected $fillable = ['name', 'email'];

    protected $casts = [
        'id' => 'integer',
    ];
}
