<?php
declare(strict_types=1);

require_once (__DIR__ . '/../../../vendor/autoload.php');
require_once (__DIR__ . '/../../../src/04_practices/Constant.php');

use exp\src\practice\GameStore;
use exp\src\practice\GameStudioService;
use PHPUnit\Framework\TestCase;

class GameStoreTest extends TestCase
{

     public function testGetSaleListWillThrowErrorWhenNotInSaleSeason() {
         //TODO: Test function getSaleList() will throw error if not in Sale season
         $saleSeason = 1;
         $currentSeason = 2;
         $gameStore = new GameStore($saleSeason);

         $expected_exception = 'FAKE ERROR: NOT IN SALE';

         $this->expectExceptionMessage($expected_exception);

         $gameStore->getSaleList($currentSeason);
     }

    public function testGetSaleListWillCallToServiceDuringSale() {
        //TODO: Test function getSaleList() will call to service in case of sale season

        //HINT: You need to:
        // - Fake GameStudioService
        // - Fake private property $studio_service (use reflection class)
        $gameStoreMock = $this->getMockBuilder(GameStore::class)
                                ->getMock();

        $gameStoreMock->expects($this->once())->method('getSaleList');
        
        $gameStoreMock->getSaleList(1);
    }
}
