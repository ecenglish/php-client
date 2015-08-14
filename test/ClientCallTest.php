<?php

use EcEnglish\ApiClient as Client;
use EcEnglish\ApiClient\Contract;

class ClientCallTest extends PHPUnit_Framework_TestCase {

    public function testCanCallClient() {
        $opts = new Client\ApiClientOptions();
        $opts->BaseUrl = 'http://localhost:23121';
        $opts->ApiKey = 'U6rSbqQ8383:ApiKey1';

        $client = new Client\EcEnglishApiClient($opts);
        $msg = new Contract\TestConnectionRequest();
        $response = $client->Send($msg);
    }

    /** @expectedException Exception */
    public function testCanReportError() {
        $opts = new Client\ApiClientOptions();
        $opts->BaseUrl = 'http://localhost:23121';
        $opts->ApiKey = 'U6rSbqQ8383:ApiKey1';

        $client = new Client\EcEnglishApiClient($opts);
        $msg = new Contract\GelClasses();
        $msg->MinChangeSet = 'a';
        $msg->MaxChangeSet = 'b';
        $response = $client->Send($msg);
    }
}

?>
