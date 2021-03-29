<?php
// +----------------------------------------------------------------------
// | Created by linshan. 版权所有 @
// +----------------------------------------------------------------------
// | Copyright (c) 2020 All rights reserved.
// +----------------------------------------------------------------------
// | Technology changes the world . Accumulation makes people grow .
// +----------------------------------------------------------------------
// | Author: kaka梦很美 <1099013371@qq.com>
// +----------------------------------------------------------------------

namespace Raylin666\Elasticsearch;

use Raylin666\Guzzle\Contract\HandlerInterface;
use Raylin666\Guzzle\CoroutineHandler;
use Raylin666\Utils\Coroutine\Coroutine;

/**
 * Class Client
 * @package Raylin666\Elasticsearch
 */
class Client
{
    /**
     * @var HandlerInterface
     */
    protected $handler;

    /**
     * 连接池配置项
     * @var array
     */
    protected $poolOption = [];

    /**
     * Client constructor.
     */
    public function __construct()
    {
        $this->handler = new CoroutineHandler();
    }

    /**
     * 设置 GuzzleHttp\Client 处理器
     * @param HandlerInterface $handler
     * @return Client
     */
    public function setHandler(HandlerInterface $handler): self
    {
        $this->handler = $handler;
        return $this;
    }

    /**
     * 设置连接池配置项 [不设置将不开启连接池]
     * @param array $poolOption
     * @return Client
     */
    public function setPoolOption(array $poolOption): self
    {
        $this->poolOption = $poolOption;
        return $this;
    }

    /**
     * @return array
     */
    public function getPoolOption(): array
    {
        return $this->poolOption;
    }

    /**
     * 创建 GuzzleHttp\Client 客户端
     * @return ClientBuilder
     */
    public function create(): ClientBuilder
    {
        $clientBuilder = ClientBuilder::create();

        if (Coroutine::inCoroutine()) {
            $this->handler->setPoolOption($this->getPoolOption());
            $clientBuilder->setHandler($this->handler);
        }

        return $clientBuilder;
    }
}