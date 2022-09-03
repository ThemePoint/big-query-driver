<?php

namespace ThemePoint\DoctrineBigQuery\Exception;

class MissingConnectionParamException extends \InvalidArgumentException
{
    public function __construct(string $parameter)
    {
        parent::__construct(
            \sprintf('Missing %s parameter', $parameter),
            null,
            null
        );
    }
}