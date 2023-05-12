<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpNewsletterService implements NewsletterService
{
    function __construct(protected ApiClient $client)
    {
        // more cleaner: determine your list here. is better
    }

    function subscribe($email, $list = null){

             $this->client->lists->addListMember($this->lastestPostsList($list), [
                "email_address" => $email,
                "status" => "subscribed",
            ]);
    }

    function unsubscribe($email, $list = null){
        //$this->client->lists->deleteListMember($this->lastestPostsList($list),);
    }

    function lastestPostsList($list = null){
        $list ??= config('services.mailchimp.lists.lastestposts');
        return $list;
    }

}
