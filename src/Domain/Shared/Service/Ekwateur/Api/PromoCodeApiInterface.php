<?php

declare(strict_types=1);

namespace App\Domain\Shared\Service\Ekwateur\Api;

use App\Domain\Shared\Service\Ekwateur\Search\EkwateurQueryBuilderInterface;
use App\Domain\Shared\Service\Ekwateur\Entity\OfferInterface;
use App\Domain\Shared\Service\Ekwateur\Entity\PromoCodeInterface;

interface PromoCodeApiInterface
{
    /**
     * @return \Iterator<PromoCodeInterface>
     **/
    public function list(EkwateurQueryBuilderInterface $query): \Iterator;
}
