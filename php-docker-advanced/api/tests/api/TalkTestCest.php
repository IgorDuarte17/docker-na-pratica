<?php

use Codeception\Util\HttpCode as responseValidate;

class TalkTestCest
{

    public function tryGetAllTalksWithError(ApiTester $I)
    {
        $I->wantTo('test get all talks, with error');

        $I->haveHttpHeader('content-type', 'application/json');

        $I->sendGET('talks');

        $I->seeResponseIsJson();

        $I->seeResponseCodeIs(404);
    }

    public function tryCreateTalkWithSuccess(ApiTester $I)
    {
        $I->wantTo('test create Talk, with success');

        $I->haveHttpHeader('content-type', 'application/json');

        $I->sendPOST('talk', [
            'title'=>'Teste com CodeCeption',
            'description'=>'Testes automatizados'
        ]);

        $I->seeResponseIsJson();

        $I->seeResponseCodeIs(201);
    }

    public function tryCreateTalkSameParamWithError(ApiTester $I)
    {
        $I->wantTo('test create talk same params, with error');

        $I->haveHttpHeader('content-type', 'application/json');

        $I->sendPOST('talk', [
            'title'=>'Teste com CodeCeption',
            'description'=>'Testes automatizados'
        ]);

        $I->seeResponseIsJson();

        $I->seeResponseCodeIs(422);
    }

    public function tryGetAllTalkWithSuccess(ApiTester $I)
    {
        $I->wantTo('test get all talks, with success');

        $I->haveHttpHeader('content-type', 'application/json');

        $I->sendGET('talks');

        $I->seeResponseIsJson();

        $I->seeResponseCodeIs(200);
    }


    public function tryGetOneTalkByIdWithSuccess(ApiTester $I)
    {
        $I->wantTo('test get one talk by id, with success');

        $I->haveHttpHeader('content-type', 'application/json');

        $I->sendGET('talk/1');

        $I->seeResponseIsJson();

        $I->seeResponseCodeIs(200);
    }

    public function tryGetOneTalkByIdWithStringWithError(ApiTester $I)
    {
        $I->wantTo('test get one talk by id with string, with error');

        $I->haveHttpHeader('content-type', 'application/json');

        $I->sendGET('talk/lorem');

        $I->seeResponseIsJson();

        $I->seeResponseCodeIs(422);
    }

    public function tryGetOneTalkNonExistentWithError(ApiTester $I)
    {
        $I->wantTo('test get one talk by id non existent, with error');

        $I->haveHttpHeader('content-type', 'application/json');

        $I->sendGET('talk/99999');

        $I->seeResponseIsJson();

        $I->seeResponseCodeIs(404);
    }
}
