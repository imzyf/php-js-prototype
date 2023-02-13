<?php

namespace App\Js;

class JsObject
{
    use PrototypeTrait;

    protected function __construct()
    {
        $this->prototype = JsNull::jsNew(null, $this);
    }

    public function toString(): string
    {
        $constructor = $this->constructor;
        $kv = [];

        while (null !== $constructor) {
            $class = new \ReflectionClass($constructor);
            $properties = $class->getProperties();
            foreach ($properties as $prop) {
                $k = $prop->name;
                $kv[] = $k;
            }

            $constructor = $constructor->constructor;
        }

        return json_encode($kv);
    }

    public function valueOf()
    {
        $constructor = $this->constructor;
        $kv = [];

        while (null !== $constructor) {
            $class = new \ReflectionClass($constructor);
            $properties = $class->getProperties();
            foreach ($properties as $prop) {
                $k = $prop->name;
                $v = $constructor->$k;
                if (is_object($v)) {
                    continue;
                }
                if (is_null($v)) {
                    continue;
                }

                $kv[$k] = $v;
            }

            $constructor = $constructor->constructor;
        }

        return json_encode($kv);
    }

    public static function create()
    {
    }
}
