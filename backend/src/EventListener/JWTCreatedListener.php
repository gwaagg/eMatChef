<?php
// src/EventListener/JWTCreatedListener.php

namespace App\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use App\Entity\User;

class JWTCreatedListener
{
    public function onJWTCreated(JWTCreatedEvent $event): void
    {
        /** @var User $user */
        $user = $event->getUser();

        $payload = $event->getData();

        // orgId und orgCode aus der verknüpften Organisation anhängen
        $organisation = $user->getOrganisation();
        if ($organisation) {
            $payload['orgId'] = $organisation->getId();
            $payload['orgCode'] = $organisation->getOrgCode();
        }

        $event->setData($payload);
    }
}
