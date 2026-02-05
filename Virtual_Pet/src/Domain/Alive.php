<?php

namespace Domain;

enum Alive: string
{
    case ALIVE = 'alive';
    case DEAD = 'dead';
}