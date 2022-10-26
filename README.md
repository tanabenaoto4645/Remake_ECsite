## アプリ名

「nrebuilding ecsite」

## 概要

私がオリジナルで作成したリメイク古着を販売するためのECサイトです。

## URL

https://nrebuilding-ecsite.herokuapp.com/

テストアカウント  
メール：test@test.com  
パスワード：password

## 作成背景

もともとフリマサイトで、作成したリメイク古着を販売していましたが、フリマサイトでは「中古、安く」というイメージを持たれる場合が多いかと思います。
オリジナルで作成したものを販売する場合、フリマサイトのイメージに引っ張られイメージダウンしかねないと考え、自らのサイトを作成しようと考えました。
また、自身のサイトを持ち、間にフリマサイトを挟まないことで、より購入者との距離感が近くなると考えました。

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

##機能
* 一般
    * 商品一覧表示
    * 商品詳細ページ
    * 商品並べ替え
    * 絞り込み（販売状態別、カテゴリ別）
    * Instagram投稿表示
* ユーザー
    * ユーザー登録・ログイン
    * カート追加・削除
    * お気に入り追加・編集
    * ユーザー情報編集
    * レビュー投稿
* 管理者
    * 商品登録・編集・削除
    * オーダー確認
    * メール送信（ユーザー登録時、購入完了時）

## 工夫点

* 決済機能の導入（現段階ではテストモード）
    * Stripeを利用し、クレジットカードでの決済機能を導入しました。

* 非同期処理でのお気に入り機能
    * お気に入り機能を非同期処理にして、ページ更新しなくてもお気に入り機能が動くようにしました。
    * またその際、お気に入りの有無により、ページ更新しなくてもボタンの色が変更されるようにしました。

* Instagramの投稿表示機能
    * Instagram Graph APIを利用し、自身のinstagram投稿を表示できるようにしました。

## 改善したい点と追加したい機能

* FatControllerの修正 
* UIの調整
* 商品購入後のキャンセル機能  
* 商品のキーワード検索機能
* 非同期での並び替え機能

## 利用方法

１．トップページから商品を選びます。  
<img width="500" alt="index" src="https://user-images.githubusercontent.com/110731296/197521853-0400471b-1f55-425d-b47a-e5af0b8b28f1.png">  

２．商品詳細画面では、お気に入り追加、カートへ追加が行えます。カートへ追加ボタンを押すとカート画面へ遷移します。


<img width="500" alt="show" src="https://user-images.githubusercontent.com/110731296/197522274-e1eeb10f-e5dc-4d20-b067-116603126f45.png">  

３．カート画面で内容を確認し「決済をする」ボタンを押します。  
<img width="500" alt="index" src="https://user-images.githubusercontent.com/110731296/197522504-00a46523-833c-4bf4-8a2f-af3504303132.png">  

４．購入者情報、決済情報を入力すると購入が完了します。 
<img width="500" alt="index" src="https://user-images.githubusercontent.com/110731296/197525616-ebad7a66-e18f-444a-b445-81d03b4de59c.png">  
<img width="500" alt="index" src="https://user-images.githubusercontent.com/110731296/197525217-7e36d3fb-2a99-4e16-a41e-8b1518990855.png">  