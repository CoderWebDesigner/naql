<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Alaxos\Model\Entity\TimezonedTrait;

/**
 * LoginToken Entity.
 */
class LoginToken extends Entity
{
	use TimezonedTrait;

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'token'
    ];
}
