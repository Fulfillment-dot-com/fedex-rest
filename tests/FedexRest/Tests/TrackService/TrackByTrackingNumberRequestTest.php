<?php declare(strict_types=1);

namespace FedexRest\Tests\TrackService;

use FedexRest\Authorization\Authorize;
use FedexRest\Exceptions\MissingAccessTokenException;
use FedexRest\Exceptions\MissingTrackingNumberException;
use FedexRest\Services\Track\TrackByTrackingNumberRequest;
use FedexRest\Tests\BaseTestCase;

class TrackByTrackingNumberRequestTest extends BaseTestCase
{
    protected Authorize $auth;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->setupAuth();
    }

    public function testSetApiEndpoint()
    {
        $request = new TrackByTrackingNumberRequest();

        $this->assertObjectHasProperty('api_endpoint', $request);
        $this->assertEquals('/track/v1/trackingnumbers', $request->api_endpoint);
    }


    public function testProductionMode()
    {
        $request = (new TrackByTrackingNumberRequest())->useProduction();
        $this->assertObjectHasProperty('production_mode', $request);
        $this->assertEquals(true, $request->production_mode);
        $this->assertEquals('https://apis.fedex.com', $request->getApiUri());
    }

    public function testMissingAuthCredentials()
    {

        try {
            (new TrackByTrackingNumberRequest())
                ->setTrackingNumber('020207021381215')
                ->request();
        } catch (MissingAccessTokenException $e) {
            $this->assertEquals('Authorization token is missing. Make sure it is included', $e->getMessage());
        }

    }

    public function testRawResponse()
    {
        $response = (new TrackByTrackingNumberRequest())
            ->asRaw()
            ->setTrackingNumber('020207021381215')
            ->setAccessToken($this->auth->authorize()->access_token)->request();

        $this->assertObjectHasProperty('headers', $response);
    }

    public function testMissingTrackingNumber()
    {

        try {
            (new TrackByTrackingNumberRequest())
                ->setAccessToken($this->auth->authorize()->access_token)->request();
        } catch (MissingTrackingNumberException $e) {
            $this->assertEquals('Please enter at least one tracking number', $e->getMessage());
        }

    }

    public function testResponseSuccess()
    {
        $response = (new TrackByTrackingNumberRequest())
            ->setTrackingNumber('020207021381215')
            ->setAccessToken($this->auth->authorize()->access_token)->request();

        $this->assertObjectHasProperty('transactionId', $response);
    }
}
