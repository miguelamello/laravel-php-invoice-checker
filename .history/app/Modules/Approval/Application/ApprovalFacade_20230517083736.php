<?php

declare(strict_types=1);

namespace App\Modules\Approval\Application;

use App\Domain\Enums\StatusEnum;
use App\Modules\Approval\Api\ApprovalFacadeInterface;
use App\Modules\Approval\Api\Dto\ApprovalDto;
use App\Modules\Approval\Api\Events\EntityApproved;
use App\Modules\Approval\Api\Events\EntityRejected;
use Illuminate\Contracts\Events\Dispatcher;
use LogicException;

final class ApprovalFacade implements ApprovalFacadeInterface
{
    public function __construct(
        private Dispatcher $dispatcher
    ) {
    }

    public function approve(ApprovalDto $dto): boolean
    {
        $this->validate($dto);
        $this->dispatcher->dispatch(new EntityApproved($dto));
        return true;
    }

    public function reject(ApprovalDto $dto): boolean
    {
        $this->validate($dto);
        $this->dispatcher->dispatch(new EntityRejected($dto));
        return false;
    }

    private function validate(ApprovalDto $dto): void
    {
        if (StatusEnum::DRAFT !== StatusEnum::tryFrom($dto->status->value)) {
            throw new LogicException('Approval status is already assigned');
        }
    }
}
