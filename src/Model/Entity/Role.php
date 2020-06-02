<?php
declare(strict_types=1);

namespace CakephpIdentity\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Text;

/**
 * Role Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $sid
 *
 * @property \CakephpIdentity\Model\Entity\User[] $users
 */
class Role extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'description' => true,
        'sid' => true,
        'users' => true,
    ];


    public function initializeSid()
    {
        $this->sid = Text::uuid();
    }

    /**
     * Generate SID
     * @param string $sid
     * @return string
     */
    /*protected function _setSid(string $sid = null) : string
    {
        dd('test');
        return Text::uuid();
    }*/
}
