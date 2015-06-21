<?php

namespace DevJack\HipChatSDK;

use GuzzleHttp\Client;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Guzzle\GuzzleClient;

class HipChatClient {

    protected $config = [];

    protected static $defaultConfig = [
        'base_url' => 'https://api.hipchat.com/v2/',
        'client' => [
            'defaults' => [
                'headers' => [
                    'Authorization' => '',
                ]
            ],
        ],
    ];

    protected static $defaultRequestParams = [
        'uri' => null
    ];

    protected $spec = [];

    /**
     * @var GuzzleClient
     */
    protected $guzzleClient = null;

    public function __construct($config = [])
    {
        if ($config instanceof \Traversable || is_array($config)) {
            $this->config = array_merge(self::$defaultConfig, (array) $config);
        }

        $this->config['client']['defaults'] = $this->getClientDefaults();

        // $models will be deprecated with interface annotation reflection *soon*
        $models = [];
        $files = glob(__DIR__.'/spec/*.{php}', GLOB_BRACE);

        foreach ($files as $file) {
            $fileSpec = require($file);
            if (array_key_exists('spec', $fileSpec) && is_array($fileSpec['spec'])) {
                $this->spec = array_merge($this->spec, $fileSpec['spec']);
            }
            if (array_key_exists('models', $fileSpec) && is_array($fileSpec['models'])) {
                $models = array_merge($models, $fileSpec['models']);
            }
        }

        $descriptionSpec = [
            'baseUrl' => $this->config['base_url'],
            'operations' => $this->spec,
            'models' => $models
        ];
        $client = new Client($this->config['client']);

        $description = new Description($descriptionSpec);
        $this->guzzleClient = new GuzzleClient($client, $description);
    }

    public function getClientDefaults() {
        $config = $this->config;
        return [
            'headers' => [
                'Authorization'  => "Bearer {$config['token']}",
            ],
        ];
    }

    public function __call($method, $args)
    {
        if (! $this->guzzleClient->getDescription()->hasOperation($method)) {
            throw new \BadMethodCallException("The method $method does not exist within the SDK");
        }

        $passthroughArgs = (count($args) > 0) ? $args[0] : [];

        $entityClassName = $this->spec[$method]['responseModel'];
        $result = $this->guzzleClient->$method($passthroughArgs);
        return $result;
    }

}