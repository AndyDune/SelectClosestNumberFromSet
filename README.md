# SelectClosestNumberFromSet
It helps to narrow down large set of input numbers to specified set.

[![Build Status](https://travis-ci.org/AndyDune/SelectClosestNumberFromRange.svg?branch=master)](https://travis-ci.org/AndyDune/SelectClosestNumberFromRange)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Packagist Version](https://img.shields.io/packagist/v/andydune/select-closest-number-from-range.svg?style=flat-square)](https://packagist.org/packages/andydune/select-closest-number-from-range)
[![Total Downloads](https://img.shields.io/packagist/dt/andydune/select-closest-number-from-range.svg?style=flat-square)](https://packagist.org/packages/andydune/select-closest-number-from-range)


It offers convenient interface for incapsulated array. Implaments strategy template for any number of filters.


Installation
------------

Installation using composer:

```
composer require andydune/select-closest-number-from-range
```
Or if composer was not installed globally:
```
php composer.phar require andydune/select-closest-number-from-range
```
Or edit your `composer.json`:
```
"require" : {
     "andydune/select-closest-number-from-range": "^1"
}

```
And execute command:
```
php composer.phar update
```

Solve tasks
-----------

There is hard limited set numbers allowed. But the input can be any number.
We need to select closest number from allowed set to use next.

This class can help to solve this task.

By default script selects low close number:
```php
use AndyDune\SelectClosestNumberFromRange;
$object = new SelectClosestNumberFromRange([0, 20, 40]);
$next = $object->select(-5); // = 0
$next = $object->select(5); // = 0
$next = $object->select(39); // = 20
$next = $object->select(100); // = 40
```  


Use method `selectHigh` to select high allowed number:
```php
use AndyDune\SelectClosestNumberFromRange;
$object = new SelectClosestNumberFromRange([0, 20, 40]);
$object->selectHigh();
$next = $object->select(-5); // = 0
$next = $object->select(5); // = 20
$next = $object->select(39); // = 40
$next = $object->select(100); // = 40
```  
