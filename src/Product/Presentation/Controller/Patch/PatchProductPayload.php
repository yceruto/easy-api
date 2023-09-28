<?php

namespace App\Product\Presentation\Controller\Patch;

use App\Product\Domain\Model\ProductStatus;
use App\Product\Domain\Provider\ProductGroupsProvider;
use App\Shared\Domain\Decider\MoneyFeatureDecider;
use App\Shared\Presentation\OpenApi\Attributes\Property;
use App\Shared\Presentation\OpenApi\Attributes\Schema;
use App\Shared\Presentation\Request\Model\MoneyPayload;

#[Schema(groupsProvider: ProductGroupsProvider::class)]
class PatchProductPayload
{
    #[Property(minLength: 3, groups: ['Default'])]
    public ?string $name = null;

    #[Property(groups: ['Money'], decider: MoneyFeatureDecider::class)]
    public ?MoneyPayload $price = null;

    #[Property(enum: ProductStatus::class, groups: ['Default'])]
    public ?string $status = null;
}
