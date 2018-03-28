<?php
/**
 * Tags controller.
 */
namespace AppBundle\Controller;

use AppBundle\Entity\Tag;
use AppBundle\Form\TagType;
use AppBundle\Repository\TagsRepository;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Class TagsController.
 *
 * @Route("/tags")
 */
class TagsController extends Controller
{
    /**
     * Tags repository.
     *
     * @var \AppBundle\Repository\TagsRepository|null $tagsRepository
     */
    protected $tagsRepository = null;

    /**
     * TagsController constructor.
     *
     * @param \AppBundle\Repository\TagsRepository $tagsRepository Tags repository
     */
    public function __construct(TagsRepository $tagsRepository)
    {
        $this->tagsRepository = $tagsRepository;
    }

    /**
     * Index action.
     *
     * @param integer $page Current page number
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     *
     * @Route(
     *     "/",
     *     defaults={"page": 1},
     *     name="tags_index",
     * )
     * @Route(
     *     "/page/{page}",
     *     requirements={"page": "[1-9]\d*"},
     *     name="tags_index_paginated",
     * )
     * @Method("GET")
     */
    public function indexAction($page)
    {
        $tags = $this->tagsRepository->findAllPaginated($page);

        return $this->render(
            'tags/index.html.twig',
            ['tags' => $tags]
        );
    }

    /**
     * View action.
     *
     * @param Tag $tag Tag entity
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     *
     * @Route(
     *     "/{id}",
     *     requirements={"id": "[1-9]\d*"},
     *     name="tags_view",
     * )
     * @Method("GET")
     */
    public function viewAction(Tag $tag)
    {
        return $this->render(
            'tags/view.html.twig',
            ['tag' => $tag]
        );
    }

    /**
     * Add action.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request HTTP Request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response HTTP Response
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route(
     *     "/add",
     *     name="tags_add",
     * )
     * @Method({"GET", "POST"})
     */
    public function addAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $tag = new Tag();
        $form = $this->createForm(TagType::class, $tag);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->tagsRepository->save($tag);
            $this->addFlash('success', 'message.created_successfully');

            return $this->redirectToRoute('tags_index');
        }

        return $this->render(
            'tags/add.html.twig',
            [
                'tag' => $tag,
                'form' => $form->createView(),
            ]
        );
    }
}
