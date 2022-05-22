<?php
namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpNewsLetter implements Newsletter{
    public function __construct(protected ApiClient $client)
    {

    }
    public function subscribe(string $email,string $list=null){
        $list??=config('services.mailchimp.lists.subscribers');

        $reesponse=$this->client->lists->addListMember(config('services.mailchimp.lists.subscribers'),[
            "email_address" => request('email'),
            "status" => "subscribed",
    ]);
    }

}

