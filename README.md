# Elasticsearch client for raylin666

[![GitHub release](https://img.shields.io/github/release/raylin666/elasticsearch.svg)](https://github.com/raylin666/elasticsearch/releases)
[![PHP version](https://img.shields.io/badge/php-%3E%207.0-orange.svg)](https://github.com/php/php-src)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](#LICENSE)

### 环境要求

* PHP >=7.0

### 安装说明

```
composer require "raylin666/elasticsearch"
```

### 使用方式

```php
<?php

require 'vendor/autoload.php';

$client = new \Raylin666\Elasticsearch\Client();
$client = $client->create();
var_dump($client->build()->indices()->get(['index' => '_all']));

```

## 更新日志

请查看 [CHANGELOG.md](CHANGELOG.md)

### 联系

如果你在使用中遇到问题，请联系: [1099013371@qq.com](mailto:1099013371@qq.com). 博客: [kaka 梦很美](http://www.ls331.com)

## License MIT

