<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;
use App\Database\Seeds\PosSeeder;

/**
 * @internal
 */
final class PagesTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use FeatureTestTrait;

    protected $namespace = null;
    protected $basePath  = APPPATH . 'Database';
    protected $seed      = PosSeeder::class;

    public function testLandingPageLoads(): void
    {
        $result = $this->get('/');

        $result->assertOK();
        $result->assertSee('Smart accounts');
    }

    public function testAboutPageLoads(): void
    {
        $result = $this->get('/about');

        $result->assertOK();
        $result->assertSee('MVC flow');
    }

    public function testCustomerPageListsDatabaseRecords(): void
    {
        $result = $this->get('/customers');

        $result->assertOK();
        $result->assertSee('Customer Accounts');
        $result->assertSee('Maria Santos');
        $result->assertSee('Sofia Mendoza');
    }

    public function testUserPageListsDatabaseRecords(): void
    {
        $result = $this->get('/users');

        $result->assertOK();
        $result->assertSee('User Accounts');
        $result->assertSee('Aleson Depano');
        $result->assertSee('Agapito');
        $result->assertSee('Nicole Garcia');
    }
}
