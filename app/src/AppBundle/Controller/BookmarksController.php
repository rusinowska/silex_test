<?php
/**
 * Bookmarks controller.
 */
namespace AppBundle\Controller;

use AppBundle\Repository\BookmarksRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class BookmarksController.
 *
 * @package AppBundle\Controller
 *
 * @Route("/bookmarks")
 */
class BookmarksController extends Controller
{
    /**
     * Bookmarks repository.
     *
     * @var \AppBundle\Repository\BookmarksRepository|null Bookmark repository
     */
    protected $bookmarksRepository = null;

    /**
     * BookmarksController constructor.
     *
     * @param \AppBundle\Repository\BookmarksRepository $bookmarksRepository Bookmark repository
     */
    public function __construct(BookmarksRepository $bookmarksRepository)
    {
        $this->bookmarksRepository = $bookmarksRepository;
    }


    /**
     * Index action.
     *
     * @Route(
     *     "/",
     *     name="bookmarks_index",
     * )
     * @Method("GET")
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     */
    public function indexAction()
    {
        $bookmarks = $this->bookmarksRepository->findAll();

        return $this->render(
            'bookmarks/index.html.twig',
            ['bookmarks' => $bookmarks]
        );
    }
    /**
     * View action.
     *        class: AppBundle\Repository\BookmarksRepository
     * @Route(
     *     "/{id}",
     *     requirements={"id"="\d+"},
     *     name="bookmarks_view",
     * )
     * @Method("GET")
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     */
    public function viewAction($id)
    {
        $bookmarksRepository = new BookmarksRepository();
        $bookmark = $bookmarksRepository->findOneById($id);

        return $this->render(
            'bookmarks/view.html.twig',
            ['bookmark' => $bookmark]
        );
    }

}