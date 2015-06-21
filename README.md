# PHP HipChat SDK

HipChat SDK uses the v2 API and Guzzle-Services to make integration with HipChat a breeze.

## Installation

Add the SDK as a composer dependency.

```json
"require": {
    "devjack/hipchat-php-sdk": "dev-master",
}
```

Additionally (as required) add the repository for reference.
```json
"respository": [
    {
        "type": "vcs",
        "url": "git@github.com:devjack/hipchat-php-sdk.git"
    }
]
```

## Usage
```php
use DevJack\HipChatSDK\HipChatClient;

$client = new HipChatClient([
    'token' => getenv('HIPCHAT_TOKEN'),
]);

$room = $client->getRoomById( 12345 );
echo $room->getName();
```

### Tests
```bash
HIPCHAT_TOKEN="myHipChatToken" vendor/bin/phpunit -c tests/config/phpunit.xml
```

## Contributing

1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request :D

## Credits

[Jack Skinner](https://developerjack.com)

## License

The MIT License (MIT)

Copyright (c) 2015 [Jack Skinner](https://developerjack.com)