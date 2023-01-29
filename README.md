SMDEV
===============

[![PHP Version Require](http://poser.pugx.org/midtrans/midtrans-php/require/php)](https://packagist.org/packages/midtrans/midtrans-php)
[![Latest Stable Version](http://poser.pugx.org/sandimvlyadi/smdev/v)](https://packagist.org/packages/sandimvlyadi/smdev)
[![Monthly Downloads](http://poser.pugx.org/sandimvlyadi/smdev/d/monthly)](https://packagist.org/packages/sandimvlyadi/smdev)
[![Total Downloads](http://poser.pugx.org/sandimvlyadi/smdev/downloads)](https://packagist.org/packages/sandimvlyadi/smdev)
[![License](http://poser.pugx.org/sandimvlyadi/smdev/license)](https://packagist.org/packages/sandimvlyadi/smdev)

## 1. Installation

Use [Composer](https://getcomposer.org), so you can install via CLI:

```
composer require sandimvlyadi/smdev
```

and run `composer install` on your terminal.

## 2. How to Use

### 2.1. SMDEV Webhooks

Add this line to your .env file:

```
SMDEV_WEBHOOK="[YOUR WEBHOOK URL]"
```

You can call this library:

```php
use Sandimvlyadi\Smdev\Hook;
```

Send message to your webhook:

```php
Hook::send('your message goes here');
```

### 2.1. RENOT (Real Time Error Notification)

Add this line to your .env file:

```
RENOT_URL="[YOUR RENOT SERVICE URL]"
```

You can call this library:

```php
use Sandimvlyadi\Smdev\Renot;
```

Send message:

```php
Renot::send('your message goes here');
```

or

```php
Renot::send('your message goes here', 'XXXXXX,YYYYYY');
```

`XXXXXX` and `YYYYYY` are targets (bot's user PID)