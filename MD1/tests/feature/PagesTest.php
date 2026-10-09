<?php

use App\Database\Seeds\TaskManagementSeeder;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
final class PagesTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use FeatureTestTrait;

    protected $namespace = null;
    protected $basePath  = APPPATH . 'Database';
    protected $seed      = TaskManagementSeeder::class;

    public function testWelcomePageListsOnlyTodayTasks(): void
    {
        $result = $this->get('/');

        $result->assertOK();
        $result->assertSee('AD System Management');
        $result->assertSee('Review morning sales report');
    }

    public function testTaskListPageListsEveryTask(): void
    {
        $result = $this->get('/tasks');

        $result->assertOK();
        $result->assertSee('Task List');
        $result->assertSee('Review project documentation');
        $result->assertSee('Archive last week invoices');
    }

    public function testProfilePageDisplaysDemoUser(): void
    {
        $result = $this->get('/profile');

        $result->assertOK();
        $result->assertSee('Aleson Depano');
        $result->assertSee('aleson.depano@example.com');
    }

    public function testAboutPageIdentifiesDeveloper(): void
    {
        $result = $this->get('/about');

        $result->assertOK();
        $result->assertSee('Aleson Depano');
    }
}
