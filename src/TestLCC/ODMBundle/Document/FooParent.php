<?php
namespace TestLCC\ODMBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 * @MongoDB\InheritanceType("SINGLE_COLLECTION")
 * @MongoDB\DiscriminatorField(fieldName="type")
 * @MongoDB\DiscriminatorMap({  "FooChildOne"="TestLCC\ODMBundle\Document\FooChildOne",
 *                              "FooChildTwo"="TestLCC\ODMBundle\Document\FooChildTwo" })
 */
abstract class FooParent 
{
    /** @MongoDB\Id */
    protected $id;

    /** @MongoDB\String */
    protected $bar;

    protected $inc;

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setBar($bar)
    {
        $this->bar = $bar;

        return $this;
    }

    public function getBar()
    {
        return $this->bar;
    }

    public function setInc($inc)
    {
        $this->inc = $inc;

        return $this;
    }

    public function getInc()
    {
        return $this->inc;
    }

    /** @MongoDB\PostPersist  */
    public function doStuffOnPostPersist()
    {
        $this->inc = $this->getInc() +1;
    }
}