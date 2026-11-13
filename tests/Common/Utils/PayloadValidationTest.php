<?php

declare(strict_types=1);

namespace Tests\Chargemap\OCPI\Common\Utils;

use Chargemap\OCPI\Common\Server\Errors\OcpiInvalidPayloadClientError;
use Chargemap\OCPI\Common\Utils\PayloadValidation;
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * Pins the schema behaviour that used to rely on keywords placed next to a `$ref`
 * (`required`, `additionalProperties`, `minProperties`). justinrainbow/json-schema 5
 * merged those siblings into the referenced schema, while 6 ignores them as the
 * spec requires, so the schemas now express them through `allOf`.
 *
 * @covers \Chargemap\OCPI\Common\Utils\PayloadValidation
 */
class PayloadValidationTest extends TestCase
{
    private const PAYLOADS_DIR = __DIR__ . '/payloads/';

    public function payloadProvider(): iterable
    {
        $session = self::fixture('V2_2_1/Session.json');
        $cdr = self::fixture('V2_2_1/Cdr.json');

        yield 'V2_2_1 session PUT: full session' => [
            'V2_2_1/eMSP/Server/Sessions/sessionPutRequest.schema.json', $session, true,
        ];
        foreach (['kwh', 'cdr_token', 'auth_method', 'status', 'last_updated'] as $property) {
            yield "V2_2_1 session PUT: missing $property" => [
                'V2_2_1/eMSP/Server/Sessions/sessionPutRequest.schema.json', self::without($session, $property), false,
            ];
        }
        yield 'V2_2_1 session PUT: unknown property is tolerated' => [
            'V2_2_1/eMSP/Server/Sessions/sessionPutRequest.schema.json', self::with($session, 'vendor_extension', 'x'), true,
        ];
        yield 'V2_2_1 session PUT: invalid status' => [
            'V2_2_1/eMSP/Server/Sessions/sessionPutRequest.schema.json', self::with($session, 'status', 'UNKNOWN'), false,
        ];

        yield 'V2_2_1 session PATCH: last_updated only' => [
            'V2_2_1/eMSP/Server/Sessions/sessionPatchRequest.schema.json', (object)['last_updated' => '2015-06-29T22:39:09Z'], true,
        ];
        yield 'V2_2_1 session PATCH: empty body' => [
            'V2_2_1/eMSP/Server/Sessions/sessionPatchRequest.schema.json', new stdClass(), false,
        ];
        yield 'V2_2_1 session PATCH: missing last_updated' => [
            'V2_2_1/eMSP/Server/Sessions/sessionPatchRequest.schema.json', (object)['kwh' => 1.5], false,
        ];
        yield 'V2_2_1 session PATCH: unknown property is tolerated' => [
            'V2_2_1/eMSP/Server/Sessions/sessionPatchRequest.schema.json', (object)['last_updated' => '2015-06-29T22:39:09Z', 'vendor_extension' => 'x'], true,
        ];
        yield 'V2_2_1 session PATCH: referenced property types still apply' => [
            'V2_2_1/eMSP/Server/Sessions/sessionPatchRequest.schema.json', (object)['last_updated' => '2015-06-29T22:39:09Z', 'status' => 'UNKNOWN'], false,
        ];

        yield 'V2_2_1 CDR POST: full CDR' => [
            'V2_2_1/eMSP/Server/CDRs/cdrPostRequest.schema.json', $cdr, true,
        ];
        yield 'V2_2_1 CDR POST: unknown property is rejected' => [
            'V2_2_1/eMSP/Server/CDRs/cdrPostRequest.schema.json', self::with($cdr, 'vendor_extension', 'x'), false,
        ];
        yield 'V2_2_1 CDR POST: missing total_cost' => [
            'V2_2_1/eMSP/Server/CDRs/cdrPostRequest.schema.json', self::without($cdr, 'total_cost'), false,
        ];

        yield 'V2_2_1 connector PATCH: empty body' => [
            'V2_2_1/eMSP/Server/Locations/Evses/Connectors/connectorPatchRequest.schema.json', new stdClass(), false,
        ];
        yield 'V2_2_1 connector PATCH: last_updated only' => [
            'V2_2_1/eMSP/Server/Locations/Evses/Connectors/connectorPatchRequest.schema.json', (object)['last_updated' => '2015-06-29T22:39:09Z'], true,
        ];
        yield 'V2_2_1 connector PATCH: unknown property is rejected' => [
            'V2_2_1/eMSP/Server/Locations/Evses/Connectors/connectorPatchRequest.schema.json', (object)['last_updated' => '2015-06-29T22:39:09Z', 'vendor_extension' => 'x'], false,
        ];

        $token = (object)[
            'country_code' => 'SE',
            'party_id' => 'EPK',
            'uid' => '012345678',
            'type' => 'RFID',
            'contract_id' => 'DE8ACC12E46L89',
            'issuer' => 'ePARK',
            'valid' => true,
            'whitelist' => 'ALLOWED',
            'last_updated' => '2015-06-29T22:39:09Z',
        ];
        $tokenResponse = static fn (stdClass $data): stdClass => (object)[
            'data' => $data,
            'status_code' => 1000,
            'timestamp' => '2015-06-30T21:59:59Z',
        ];
        yield 'V2_2_1 GET token response: valid token' => [
            'V2_2_1/eMSP/Client/Tokens/tokenGetResponse.schema.json', $tokenResponse($token), true,
        ];
        foreach (['contract_id', 'issuer', 'valid', 'whitelist', 'last_updated'] as $property) {
            yield "V2_2_1 GET token response: token missing $property" => [
                'V2_2_1/eMSP/Client/Tokens/tokenGetResponse.schema.json', $tokenResponse(self::without($token, $property)), false,
            ];
        }

        yield 'V2_2_1 token POST: location references' => [
            'V2_2_1/eMSP/Server/Tokens/tokenPostRequest.schema.json', (object)['location_id' => 'LOC1', 'evse_uids' => ['3256']], true,
        ];
        yield 'V2_2_1 token POST: unknown property is rejected' => [
            'V2_2_1/eMSP/Server/Tokens/tokenPostRequest.schema.json', (object)['location_id' => 'LOC1', 'vendor_extension' => 'x'], false,
        ];
        yield 'V2_2_1 token POST: missing location_id' => [
            'V2_2_1/eMSP/Server/Tokens/tokenPostRequest.schema.json', (object)['evse_uids' => ['3256']], false,
        ];

        yield 'V2_2 session PATCH: empty body' => [
            'V2_2/eMSP/Server/Sessions/sessionPatchRequest.schema.json', new stdClass(), false,
        ];
        yield 'V2_1_1 connector PATCH: empty body' => [
            'V2_1_1/eMSP/Server/Locations/Evses/Connectors/connectorPatchRequest.schema.json', new stdClass(), false,
        ];
        yield 'V2_1_1 location PATCH: empty body' => [
            'V2_1_1/eMSP/Server/Locations/locationPatchRequest.schema.json', new stdClass(), false,
        ];
    }

