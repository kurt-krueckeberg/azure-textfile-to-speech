<?php
declare(strict_types=1);
namespace TranslationTools;

"azure"   =>   [ 'endpoint' => 'https://eastus.api.cognitive.microsoft.com/',
                 'region' => 'eastus',
                 'header' => ];
/*
The header is either:

* "Ocp-Apim-Subscription-Key: 4deaf89075834283a48745ae530dc9d5"
* "Bear your-authorization-bear-token" the bear toekn is obtained thru yet another Azure URL and REST API call.

*/
