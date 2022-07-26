# Agility Adult

### Adult Entertainment video platform for *__[agility organization].__*  
Demo - __https://agilityadult.com/__ 

----
## Infromation 
 A [Laravel] 9.21.x with [vodi](frontend) & [nowa] html template project.

| **Agility Adult Features**  |
| :------------ |
|Built on [Laravel](http://laravel.com/) 9.12.x|
|Uses [MySQL](https://github.com/mysql) Database|
|Uses [Artisan](https://laravel.com/docs/9.x/artisan) to manage database migration, schema creations, and create/publish page controller templates|
|Dependencies are managed with [COMPOSER](https://getcomposer.org/)|
|CRUD (Create, Read, Update, Delete) Management|
|Free and premium feature|
|User Login with remember password|
|Job, queues for video uploading to bucket and doodstream with api.|
|Thumbnail creation with [Video Thumbnail]|
|Chunk file uplaod with [Laravel chunk upload]|
|Daily Log viewer with [Log Viewer]|
|Backup with [Spatie backup] and [Laravel backup manager]|
|Role Management (member,uploader,admin) for authorization|
----
## **Installation**

**A tutorial for installing this project in ur local machine.**
### **Prerequisites**

* [Backblaze API] Token for upload video to buckets for premium feature.
* [Doodstream API] for free feature.
* [Telegram Bot SDK] for send notification to telegram channel. 
* To run this project, you must have PHP **8.1** installed.
* You should setup a host on your web server for your local domain. For this you could also configure Laravel Homestead or Valet. 

### **Step 1 - Cloning repo and installing requirements**

Begin by cloning this repository to your machine, and installing all Composer & NPM dependencies.

```bash
cp .env.example .env
php artisan key:generate
git clone https://github.com/j6dr23n/agilityadult.git
cd agilityadult && composer install && npm install
npm run dev
```
### **Step 2 - View the project in the browser**
1. From the projects root folder run `php artisan serve`
2. Open your web browser and go to `http://localhost`
----
## **Installation with [Laravel Sail](https://laravel.com/docs/9.x/sail)**
1. Ensure u must install docker on your local machine.  
2. Go to your project root folder and then type the following commands.  
3. [Configure a bash alias](https://laravel.com/docs/9.x/sail#configuring-a-bash-alias)
```bash
cp docker-compose.yml.example docker-compose.yml
sail up
sail artisan migrate --seed
```
----
## **Authetication for administration**
1. Go to `http://localhost` and click Login in menu.
3. First login with admin account and go to this url for administration `http://localhost/agadult/dashboard` 
### **Admin account**
* email = `admin@gmail.com`
* password = `password`
### **User account**
* email = `user@gmail.com` 
* spassword = `password`
----
## **Demo View**
### Admin panel dashboard preview

![](https://i.postimg.cc/8PvzcCzf/Screen-Shot-2022-07-26-at-17-08-45.png)

### Free Feature preview

![](https://i.postimg.cc/BQhfq9xP/Screen-Shot-2022-07-26-at-17-09-40.png)

### Premium Feature preview

![](https://i.postimg.cc/pdCDSCNv/Screen-Shot-2022-07-26-at-17-09-15.png)

----

### **CHANGELOG**

Please see [CHANGELOG] for more information what has changed recently. 

----
### **License**

The Agility Adult is open-sourced software licensed under the  [MIT license](http://opensource.org/licenses/MIT)

----
### __Enjoy adult video platform__

[agility organization]: https://www.facebook.com/agilitygaming.org
[Laravel]: laravel.com/docs
[vodi]: https://demo2.madrasthemes.com/vodi-html/html-demo/home/index.html
[nowa]: https://spruko.com/demo/nowa/Nowa/HTML/index.html
[Laravel chunk upload]: https://github.com/pionl/laravel-chunk-upload
[Log Viewer]: https://github.com/rap2hpoutre/laravel-log-viewer
[Video Thumnail]: https://github.com/pawlox/video-thumbnail
[Spatie backup]: https://spatie.be/docs/laravel-backup/v8/introduction
[Laravel backup manager]: https://github.com/Laravel-Backpack/BackupManager

[Doodstream API]: https://doodstream.com/api-docs
[Backblaze API]: https://www.backblaze.com/b2/docs/
[Telegram Bot SDK]: https://github.com/irazasyed/telegram-bot-sdk.git

[CHANGELOG]: CHANGELOG.md
