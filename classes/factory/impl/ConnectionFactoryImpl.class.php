<?php

class ConnectionFactoryImpl implements ConnectionFactory
{

    public function get()
    {
        return ConnectionSingleton::get();
    }
}