    /**
     * @dataProvider payloadProvider
     */
    public function testIsValidJson(string $schemaPath, stdClass $payload, bool $expected): void
    {
        $this->assertSame($expected, PayloadValidation::isValidJson($schemaPath, $payload));
    }

    /**
     * @dataProvider payloadProvider
     */
    public function testCoerce(string $schemaPath, stdClass $payload, bool $expected): void
    {
        if (!$expected) {
            $this->expectException(OcpiInvalidPayloadClientError::class);
        }

        PayloadValidation::coerce($schemaPath, $payload);

        $this->addToAssertionCount(1);
    }

    public function testCoerceCastsNumericStringsToTheSchemaType(): void
    {
        $payload = self::with(self::fixture('V2_2_1/Session.json'), 'kwh', '12.5');

        PayloadValidation::coerce('V2_2_1/eMSP/Server/Sessions/sessionPutRequest.schema.json', $payload);

        $this->assertSame(12.5, $payload->kwh);
    }

    public function testCoerceCastsNestedValuesAndTrimsStringsOnTheCallersObject(): void
    {
        $payload = self::fixture('V2_2_1/Session.json');
        $payload->total_cost->excl_vat = '25.5';
        $payload->location_id = '  LOC1  ';
        $totalCost = $payload->total_cost;

        PayloadValidation::coerce('V2_2_1/eMSP/Server/Sessions/sessionPutRequest.schema.json', $payload);

        $this->assertSame(25.5, $payload->total_cost->excl_vat);
        $this->assertSame('LOC1', $payload->location_id);
        $this->assertSame('3256', $payload->evse_uid);
        $this->assertInstanceOf(stdClass::class, $totalCost);
    }

    private static function fixture(string $path): stdClass
    {
        return json_decode(file_get_contents(self::PAYLOADS_DIR . $path), false, 512, JSON_THROW_ON_ERROR);
    }

    private static function without(stdClass $payload, string $property): stdClass
    {
        $copy = self::copy($payload);
        unset($copy->$property);

        return $copy;
    }

    /**
     * @param mixed $value
     */
    private static function with(stdClass $payload, string $property, $value): stdClass
    {
        $copy = self::copy($payload);
        $copy->$property = $value;

        return $copy;
    }

    private static function copy(stdClass $payload): stdClass
    {
        return json_decode(json_encode($payload, JSON_THROW_ON_ERROR), false, 512, JSON_THROW_ON_ERROR);
    }
}
