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

    /** @MongoDB\PostPersist  */
    public function doStuffOnPostPersist()
    {
        print_r(['CALLED HERE']);
    }
}