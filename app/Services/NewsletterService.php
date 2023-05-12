<?php

namespace App\Services;

interface NewsletterService
{
    function subscribe(string $email, string $list);
}
