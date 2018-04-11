<?php
/**
 * Bookmarks repository.
 */
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use AppBundle\Entity\Bookmark;

/**
 * Class BookmarksRepository
 * @package AppBundle\Repository
 */
class BookmarksRepository extends EntityRepository
{
    /**
     * Gets all records paginated.
     *
     * @param int $page Page number
     *
     * @return \Pagerfanta\Pagerfanta Result
     */
    public function findAllPaginated($page = 1)
    {
        $paginator = new Pagerfanta(new DoctrineORMAdapter($this->queryAll(), false));
        $paginator->setMaxPerPage(Bookmark::NUM_ITEMS);
        $paginator->setCurrentPage($page);

        return $paginator;
    }

    /**
     * Query all entities.
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    protected function queryAll()
    {
        return $this->createQueryBuilder('bookmark');
    }

    /**
     * Save entity.
     *
     * @param \AppBundle\Entity\Bookmark $bookmark Bookmark entity
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Bookmark $bookmark)
    {
        $this->_em->persist($bookmark);
        $this->_em->flush($bookmark);
    }

    /**
     * Delete entity.
     *
     * @param \AppBundle\Entity\Bookmark $bookmark Bookmark entity
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function delete(Bookmark $bookmark)
    {
        $this->_em->remove($bookmark);
        $this->_em->flush();
    }
}
