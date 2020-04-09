<?php

namespace Quiz\Controller;

use Exception;
use Framework\Contracts\RendererInterface;
use Framework\Contracts\SessionInterface;
use Framework\Controller\AbstractController;
use Framework\Http\Request;
use Framework\Http\Response;
use Quiz\Entity\QuestionTemplate;
use Quiz\Factory\QuestionTemplateFactory;
use Quiz\Service\PaginatorService;
use Quiz\Service\QuestionTemplateService;
use Quiz\Service\QuizTemplateService;
use ReflectionException;

/**
 * Class QuestionTemplateController
 * @package Quiz\Controller
 */
class QuestionTemplateController extends AbstractController
{
    const LISTING_PAGE = 'admin-questions-listing.phtml';

    /**
     * @var QuizTemplateService
     */
    private $quizTemplateService;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var QuestionTemplateService
     */
    private $questionTemplateService;

    /**
     * @var QuestionTemplateFactory
     */
    private $questionTemplateFactory;

    /**
     * QuestionTemplateController constructor.
     * @param RendererInterface $renderer
     * @param QuestionTemplateService $service
     * @param SessionInterface $session
     * @param QuizTemplateService $boundedService
     * @param QuestionTemplateFactory $factory
     */
    public function __construct(
        RendererInterface $renderer,
        QuestionTemplateService $service,
        SessionInterface $session,
        QuizTemplateService $boundedService,
        QuestionTemplateFactory $factory
    ) {
        parent::__construct($renderer);
        $this->quizTemplateService = $boundedService;
        $this->session = $session;
        $this->questionTemplateService = $service;
        $this->questionTemplateFactory = $factory;
    }


    /**
     * @param Request $request
     * @param array $attributes
     * @return Response
     * @throws Exception
     */
    public function add(Request $request, array $attributes): Response
    {
        $questionTemplate = $this->questionTemplateFactory->createFromRequest($request);
        $this->questionTemplateService->add($questionTemplate);

        return $this->createResponse($request, "301", "Location", ["/dashboard/questions"]);
    }

    /**
     * @param Request $request
     * @param array $attributes
     * @return Response
     * @throws ReflectionException
     */
    public function update(Request $request, array $attributes): Response
    {
        $questionTemplate = $this->questionTemplateFactory->createFromRequest($request);
        $questionTemplate->setId($attributes["id"]);
        $this->questionTemplateService->update($questionTemplate);

        return $this->createResponse($request, "301", "Location", ["/dashboard/questions"]);
    }

    /**
     * @param Request $request
     * @param array $attributes
     * @return Response
     */
    public function delete(Request $request, array $attributes): Response
    {
        $this->questionTemplateService->deleteById($attributes["id"]);

        return $this->createResponse($request, "301", "Location", ["/dashboard/questions"]);
    }

    /**
     * @param Request $request
     * @param array $attributes
     * @return Response
     */
    public function getAll(Request $request, array $attributes): Response
    {
        $parameters = $request->getParameters();
        $page = $parameters["page"] ?? 1;
        $numberOfQuestions = $this->questionTemplateService->getCount();
        $paginator = new PaginatorService($numberOfQuestions, $page);
        $questionTemplates = $this->questionTemplateService->getAll($paginator->getResultsPerPage(), $page);

        return $this->renderer->renderView(
            self::LISTING_PAGE,
            [
                "questions" => $questionTemplates,
                "paginator" => $paginator,
            ]
        );
    }

    /**
     * @param Request $request
     * @param array $attributes
     * @return Response
     */

    public function showEditQuestionPage(Request $request, array $attributes): Response
    {
        $question = $this->questionTemplateService->getQuestionDetails($attributes["id"]);

        return $this->renderer->renderView(
            "admin-question-details.phtml",
            [
                "question" => $question
            ]);
    }

    /**
     * @param Request $request
     * @param array $attributes
     * @return Response
     */

    public function showNewQuestionPage(Request $request, array $attributes): Response
    {
        $question = new QuestionTemplate("", "", "");
        return $this->renderer->renderView(
            "admin-question-details.phtml",
            [
                "question" => $question
            ]);
    }
}