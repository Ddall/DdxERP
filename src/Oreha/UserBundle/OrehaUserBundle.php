<?php

namespace Oreha\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class OrehaUserBundle extends Bundle
{
    public function getParent() {
        return 'FOSUserBundle';
    }
}
