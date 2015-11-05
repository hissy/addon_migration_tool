<?php

namespace PortlandLabs\Concrete5\MigrationTool\Entity\Import\Permission;

use PortlandLabs\Concrete5\MigrationTool\Batch\Formatter\PermissionKey\GroupAccessEntityFormatter;
use PortlandLabs\Concrete5\MigrationTool\Batch\Validator\PermissionKey\GroupAccessEntityValidator;
use PortlandLabs\Concrete5\MigrationTool\Publisher\PublishableInterface;
use PortlandLabs\Concrete5\MigrationTool\Publisher\Validator\PermissionAccessEntityTypeValidator;
use PortlandLabs\Concrete5\MigrationTool\Entity\Import\Batch;

/**
 * @Entity
 * @Table(name="MigrationImportGroupPermissionAccessEntities")
 */
class GroupAccessEntity extends AccessEntity
{

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string")
     */
    protected $group_name;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getGroupName()
    {
        return $this->group_name;
    }

    /**
     * @param mixed $group_name
     */
    public function setGroupName($group_name)
    {
        $this->group_name = $group_name;
    }


    public function getFormatter()
    {
        return new GroupAccessEntityFormatter($this);
    }

    public function getRecordValidator(Batch $batch)
    {
        return new GroupAccessEntityValidator($batch);
    }


}