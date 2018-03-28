<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use AppBundle\Entity\Tag;

/**
 * Class TagsRepository
 * @package AppBundle\Repository
 */
class TagsRepository extends EntityRepository
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
        $paginator->setMaxPerPage(Tag::NUM_ITEMS);
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
        return $this->createQueryBuilder('tag');
    }

    /**
     * Save entity.
     *
     * @param \AppBundle\Entity\Tag $tag Tag entity
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Tag $tag)
    {
        $this->_em->persist($tag);
        $this->_em->flush($tag);
    }

    /**
     * Delete entity.
     *
     * @param \AppBundle\Entity\Tag $tag Tag entity
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function delete(Tag $tag)
    {
        $this->_em->remove($tag);
        $this->_em->flush();
    }
}
