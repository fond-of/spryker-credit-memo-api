<?php

namespace FondOfSpryker\Zed\CreditmemoApi\Business\Model\Validator;

use Generated\Shared\Transfer\ApiDataTransfer;

class CreditmemoApiValidator implements CreditmemoApiValidatorInterface
{
    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return array
     */
    public function validate(ApiDataTransfer $apiDataTransfer)
    {
        $data = $apiDataTransfer->getData();

        $errors = [];
        //$errors = $this->assertRequiredField($data, '', $errors);

        return $errors;
    }

    /**
     * @param array $data
     * @param string $field
     * @param array $errors
     *
     * @return array
     */
    protected function assertRequiredField(array $data, $field, array $errors)
    {
        if (!isset($data[$field]) || !array_key_exists($field, $data)) {
            $message = sprintf('Missing value for required field "%s"', $field);
            $errors[$field][] = $message;
        }

        return $errors;
    }
}
