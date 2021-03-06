<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of any modern web application framework, making it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 1100 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for helping fund on-going Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell):

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[British Software Development](https://www.britishsoftware.co)**
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Pulse Storm](http://www.pulsestorm.net/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## method

<!-- 创建项目 -->
git clone https://github.com/zsg0523/etravel.git

<!-- 修改配置文件,production,数据库信息 -->
cp .env.example  .env

<!-- 生成密钥 -->
php artisan key:generate

<!-- 运行数据库迁移并填充（特殊字段报错，请修改 database.php 里的字符集为utf-8） -->
php artisan migrate --seed 

<!-- JWT 的 secret，这个 secret 很重要，用于最后的签名 -->
php artisan jwt:secret

<!-- 为用户 ID 为1的生成一个永久有效的测试token -->
php artisan etravel:generate-token

<!-- 本地nginx配置代理 -->
if (!-e $request_filename){
    rewrite ^/(.*)$ /etravel/server.php?s=$1 last;
}


- 用户认证 注册，登录，退出
- 用户授权 只有用户本人才可编辑自己的信息
- 表单验证 过滤用户输入，防止sql注入
- xss 安全防御
- 使用 第三方API ：高德地图
- 使用Redis缓存，缓解服务器读写压力
- 队列任务 如 请求第三方API,发送邮件 等等,以提高应用的响应速度
- 计划任务 如 用户最后的登录时间，每天凌晨同步 redis 的数据至数据库
- 多角色权限管理 允许管理员权限存在
- 后台管理 后台数据模型管理

特别注意：
- 线上部署注意队列任务，supervisor进程管理工具管理horizon
- 每一次部署代码时，需 artisan horizon:terminate 然后再 artisan horizon 重新加载代码

