<?php

declare(strict_types=1);

namespace App\Modules\Approval\Api\Events;

use App\Domain\Enums\StatusEnum;
use App\Modules\Approval\Api\Dto\ApprovalDto;
use App\Models\Invoices;

final class EntityApproved
{
    public function __construct(
        public ApprovalDto $approvalDto
    ) {
        $this->Handle();
    }

    private function Handle()
    {
        // Access the StatusEnum class
        $statusEnum = StatusEnum::class;

        // Access the $approvalDto property
        $dto = $this->approvalDto;

        // Access the $status property of ApprovalDto
        $status = $dto->status;

        // Use the StatusEnum with the $status property
        $statusValue = $statusEnum::tryFrom($status->value);

        echo $statusValu;
    }
}
