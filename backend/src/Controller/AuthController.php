<?php
// backend\src\Controller\AuthController.php
namespace App\Controller;

use Symfony\Bundle\SecurityBundle\Security;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class AuthController extends AbstractController
{
    #[Route('/api/token/refresh', name: 'api_token_refresh', methods: ['POST'])]
    public function refresh(JWTTokenManagerInterface $jwtManager, Security $security): JsonResponse
    {
        $user = $security->getUser();

        if (!$user) {
            return new JsonResponse(['error' => 'Unauthorized'], 401);
        }

        $newToken = $jwtManager->create($user);

        return new JsonResponse(['token' => $newToken]);
    }
    #[Route('/api/me', name: 'api_me', methods: ['GET'])]
    public function me(Security $security, NormalizerInterface $normalizer): JsonResponse
    {
        $user = $security->getUser();

        if (!$user) {
            return new JsonResponse(['error' => 'Unauthorized'], 401);
        }

        $data = $normalizer->normalize($user, null, ['groups' => ['user:read']]);

        return new JsonResponse(['user' => $data]);
    }
}
