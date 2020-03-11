<?php


namespace Quiz\Service;


use Framework\Http\Request;
use Framework\Http\Response;
use Quiz\Entity\User;
use Quiz\Persistency\Repositories\UserRepository;
use ReallyOrm\Entity\EntityInterface;
use ReallyOrm\Test\Repository\RepositoryManager;

class UserService extends AbstractService
{

    const LISTING_PAGE = "admin-users-listing.phtml";
    /**
     * UserService constructor.
     * @param RepositoryManager $repositoryManager
     */
    public function __construct(RepositoryManager $repositoryManager)
    {
        parent::__construct($repositoryManager);
    }

    /**
     * @param int|null $entityId
     * @param array $entityData
     * @return bool //maybe make getRepository configurable************************************************
     * //maybe make getRepository configurable********************************************
     */
    public function add(?int $entityId, array $entityData): bool
    {
        $name = isset($entityData['name']) ? $entityData['name'] : '';
        $password = isset($entityData['password']) ?  $entityData['password'] : '';
        $role = isset($entityData['role']) ?  $entityData['role'] : '';

        $user = new User($name, $password, $role);
        $user->setId($entityId);

        /** @var UserRepository $repository */
        $repository =  $this->repositoryManager->getRepository(User::class);

        return $repository->insertOnDuplicateKeyUpdate($user);
    }

    /**
     * @param Request $request
     * @param array $attributes
     * @param int $limit
     * @return array
     */
    public function getAll(Request $request, array $attributes, int $limit): array
    {
        $entitiesNumber = $this->repositoryManager->getRepository(User::class)->getCount();

        $page = $request->getParameter("page") == null ? 1 : $request->getParameter("page");
        $offset = $limit * ($page - 1);

        $results = $this->repositoryManager->getRepository(User::class)->findBy([], [], $offset, $limit);

        return [
            "listingPage" => self::LISTING_PAGE,
            "users" => $results,
            "page" => $page,
            "entitiesNumber" => $entitiesNumber,
            "limit" => $limit
            ];
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function userDetails(array $attributes)
    {
        if (!empty($attributes)) {
            return $this->repositoryManager->getRepository(User::class)->find($attributes['id']);
        }

        return "";
    }


    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id)
    {
        return $this->repositoryManager->getRepository(User::class)->deleteById($id);
    }

}