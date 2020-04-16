<?php

use Codeception\Util\HttpCode as responseValidate;

class SpeakerTestCest
{

    public function tryGetAllSpeakerWithError(ApiTester $I)
    {
        $I->wantTo('test get all speakers, with error');

        $I->haveHttpHeader('content-type', 'application/json');

        $I->sendGET('speakers');

        $I->seeResponseIsJson();

        $I->seeResponseCodeIs(404);
    }

    public function tryCreateSpeakerWithSuccess(ApiTester $I)
    {
        $I->wantTo('test create speaker, with success');

        $I->haveHttpHeader('content-type', 'application/json');

        $I->sendPOST('speaker', [
            'name'=>'Igor Santos',
            'resume'=>'Software Developer',
            'github'=>'github.com/IgorSantos17'
        ]);

        $I->seeResponseIsJson();

        $I->seeResponseCodeIs(201);
    }

    public function tryCreateSpeakerSameParamWithError(ApiTester $I)
    {
        $I->wantTo('test create speaker same params, with error');

        $I->haveHttpHeader('content-type', 'application/json');

        $I->sendPOST('speaker', [
            'name'=>'Igor Santos',
            'resume'=>'Software Developer',
            'github'=>'github.com/IgorSantos17'
        ]);

        $I->seeResponseIsJson();

        $I->seeResponseCodeIs(422);
    }

    public function tryGetAllpeakerWithSuccess(ApiTester $I)
    {
        $I->wantTo('test get all speakers, with success');

        $I->haveHttpHeader('content-type', 'application/json');

        $I->sendGET('speakers');

        $I->seeResponseIsJson();

        $I->seeResponseCodeIs(200);
    }


    public function tryGetOneSpeakerByIdWithSuccess(ApiTester $I)
    {
        $I->wantTo('test get one speaker by id, with success');

        $I->haveHttpHeader('content-type', 'application/json');

        $I->sendGET('speaker/1');

        $I->seeResponseIsJson();

        $I->seeResponseCodeIs(200);
    }

    public function tryGetOneSpeakerByIdWithStringWithError(ApiTester $I)
    {
        $I->wantTo('test get one speaker by id with string, with error');

        $I->haveHttpHeader('content-type', 'application/json');

        $I->sendGET('speaker/lorem');

        $I->seeResponseIsJson();

        $I->seeResponseCodeIs(422);
    }

    public function tryGetOneSpeakerNonExistentWithError(ApiTester $I)
    {
        $I->wantTo('test get one speaker by id non existent, with error');

        $I->haveHttpHeader('content-type', 'application/json');

        $I->sendGET('speaker/99999');

        $I->seeResponseIsJson();

        $I->seeResponseCodeIs(404);
    }
}
