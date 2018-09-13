# Laravel CSV macros

Macros to make it easier to produce and export data in CSV format

## Collection::csv macro

```php
$collection = collect([
  [ 1, 2, 3, 4],
  [ 1, 3],
  [ 1, 3, 5],
]);

$collection->csv();

// 1,2,3,4\n
// 1,3\n
// 1,3,5\n
```

## Response::csv macro

```php
$collection = collect([
  [ 1, 2, 3, 4],
  [ 1, 3],
  [ 1, 3, 5],
]);

return Illuminate\Http\Response::csv($collection, 'collection.csv');

// Illuminate\Http\Response {
//   +headers: Symfony\Component\HttpFoundation\ResponseHeaderBag {
//     #computedCacheControl: array:2 [
//       "no-cache" => true
//       "private" => true
//     ]
//     #cookies: []
//     #headerNames: array:4 [
//       "cache-control" => "Cache-Control"
//       "date" => "Date"
//       "content-type" => "Content-Type"
//       "content-disposition" => "Content-Disposition"
//     ]
//     #headers: array:4 [
//       "cache-control" => array:1 [
//         0 => "no-cache, private"
//       ]
//       "date" => array:1 [
//         0 => "Thu, 13 Sep 2018 10:24:29 GMT"
//       ]
//       "content-type" => array:1 [
//         0 => "test/csv"
//       ]
//       "content-disposition" => array:1 [
//         0 => "attachment; filename="collection.csv""
//       ]
//     ]
//     #cacheControl: []
//   }
//   #content: """
//     1,2,3,4\n
//     1,3\n
//     1,3,5\n
//     """
//   #version: "1.0"
//   #statusCode: 200
//   #statusText: "OK"
//   #charset: null
//   +original: """
//     1,2,3,4\n
//     1,3\n
//     1,3,5\n
//     """
//   +exception: null
// }
```

## Installation

`composer require amsoell/laravel-csv-helpers`
