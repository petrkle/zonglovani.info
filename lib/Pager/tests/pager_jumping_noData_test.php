<?php
// $Id: pager_jumping_noData_test.php,v 1.2 2004/04/29 20:18:10 quipo Exp $

require_once 'simple_include.php';
require_once 'pager_include.php';

class TestOfPagerJumpingNoData extends UnitTestCase
{
    public $pager;
    public function TestOfPagerJumpingNoData($name = 'Test of Pager_Jumping - no data')
    {
        $this->UnitTestCase($name);
    }
    public function setUp()
    {
        $options = array(
            'totalItems' => 0,
            'perPage' => 2,
            'mode' => 'Jumping',
        );
        $this->pager = Pager::factory($options);
    }
    public function tearDown()
    {
        unset($this->pager);
    }
    public function testOffsetByPageId()
    {
        $this->assertEqual(array(1, 0), $this->pager->getOffsetByPageId());
    }
    public function testPageIdByOffset()
    {
        $this->assertEqual(false, $this->pager->getPageIdByOffset(0));
    }
    public function testPageIdByOffset2()
    {
        $this->assertEqual(1, $this->pager->getPageIdByOffset(1));
    }
    public function testPageIdByOffset3()
    {
        $this->assertEqual(1, $this->pager->getPageIdByOffset(2));
    }
}
