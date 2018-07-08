<?php

namespace Railken\LaraOre\Catalogue\Attributes\Enabled;

use Railken\Laravel\Manager\Attributes\BaseAttribute;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Tokens;
use Respect\Validation\Validator as v;

class EnabledAttribute extends BaseAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'enabled';

    /**
     * Is the attribute required
     * This will throw not_defined exception for non defined value and non existent model.
     *
     * @var bool
     */
    protected $required = false;

    /**
     * Is the attribute unique.
     *
     * @var bool
     */
    protected $unique = false;

    /**
     * List of all exceptions used in validation.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_DEFINED    => Exceptions\CatalogueEnabledNotDefinedException::class,
        Tokens::NOT_VALID      => Exceptions\CatalogueEnabledNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\CatalogueEnabledNotAuthorizedException::class,
        Tokens::NOT_UNIQUE     => Exceptions\CatalogueEnabledNotUniqueException::class,
    ];

    /**
     * List of all permissions.
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'catalogue.attributes.enabled.fill',
        Tokens::PERMISSION_SHOW => 'catalogue.attributes.enabled.show',
    ];

    /**
     * Is a value valid ?
     *
     * @param EntityContract $entity
     * @param mixed          $value
     *
     * @return bool
     */
    public function valid(EntityContract $entity, $value)
    {
        return $value === 1 || $value === 0 || $value === true || $value === false;
    }
}