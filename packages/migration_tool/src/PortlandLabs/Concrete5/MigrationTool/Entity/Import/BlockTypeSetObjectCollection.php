<?php

namespace PortlandLabs\Concrete5\MigrationTool\Entity\Import;

use Doctrine\Common\Collections\ArrayCollection;
use PortlandLabs\Concrete5\MigrationTool\Batch\Formatter\BlockTypeSet\TreeJsonFormatter;
use PortlandLabs\Concrete5\MigrationTool\Batch\Validator\BlockTypeSet\Validator;
use PortlandLabs\Concrete5\MigrationTool\Batch\Formatter\ObjectCollection\AttributeTypeFormatter;
use PortlandLabs\Concrete5\MigrationTool\Batch\Formatter\ObjectCollection\BlockTypeFormatter;
use PortlandLabs\Concrete5\MigrationTool\Batch\Formatter\ObjectCollection\BlockTypeSetFormatter;
use PortlandLabs\Concrete5\MigrationTool\Batch\Formatter\ObjectCollection\PageTemplateFormatter;
use PortlandLabs\Concrete5\MigrationTool\Entity\Import\Batch;

/**
 * @Entity
 */
class BlockTypeSetObjectCollection extends ObjectCollection
{

    /**
     * @OneToMany(targetEntity="BlockTypeSet", mappedBy="collection", cascade={"persist", "remove"})
     **/
    public $sets;

    public function __construct()
    {
        $this->sets = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getSets()
    {
        return $this->sets;
    }

    public function getFormatter()
    {
        return new BlockTypeSetFormatter($this);
    }

    public function getType()
    {
        return 'block_type_set';
    }

    public function hasRecords()
    {
        return count($this->getSets());
    }

    public function getRecords()
    {
        return $this->getSets();
    }

    public function getTreeFormatter()
    {
        return new TreeJsonFormatter($this);
    }

    public function getRecordValidator(Batch $batch)
    {
        return new Validator($batch);
    }





}