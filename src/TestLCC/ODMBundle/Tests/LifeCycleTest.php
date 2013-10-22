<?php
namespace TestLCC\ODMBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use TestLCC\ODMBundle\Document\FooChildOne;

class LifeCycleTest extends WebTestCase
{
    protected static $kernel;
    protected static $container;
    protected static $dm;

    public static function setUpBeforeClass()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();

        self::$container = self::$kernel->getContainer();
        self::$dm        = self::$container->get('doctrine_mongodb.odm.default_document_manager');
    }

    public function testInsert()
    {
        try {
            $childOne = new FooChildOne();
            $childOne->setBar('barChildOne');
        
            self::$dm->persist($childOne);
            self::$dm->flush(); 
        } catch (\Exception $e) {
            $this->fail(sprintf('Unable to insert FooChildOne :: %s', $e->getMessage()));
        }

        $this->assertTrue(true, 'Insert FooChildOne : ok ');
    }

    public function testInsertUpdate()
    {

    }
}