<?php
namespace Xmf\Key;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-02-06 at 23:03:00.
 */
class FileStorageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var FileStorage
     */
    protected $object;

    /**
     * @var string
     */
    protected $testKey = 'x-unit-test-key-file';

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new FileStorage;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        $this->object->delete($this->testKey);
    }

    /**
     * @covers Xmf\Key\FileStorage::save
     */
    public function testSave()
    {
        $name = $this->testKey;
        $data = 'data';
        $this->object->save($name, $data);
        $this->assertEquals($data, $this->object->fetch($name));
    }

    /**
     * @covers Xmf\Key\FileStorage::fetch
     */
    public function testFetch()
    {
        $name = $this->testKey;
        $data = 'data';
        $this->assertFalse($this->object->fetch($name));
        $this->object->save($name, $data);
        $this->assertEquals($this->object->fetch($name), $data);
    }

    /**
     * @covers Xmf\Key\FileStorage::exists
     */
    public function testExists()
    {
        $name = $this->testKey;
        $data = 'data';
        $this->assertFalse($this->object->exists($name));
        $this->object->save($name, $data);
        $this->assertTrue($this->object->exists($name));
    }

    /**
     * @covers Xmf\Key\FileStorage::delete
     */
    public function testDelete()
    {
        $name = $this->testKey;
        $data = 'data';
        $this->object->save($name, $data);
        $this->assertTrue($this->object->exists($name));
        $actual = $this->object->delete($name);
        $this->assertTrue($actual);
        $actual = $this->object->delete($name);
        $this->assertFalse($actual);
        $this->assertFalse($this->object->exists($name));
    }
}
