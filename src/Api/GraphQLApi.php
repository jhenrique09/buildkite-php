<?php

declare(strict_types=1);

namespace bbaga\BuildkiteApi\Api;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;

final class GraphQLApi extends AbstractApi implements GraphQLApiInterface
{
    public const BASE_URI = 'https://graphql.buildkite.com/v1/';

    public function post(string $query = '{}', string $variables = '{}'): ResponseInterface
    {
        $request = (new Request('POST', $this->uri))
            ->withBody($this->streamFactory->createStream(json_encode(['query' => $query, 'variables' => $variables])));

        return $this->client->sendRequest($this->addHeaders($request));
    }
}
