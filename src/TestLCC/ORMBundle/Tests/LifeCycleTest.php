<?php
namespace TestLCC\ORMBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use TestLCC\ORMBundle\Entity\FooChildOne;

class LifeCycleTest extends WebTestCase
{
    protected static $kernel;
    protected static $container;
    protected static $em;

    public static function setUpBeforeClass()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();

        self::$container = self::$kernel->getContainer();
        self::$em        = self::$container->get('doctrine')->getManager();;
    }

    public function testInsert()
    {
        try {
            $childOne = new FooChildOne();
            $childOne->setBar('barChildOne');
        
            self::$em->persist($childOne);
            self::$em->flush(); 
        } catch (\Exception $e) {
            $this->fail(sprintf('Unable to insert FooChildOne :: %s', $e->getMessage()));
        }

        $this->assertTrue(true, 'Insert FooChildOne : ok ');
    }

    public function testInsertUpdate()
    {

    }
}