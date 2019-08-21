<?php

namespace App\Http\Action\User;
use Dusk\Http\AbstractAction;

abstract class Action extends AbstractAction
{
    /**
     * Create a stream for an item
     *
     * @param mixed                                       $data
     * @param \Tobscure\JsonApi\AbstractSerializer|string $serializer
     *
     * @return \Psr\Http\Message\StreamInterface
     */
    protected function streamItem($data, $serializer)
    {
        return $this->createStream('item', $data, $serializer);
    }
    /**
     * Create a stream for an item
     *
     * @param mixed                                       $data
     * @param \Tobscure\JsonApi\AbstractSerializer|string $serializer
     *
     * @return \Psr\Http\Message\StreamInterface
     */
    protected function streamCollection($data, $serializer)
    {
        return $this->createStream('collection', $data, $serializer);
    }
    /**
     * Create a stream for an item
     *
     * @param string                                      $type
     * @param mixed                                       $data
     * @param \Tobscure\JsonApi\AbstractSerializer|string $serializer
     *
     * @return \Psr\Http\Message\StreamInterface
     */
    protected function createStream($type, $data, $serializer)
    {
        $serializer = is_string($serializer) ? new $serializer : $serializer;
        return $this->streamJson($this->{$type}($data, $serializer)->format());
    }
}