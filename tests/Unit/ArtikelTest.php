<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\Event;
use Illuminate\Http\Request;

use App\Http\Controllers\ArtikelController;
use App\Models\Artikel;

class ArtikelTest extends TestCase
{
    /**
     * Test ob die Artikel richtig gespeichert werden.
     *
     * @return void
     */
    public function test_store()
    {
        // Event::fake();

        $request = Request::create('/artikel', 'POST', [
            'bezeichnung'     =>  'Test Artikel Store methode',
            'preis'  =>  55.50,
            'image_path'  =>  'test.png',
        ]);

        $controller = new ArtikelController();
        $response = $controller->store($request);

        $this->assertEquals(302, $response->getStatusCode());

        $artikel = Artikel::where('bezeichnung', 'Test Artikel Store methode')->first();
        $this->assertNotNull($artikel);

        $artikel->delete();
    }

    /**
     * Test ob die Artikel richtig gespeichert werden.
     *
     * @return void
     */
    public function test_update()
    {
        $artikel = Artikel::query()->create([
            'bezeichnung' => 'Test Artikel Update methode',
            'preis' => 4545.45,
            'image_path' => 'update_test.png',
        ]);
        $request = Request::create('/artikel/'+$artikel->id, 'PUT', [
            'bezeichnung'     =>  'Test Artikel2 Store methode',
            'preis'  =>  55.50,
            'image_path'  =>  'test.png',
        ]);

        $controller = new ArtikelController();
        $response = $controller->update($request, $artikel->id);

        $this->assertEquals(302, $response->getStatusCode());

        $artikel2 = Artikel::where('bezeichnung', 'Test Artikel Update2 methode')->first();
        $this->assertNotNull($artikel2);

        $artikel2->delete();
    }
}
