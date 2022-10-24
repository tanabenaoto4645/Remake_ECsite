## アプリ名

「nrebuilding ecsite」

## 概要

私がオリジナルで作成したリメイク古着を販売するためのECサイトです。

## URL

https://nrebuilding-ecsite.herokuapp.com/

テストアカウント  
メール：testUser@example.com  
パスワード：11111111

## 作成背景

もともとフリマサイトで、作成したリメイク古着を販売していましたが、フリマサイトでは「中古、安く」というイメージを持たれる場合が多いかと思います。オリジナルで作成したものを販売する場合、フリマサイトのイメージに引っ張られイメージダウンしかねないと考え、自らのサイトを作成しようと考えました。

## 使用言語

* 言語
    * PHP
    * HTML
    * CSS
    * JavaScript

* フレームワーク
    * Laravel
    * Vue
    * UIkit

## 工夫点

* 決済機能の導入（現段階ではテストモード）
    * Stripeを利用し、クレジットカードでの決済機能を導入しました。

*  非同期処理でのお気に入り機能
    * お気に入り機能を非同期処理にして、ページ更新しなくてもお気に入り機能が動くようにしました。
    * またその際、お気に入りの有無により、ページ更新しなくてもボタンの色が変更されるようにしました。


## 改善したい点と追加したい機能

* FatControllerの修正 
* UIの調整
* 商品購入後のキャンセル機能  
* 商品のキーワード検索機能
* 非同期での並び替え機能

## 利用方法

<!--１．トップページから商品を選びます。  -->
<!--<img width="500" alt="index" src="https://user-images.githubusercontent.com/87349101/144749182-f133c053-8b69-45d4-add5-eed21f066312.JPG">  -->

<!--２．商品詳細画面で個数を選択し「カートに追加」ボタンを押します。  -->
<!--<img width="500" alt="show" src="https://user-images.githubusercontent.com/87349101/144749190-abe7f254-ed29-4b9a-8482-a19f8bd51b8f.JPG">  -->

<!--３．カート画面で内容を確認し「予約を確定する」ボタンを押します。  -->
<!--<img width="500" alt="index" src="https://user-images.githubusercontent.com/87349101/144749191-6a5b6a76-3fbf-406a-9793-14128398027d.JPG">  -->

４．予約が確定され、予約番号が発行されます。  
また、登録メールアドレスに予約番号と内容の確認メールが届きます。  
<!--<img width="500" alt="index" src="https://user-images.githubusercontent.com/87349101/144749192-6af9a937-ed47-4bae-85a9-e9f40dc03045.JPG">  -->
<!--<img width="500" alt="index" src="https://user-images.githubusercontent.com/87349101/144749193-42292dbd-0fd5-4b06-9e48-3f1cb9d31d3d.JPG">  -->