<?php
namespace TestLCC\ORMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({  "FooChildOne"="TestLCC\ORMBundle\Entity\FooChildOne",
 *                              "FooChildTwo"="TestLCC\ORMBundle\Entity\FooChildTwo" })
 * @ORM\HasLifecycleCallbacks
 */
abstract class FooParent 
{
    /** 
     * @ORM\Id 
     * @ORM\Column(type="integer") 
     * @ORM\GeneratedValue
     */
    protected $id;

    /** @ORM\Column(type="string") */
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

    /** @ORM\PostPersist  */
    public function doStuffOnPostPersist()
    {
        print_r(['CALLED HERE']);
    }
}