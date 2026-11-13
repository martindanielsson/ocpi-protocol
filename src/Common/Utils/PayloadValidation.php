<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Common\Utils;

use Chargemap\OCPI\Common\Server\Errors\OcpiInvalidPayloadClientError;
use JsonSchema\Constraints\Constraint;
use JsonSchema\Validator;
use stdClass;

final class PayloadValidation
{
    /**
     * @param string $schemaPath
     * @param stdClass $object
     * @throws OcpiInvalidPayloadClientError
     */
    public static function coerce(string $schemaPath, stdClass $object): void
    {
        $jsonSchemaValidation = self::validator($schemaPath,$object);
        if (!$jsonSchemaValidation->isValid()) {
            $errors = [];
            foreach ($jsonSchemaValidation->getErrors() as $error) {
                $errors[] = "property: " . $error['property'] . ', error: ' . $error['message'] . '. ';
            }
            throw new OcpiInvalidPayloadClientError(sprintf('Payload does not validate %s. Issues: %s. Data: %s',
                basename($schemaPath), implode($errors), json_encode($object)));
        }
    }

    public static function isValidJson(string $schemaPath,stdClass $json): bool
    {
        $jsonSchemaValidation = self::validator($schemaPath,$json);
        return $jsonSchemaValidation->isValid();
    }

    private static function validator(string $schemaPath, stdClass $json): Validator
    {
        self::trimStrings($json);
        $jsonSchemaValidation = new Validator();
        $schemasPath = __DIR__ . '/../../../resources/jsonSchemas/';
        $validated = $json;
        $jsonSchemaValidation->validate(
            $validated,
            (object)['$ref' => 'file://' . realpath($schemasPath) . DIRECTORY_SEPARATOR . $schemaPath],
            Constraint::CHECK_MODE_COERCE_TYPES
        );
        if ($validated instanceof stdClass && $validated !== $json) {
            self::replaceProperties($json, $validated);
        }
        return $jsonSchemaValidation;
    }

    /**
     * Type coercion inside oneOf/anyOf makes justinrainbow/json-schema 6 validate a deep copy and
     * assign it to the validated variable, where version 5 coerced the caller's object in place.
     * Copying the coerced properties back keeps the in-place contract callers rely on.
     */
    private static function replaceProperties(stdClass $target, stdClass $source): void
    {
        foreach (array_keys(get_object_vars($target)) as $property) {
            if (!property_exists($source, (string)$property)) {
                unset($target->$property);
            }
        }
        foreach (get_object_vars($source) as $property => $value) {
            $target->$property = $value;
        }
    }

    /**
     * @param stdClass|array<mixed> $data
     */
    private static function trimStrings(&$data): void
    {
        foreach ($data as $key => &$value) {
            if (is_string($value)) {
                if ($data instanceof stdClass) {
                    $data->$key = trim($value);
                } else {
                    $data[$key] = trim($value);
                }
            } elseif ($value instanceof stdClass || is_array($value)) {
                self::trimStrings($value);
            }
        }
    }
}
