<?php
// $Id: pager_noData_test.php,v 1.2 2004/04/29 20:18:10 quipo Exp $

require_once 'simple_include.php';
require_once 'pager_include.php';

class TestOfPagerNoData extends UnitTestCase
{
    public $pager;
    public function TestOfPagerNoData($name = 'Test of Pager - no data')
    {
        $this->UnitTestCase($name);
    }
    public function setUp()
    {
        $options = array(
            'totalItems' => 0,
            'perPage' => 5,
            'mode' => 'Sliding',
        );
        $this->pager = Pager::factory($options);
    }
    public function tearDown()
    {
        unset($this->pager);
    }
    public function testCurrentPageID()
    {
        $this->assertEqual(0, $this->pager->getCurrentPageID());
    }
    public function testNextPageID()
    {
        $this->assertEqual(false, $this->pager->getNextPageID());
    }
    public function testPrevPageID()
    {
        $this->assertEqual(false, $this->pager->getPreviousPageID());
    }
    public function testNumItems()
    {
        $this->assertEqual(0, $this->pager->numItems());
    }
    public function testNumPages()
    {
        $this->assertEqual(0, $this->pager->numPages());
    }
    public function testFirstPage()
    {
        $this->assertEqual(true, $this->pager->isFirstPage());
    }
    public function testLastPage()
    {
        $this->assertEqual(true, $this->pager->isLastPage());
    }
    public function testLastPageComplete()
    {
        $this->assertEqual(true, $this->pager->isLastPageComplete());
    }
}
