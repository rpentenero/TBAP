<?php

namespace CDR\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CDRUserBundle extends Bundle
{
    public function getParent()
  {
    return 'FOSUserBundle';
  }
}
