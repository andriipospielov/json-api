<?php

namespace App\Controller;

use App\Repository\ActivityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ActivitiesController
 * @package App\Controller
 * @Route("/activities/")
 */
class ActivitiesController extends AbstractController
{
    /**
     * @var ActivityRepository
     */
    private $activityRepository;

    public function __construct(ActivityRepository $activityRepository)
    {
        $this->activityRepository = $activityRepository;
    }

    /**
     * @Route("/", name="activitiesIndex")
     * @return JsonResponse
     */
    public function index()
    {
        $activities = $this->activityRepository->findAllAsArray();

        return $this->json($activities);
    }

    /**
     * @Route("/popular/{isPopular}", name="activitiesPopular")
     * @param bool $isPopular
     * @return JsonResponse
     */
    public function popular(bool $isPopular)
    {
        $activities = $this->activityRepository->findByPopularity($isPopular);

        return $this->json($activities);
    }

    /**
     * FIXME: there was no relation between Category and Activity in DB dump, and I was to lazy to create it on my own. So, let it be as-is
     *
     * @Route("/category/{categoryName}", name="activitiesByCategory")
     * @param string categoryName
     * @return JsonResponse
     */
    public function category(string $categoryName)
    {
        $activities = $this->activityRepository->findByCategory($categoryName);

        return $this->json($activities);
    }

    /**
     * @Route("/maxprice/{maxPrice}", name="activitiesByMaxPrice")
     * @param float $maxPrice
     * @return JsonResponse
     */
    public function maxPrice(float $maxPrice)
    {
        $activities = $this->activityRepository->findByMaxPrice($maxPrice);

        return $this->json($activities);
    }
}
