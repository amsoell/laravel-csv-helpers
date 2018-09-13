<?php

use Response as ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

Collection::macro('csv', function () {
    $buffer = fopen('php://temp/maxmemory:' . (5 * 1024 * 1024), 'r+');

    $this->each(function ($line) use ($buffer) {
        fputcsv($buffer, $line);
    });

    rewind($buffer);

    return stream_get_contents($buffer);
});

Response::macro('csv', function (Collection $data, $filename = null, array $headers = null) {
    if ($headers) {
        $data = $data->prepend($headers);
    }

    $csv = $data->csv();
    $response = ResponseFactory::make($csv);

    if (! empty($filename)) {
        $response = $response
            ->header('Content-Type', 'test/csv')
            ->header('Content-Disposition', sprintf(
                'attachment; filename="%s.csv"',
                $filename
            ));
    }

    return $response;
});
