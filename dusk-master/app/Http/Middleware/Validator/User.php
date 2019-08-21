<?php

namespace App\Http\Middleware\Validator;

use Psr\Http\Message\ServerRequestInterface;

class User extends ValidatesRequests
{
    /**
     * {@inheritdoc}
     */
    public function rules(ServerRequestInterface $request)
    {
        switch ($request->getMethod()) {
            case 'POST':
                return [
                    'id'        => 'required', //|unique:lead_source,lead_type',
                    'username'  => 'required',
                    'email'     => 'required'
                ];

            case 'PUT':
            case 'PATCH':
                $id = $request->getAttribute('route')->getArgument('id');

                return [
                    //'leadType'       => 'filled|unique:lead_source,lead_type,'.$id.',uid',
                    'username'      => 'filled',
                    'email'         => 'filled'
                ];

            default:
                return [];
        }
    }
}