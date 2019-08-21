<?php


namespace App\Data\Serializer;


use Tobscure\JsonApi\AbstractSerializer;

class UserSerializer extends AbstractSerializer
{
    protected $type = 'user';

    public function getId($model)
    {
        return $model->guid;
    }

    public function getAttributes($model, array $fields = null)
    {
        return [
            'username' => $model->username,
            'email' => $model->email
        ];
    }


}