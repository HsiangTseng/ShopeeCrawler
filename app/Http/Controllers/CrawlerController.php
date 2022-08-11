<?php

namespace App\Http\Controllers;

use Exception;
use App\Result\ShopeeProductResult;
use Illuminate\Support\Facades\Log;
use App\Services\CrawlerShopeeService;
use App\Http\Controllers\RestController;

class CrawlerController extends RestController
{
    protected $service;
    protected $result;

    public function __construct(CrawlerShopeeService $service, ShopeeProductResult $result)
    {
        $this->service = $service;
        $this->result = $result;
    }
    
    public function crawlerShopeeProduct($page = 1)
    {
        try{
            // 透過API取得該頁的所有商品資料(作業用11041645)
            $data = $this->service->search(11041645, 100, $page);

            // 過濾資料，整理商品名稱、價格
            $result = $this->result->filterNameAndPrice($data);

            return $this->success($result);
        }catch(Exception $e){
            Log::error(' ===== CrawlerController crawlerShopeeProduct Error =====');
            Log::error($e);
            return $this->failure('E0001', '爬蟲錯誤');
        }
        
    }

}
