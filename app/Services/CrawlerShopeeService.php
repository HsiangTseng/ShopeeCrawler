<?php
namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

/**
 * 透過蝦皮的後端搜尋產品API取得商品資訊
 */
class CrawlerShopeeService
{
    public function __construct()
    {
        
    }
    
    /**
     * search
     *
     * @param  int $category_id，搜尋類別的類別id
     * @param  int $limit，每次搜尋的商品數
     * @param  int $page，每次搜尋的頁數
     * @return void
     */
    public function search($category_id, $limit = 100, $page = 1)
    {
        try{
            $client = new Client();
        
            $search_page = $limit*($page-1); // 蝦皮搜尋API中，newest參數代表頁數，值由0開始
            $shopee_search_api_url = 'https://shopee.tw/api/v4/search/search_items?by=relevancy&fe_categoryids='.$category_id.'&limit='.$limit.'&newest='.$search_page.'&order=desc&page_type=search&scenario=PAGE_CATEGORY&version=2';
    
            // 透過API取得商品資訊
            $data = $client->request('GET', $shopee_search_api_url);

            if($data){
                return json_decode($data->getBody()->getContents());
            }else{
                return 'ERROR';
            }
        }catch(Exception $e){
            Log::error(' ===== CrawlerShopeeService Search Error =====');
            Log::error($e);
            return 'ERROR';
        }
    }
}