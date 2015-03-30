<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\Framework\Controller;

use Magento\Framework\App\ResponseInterface;

abstract class AbstractResult implements ResultInterface
{
    /**
     * @var int
     */
    protected $httpResponseCode;

    /**
     * @var array
     */
    protected $headers = [];

    /**
     * Set response code to result
     *
     * @param int $httpCode
     * @return $this
     */
    public function setHttpResponseCode($httpCode)
    {
        $this->httpResponseCode = $httpCode;
        return $this;
    }

    /**
     * Set a header
     *
     * If $replace is true, replaces any headers already defined with that
     * $name.
     *
     * @param string $name
     * @param string $value
     * @param boolean $replace
     * @return $this
     */
    public function setHeader($name, $value, $replace = false)
    {
        $this->headers[] = [
            'name'    => $name,
            'value'   => $value,
            'replace' => $replace,
        ];
        return $this;
    }

    /**
     * @param ResponseInterface $response
     * @return $this
     */
    protected function applyHttpHeaders(ResponseInterface $response)
    {
        if (!empty($this->httpResponseCode)) {
            $response->setHttpResponseCode($this->httpResponseCode);
        }

        if (!empty($this->headers)) {
            foreach ($this->headers as $headerData) {
                $response->setHeader($headerData['name'], $headerData['value'], $headerData['replace']);
            }
        }
        return $this;
    }

    /**
     * @param ResponseInterface $response
     * @return $this
     */
    abstract protected function render(ResponseInterface $response);

    /**
     * Render content
     *
     * @param ResponseInterface $response
     * @return $this
     */
    public function renderResult(ResponseInterface $response)
    {
        $this->applyHttpHeaders($response);
        return $this->render($response);
    }
}
