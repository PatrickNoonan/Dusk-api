<?php

namespace App\Http\Middleware\Validator;

use Dusk\Http\AbstractMiddleware;
use Illuminate\Validation\Factory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

abstract class ValidatesRequests extends AbstractMiddleware
{
    /**
     * @var \Illuminate\Validation\Factory
     */
    protected $factory;

    /**
     * @param \Illuminate\Validation\Factory $factory
     */
    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * Validation rules
     *
     * @return array
     */
    abstract public function rules(ServerRequestInterface $request);

    /**
     * {@inheritdoc}
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {
        $validator = $this->factory->make($request->getParsedBody() ?: [], $this->rules());

        if (! $validator->passes()) {
            $errors = $this->formatErrors($validator);

            return $response->withStatus(422)->withBody($this->streamJson($this->error($errors)->format()));
        }

        return $next($request, $response);
    }

    /**
     * Format the validation errors
     *
     * @param \Illuminate\Validation\Validator $validator
     *
     * @return array
     */
    protected function formatErrors($validator)
    {
        $errors = [];

        foreach ($validator->getMessageBag()->toArray() as $key => $messages) {
            foreach ($messages as $message) {
                $errors[] = [
                    'status' => 422,
                    'source' => $key,
                    'title'  => 'Validation Error',
                    'detail' => $message
                ];
            }
        }

        return $errors;
    }
}