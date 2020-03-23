<?php


namespace Quiz\Controller;


use Framework\Contracts\RendererInterface;
use Framework\Contracts\SessionInterface;
use Framework\Controller\AbstractController;
use Framework\Http\Request;
use Framework\Http\Response;
use Quiz\Service\AdminService;

class AdminController extends AbstractController
{
    /**
     * @var SessionInterface
     */
    protected $session;

    /**
     * @var AdminService
     */
    protected $service;

    /**
     * AdminController constructor.
     * @param RendererInterface $renderer
     * @param AdminService $service
     * @param SessionInterface $session
     */
    public function __construct(
        RendererInterface $renderer,
        AdminService $service,
        SessionInterface $session
    ) {
        parent::__construct($renderer);
        $this->service = $service;
        $this->session = $session;
    }

    /**
     * @param Request $request
     * @param array $attributes
     * @return Response
     */
    public function showDashboard(Request $request, array $attributes): Response
    {
        $this->session->start();
        if(($this->session->get("name")) === null) {
            return $this->createResponse($request, "301", "Location", ["/"]);
        }

        return $this->renderer->renderView("admin-dashboard.html", $attributes);
    }
}