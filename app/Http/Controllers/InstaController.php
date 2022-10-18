<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\Handler;


class InstaController extends Controller
{
    //
    public function index()
    {
        // インスタ投稿格納用
        $instagramItems = [];
        // インスタAPIを使用するためのIDとトークンを設定
        $instagramBusinessId = config('services.instagram.business_id');
        $instagramAccessToken = config('services.instagram.access_token');
        // 取得条件や項目などを指定
        $userName = 'n_rebuilding_mal';
        $query = "business_discovery.username({$userName}){id,followers_count,media_count,media{id,caption,media_url,timestamp,permalink}}";
  
        try {
            // インスタ投稿を取得する
            $target_url = "https://graph.facebook.com/v15.0/{$instagramBusinessId}?fields={$query}&access_token={$instagramAccessToken}";  
            $json = file_get_contents($target_url);
            $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
            $result = json_decode($json, true);

            foreach ($result['business_discovery']['media']['data'] as $item) {
                $instagramItems[] = !empty($item['thumbnail_url']) ? [
                    'img' => $item['thumbnail_url'],
                    'caption' => $item['caption'],
                    'link' => $item['permalink'],
                ] : [
                    'img' => $item['media_url'],
                    'caption' => $item['caption'],
                    'link' => $item['permalink'],
                ];
            }
        } catch (\Exception $exception) {
        // ビジネスアカウント・クリエイターアカウントでない場合は取得できない
            Log::error($exception->getMessage());
        }

        return view('instagram.index', compact('instagramItems'));
    }
}
