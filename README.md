# カスタム認可処理追加
Laravelに組み込まれているcanは暗黙のモデルバインディングを必要とする  
暗黙のモデルバインディングをしない場合の認可の処理を実装

## 実装内容
-  App\Http\Middleware\Authorizeミドルウェアの作成
  - ルーティングにて`Route::get('/posts/{id}', [PostController::class, 'show'])->middleware('authorization:view,post');`のように指定する
### 記述方法
- パラメータが1つしかない場合
    - authorization:{ポリシーメソッド名},{モデル名}
    - authorization:view,post
- パラメータが複数ある場合
    - authorization:{ポリシーメソッド名},{モデル名:対応パラメータ},{モデル名:対応パラメータ}
    - authorization:view,user:id,post:post_id

## 環境構築
1. `make init`でビルド~起動まで
1. `make migrate`でマイグレーション実行
1. `make seed`で仮データ投入
1. test1@example.com/passwordでアクセス

