## 基于 Hyperf 协程框架的在线商城（后台）

### 运行环境要求
**直接参考 hyperf 官方文档的运行环境:https://hyperf.wiki/#/zh-cn/quick-start/install**

### 演示地址
+ http://shop.goletter.cn
+ 用户名test 密码123456

### 安装
**拉取项目**
```php
git clone https://github.com/goletter/hyperf-shop.git
```
**初始化项目依赖**
```php
composer install
```

**配置env文件,不存在env文件的话复制一份.env.example文件为.env(文件图片默认使用阿里云oos)**
```php
APP_NAME=skeleton
DB_DRIVER=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hyperf_shop //数据库
DB_USERNAME=root
DB_PASSWORD=xxx
DB_CHARSET=utf8mb4
DB_COLLATION=utf8mb4_unicode_ci
DB_PREFIX=

REDIS_HOST=localhost
REDIS_AUTH=(null)
REDIS_PORT=6379
REDIS_DB=0
//jwt配置 扩展包参考:https://github.com/phper666/jwt-auth
JWT_SECRET=xxx
JWT_TTL=60000

//阿里云配置
ACCESS_KEY=xxx
ACCESS_SECRET=xxx
END_POINT=xxx
BUCKET=xx
```
**项目根目录下运行迁移(根目录下放置了初始化数据文件)**
```php
php bin/hyperf.php migrate
```

**启动项目(根目录下运行)**
```php
php bin/hyperf.php start
```

### 应用部署
**我只是简单的做了 Supervisor 的部署,你可以根据需要,对应进行不同的部署,具体参考官方文档**


### 主要功能模块

- [x] 后台首页数据统计
- [x] 商品分类,商品管理 定时上下架
- [x] 首页展示管理
- [x] 用户管理
- [ ] 权限管理
    - [x] 权限列表
    - [x] 角色列表
    - [ ] 权限控制
- [ ] 用户操作日志
  ....

### 扩展包描述

| 扩展包 | 描述  |  
| --- |  --- |   
| [hyperf-permission](https://github.com/donjan-deng/hyperf-permission) | 基于 Hyperf 的权限组件 |
| [phper666/jwt-auth](https://github.com/phper666/jwt-auth) | 基于 Hyperf 的 jwt 鉴权组件 |
| [hyperf/async-queue](https://github.com/hyperf/async-queue) | 异步队列组件 |
**其他可以自行查看**
