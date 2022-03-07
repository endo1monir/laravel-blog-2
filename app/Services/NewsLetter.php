<?php
namespace App\Services;
class NewsLetter{
    public function subscribe(string $email,string $list=null){
        $list??=config('services.mailchimp.lists.subscribers');

        $reesponse=$this->client()->lists->addListMember(config('services.mailchimp.lists.subscribers'),[
            "email_address" => request('email'),
            "status" => "subscribed",
    ]);
    }
    protected function client(){
        $mailchimp = new \MailchimpMarketing\ApiClient();
        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us14'
        ]);
        return $mailchimp;
    }
}

