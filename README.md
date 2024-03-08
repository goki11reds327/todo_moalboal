# 🏖 About ToDo Moalboal

<p>
Laravel10系を使用した、ToDoアプリをモチーフにしたWebアプリケーション。
</p>
<p><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200" alt="Laravel Logo"></a></p>


# Application Overview and Development Background:
<p>
様々なToDoアプリが仕事や勉強などで活用されている中で、買い物の場面においてはシンプルなメモ機能が使用されていることが多い。
<br>ToDoアプリの持つ機能や利便性によって、日々の買い物をより簡単に、楽しくすることができると考え、
<br>晩御飯の献立と必要な食材を家庭内で共有するためのアプリを開発した。
</p>


主な機能:

1．食事メニューを投稿し、その日の献立を家族内で共有可能。
2．献立の調理に当たり、必要な食材の情報を追加可能。
　必要な食材の情報は以下の通り。
　・具材名
　・必要量
　・買う場所
　・買う人
　・画像

3．冷蔵庫内の在庫アイテムも登録することができ、在庫がある食材を
<br>新たに「買い物リスト」に追加した場合は、確認のメッセージが表示。

従来のToDoリストの役割に加え、上記の特徴的な機能を追加し、
<br>家庭内での買い物を手助けするアプリとなっている。
</p>

# 👨‍👨‍👧‍👦 Member

#### Leader

<p>
  🏋 GOKI KAWAMURA
</p>
 
 #### Front
 <p>
  🏋️‍♀️  MAI TSUCHIYA<br>
</p> 
   
#### Back
<p>
  🏋️‍♂️  MASAAKI KATO<br>
  🏋  NAOHIRO INUKAI<br>
</p>

# ⏳ Development Period

<p>
期間：2024年2月20日-2024年3月1日
</p>

## Screen transition diagram
<img width="962" alt="スクリーンショット 2024-03-08 14 27 19" src="https://github.com/goki11reds327/todo_moalboal/assets/158553742/c28e71c0-3857-4c40-8245-2b7b62ed55bc">

## Home Page
<h3>Mobile　image</h3><br>
<img width="300" alt="スクリーンショット 2024-02-27 14 01 02" src="https://github.com/goki11reds327/todo_moalboal/assets/127312306/46acc2df-3b65-48bf-8f5b-6399afdbdab3">

## Register Page
<h3>Mobile image</h3><br>
<img width="300" alt="スクリーンショット 2024-02-27 14 00 44" src="https://github.com/goki11reds327/todo_moalboal/assets/127312306/ef6dba13-9d11-4e4b-aafc-b54cd8f22d5f">

## Login Page
<h3>Mobile image</h3><br>
<img width="439" alt="スクリーンショット 2024-03-07 15 51 18" src="https://github.com/goki11reds327/todo_moalboal/assets/158553742/c2427fca-54f2-41cc-a555-12518944aef5">

## Profile
<h3>Mobile image</h3><br>
<img width="438" alt="スクリーンショット 2024-03-07 16 14 46" src="https://github.com/goki11reds327/todo_moalboal/assets/158553742/ca92c632-2d30-461a-bee6-adef52557b50">

## Menu Page
<h3>Mobile image</h3><br>
<img width="438" alt="スクリーンショット 2024-03-07 16 14 05" src="https://github.com/goki11reds327/todo_moalboal/assets/158553742/f6db946b-fcbc-454e-9cc7-f1c697f1b1b1">

## Buy Page
<h3>Mobile image</h3><br>
<img width="432" alt="スクリーンショット 2024-03-07 16 23 03" src="https://github.com/goki11reds327/todo_moalboal/assets/158553742/a71b4855-a4b9-4050-bae0-c39a581356f7">

## Stock Page
<h3>Mobile image</h3><br>
<img width="432" alt="スクリーンショット 2024-03-07 16 26 44" src="https://github.com/goki11reds327/todo_moalboal/assets/158553742/c4f3142f-dd9f-48ff-81e0-e397197f155d">

## DB design
<h3>ER diagram</h3>
<img width="384" alt="スクリーンショット 2024-03-08 16 28 30" src="https://github.com/goki11reds327/todo_moalboal/assets/158553742/484f3b3d-6966-40c6-8624-4a01f73e79ce">

# 📖 Functions at a Glance

| 機能一覧     | 機能概要                                               |
| ------------ | ------------------------------------------------------ |
| 認証機能     | マイページを登録、編集、削除ができる。                 |
| 献立投稿機能 | 毎日を献立に投稿することで家族間で献立を共有できる機能 |
| 冷蔵庫機能   | 冷蔵庫の中身を登録できる機能                           |

# 💻 How To Environment

### 🇯🇵
<p>
 Step 1. git clone URL<br>
 Step 2. DB作成<br>
 Step 3. cp .env.sample .envを入力<br>
 Step 4. php key:generateを入力し、Keyを作成<br>
 Step 5. php artisan migrateでテーブル作成<br>
 Step 6. php artisan serve<br>
</p>

### 🇺🇸
<p>
 Step 1. git clone URL<br>
 Step 2. Create a database in MySQL<br>
 Step 3. Enter cp .env.sample .env<br>
 Step 4. Enter php key:generate to generate a key<br>
 Step 5. Create tables with php artisan migrate<br>
 Step 6. Run php artisan serve<br>
</p>

# 💭 Future implementation plans

<p>
 ・コメント機能の編集/削除実装<br>
 ・冷蔵庫機能のそれぞれの食材の個数選択<br>
</p>
