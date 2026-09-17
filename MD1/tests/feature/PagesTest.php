<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
final class PagesTest extends CIUnitTestCase
{
    use FeatureTestTrait;

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

    public function testCustomerPageListsStaticRecords(): void
    {
        $result = $this->get('/customers');

        $result->assertOK();
        $result->assertSee('Customer Accounts');
        $result->assertSee('Maria Santos');
        $result->assertSee('Sofia Mendoza');
    }

    public function testUserPageListsStaticRecords(): void
    {
        $result = $this->get('/users');

        $result->assertOK();
        $result->assertSee('User Accounts');
        $result->assertSee('Aleson Depano');
        $result->assertSee('Agapito');
        $result->assertSee('Nicole Garcia');
    }
}
