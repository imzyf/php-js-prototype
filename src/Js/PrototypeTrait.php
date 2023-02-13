<?php

namespace App\Js;

trait PrototypeTrait
{
    /**
     * @var mixed
     */
    public $prototype = null;

    public $constructor = null;

    public static function jsNew($prototype = null, $constructor = null)
    {
        $self = new static();
        if (null !== $prototype) {
            $self->prototype = $prototype;
        }
        if (null !== $constructor) {
            $self->constructor = $constructor;
        }

        return $self;
    }

    /**
     * @return mixed
     *
     * @throws \Exception
     */
    public function __call($name, $arguments)
    {
        $prototype = $this->prototype;
        while (null !== $prototype) {
            if ($prototype->hasMethod($name)) {
                return call_user_func_array([$prototype, $name], $arguments);
            }

            $prototype = $prototype->prototype;
        }

        throw new \Exception('Calling unknown method: '.get_class($this)."::$name()");
    }

    public function __get($name)
    {
        $prototype = $this->prototype;
        while (null !== $prototype) {
            if (property_exists($prototype, $name)) {
                return $prototype->$name;
            }

            $prototype = $prototype->prototype;
        }

        throw new \Exception('Getting unknown property: '.get_class($this).'::'.$name);
    }

    public function __set($name, $value)
    {
    }

    public function __isset($name)
    {
    }

    public function hasMethod($name): bool
    {
        return method_exists($this, $name);
    }
}
