<?php

namespace ThemePoint\DoctrineBigQuery;


use Doctrine\DBAL\Driver\API\ExceptionConverter;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Google\Cloud\BigQuery\BigQueryClient;
use ThemePoint\DoctrineBigQuery\Exception\MissingConnectionParamException;

class Driver implements \Doctrine\DBAL\Driver
{
    private const DEFAULT_LOCATION = 'US';

    public function connect(array $params): Connection
    {
        if (!\array_key_exists('projectId', $params)) {
            throw new MissingConnectionParamException('projectId');
        }

        if (!\array_key_exists('location', $params)) {
            throw new MissingConnectionParamException('location');
        }

        if (!\array_key_exists('keyFilePath', $params)) {
            throw new MissingConnectionParamException('keyFilePath');
        }

        $client = new BigQueryClient([
            'keyFilePath' => $params['keyFilePath'],
            'location' => $params['eu'] ?? self::DEFAULT_LOCATION,
            'projectId' => $params['projectId'],
        ]);

        return new Connection($client);
    }

    public function getDatabasePlatform()
    {
        // TODO: Implement getDatabasePlatform() method.
    }

    public function getExceptionConverter(): ExceptionConverter
    {
        // TODO: Implement getExceptionConverter() method.
    }

    public function getSchemaManager(Connection $conn, AbstractPlatform $platform)
    {
        // TODO: Implement getSchemaManager() method.
    }
}