<?php

namespace Tests;

use App\Http\Controllers\Api\v1\MenuItemController;
use App\Http\Services\ImportServices;
use App\Http\Services\MenuService;
use PHPUnit\Framework\TestCase;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Mockery;

class MenuItemControllerTest extends TestCase
{
    protected $importService;
    protected $menuService;
    protected $menuItemController;

    protected function setUp(): void
    {
        parent::setUp();

        $this->importService = Mockery::mock(ImportServices::class);
        $this->menuService = Mockery::mock(MenuService::class);

        $this->menuItemController = new MenuItemController($this->importService, $this->menuService);
    }

    protected function tearDown(): void
    {
        Mockery::close();

        parent::tearDown();
    }

    public function testUpload()
    {
        $request = Mockery::mock(Request::class);
        $file = 'file.json'; // you can adjust the extension you want
        $path = public_path('/files');

        $this->importService->shouldReceive('uploadFileData')
            ->once()
            ->with($path, $file);

        $response = $this->menuItemController->upload($request);

        $this->assertEquals(['message' => 'File has been uploaded successfully'], $response);
    }

    public function testViewAll()
    {
        $menuItems = ['item1', 'item2'];// add json items

        $this->menuService->shouldReceive('getAllMenuItems')
            ->once()
            ->andReturn($menuItems);

        $response = $this->menuItemController->viewAll();

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(['data' => $menuItems, 'message' => '', 'type' => 'list'], $response->getData(true));
    }
    public function testView()
    {
        $id = 1;
        $menuItem = ['id' => $id, 'name' => 'Item 1'];

        $this->menuService->shouldReceive('getMenuItemById')
            ->once()
            ->with($id)
            ->andReturn($menuItem);

        $response = $this->menuItemController->view($id);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(['data' => $menuItem, 'message' => 'Show'], $response->getData(true));
    }

    public function testViewWithInvalidId()
    {
        $id = 99;

        $this->menuService->shouldReceive('getMenuItemById')
            ->once()
            ->with($id)
            ->andReturn(null);

        $response = $this->menuItemController->view($id);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(404, $response->getStatusCode());
        $this->assertEquals(['error' => 'Menu item not found'], $response->getData(true));
    }

}
