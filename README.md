ODM LifeCycleCallbacks bugs : called twice
========================


1) ODM : PostPersist
----------------------------------

phpunit -c app src/TestLCC/ODMBundle/Tests/LifeCycleTest.php

There was 1 failure:

1) TestLCC\ODMBundle\Tests\LifeCycleTest::testInsert
Failed asserting that 2 matches expected 1.



2) ORM : PostPersist
-------------------------------------

phpunit -c app src/TestLCC/ORMBundle/Tests/LifeCycleTest.php

OK (1 test, 2 assertions)
