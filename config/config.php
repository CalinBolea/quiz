<?php

use Framework\Dispatcher\Dispatcher;
use Framework\Router\Router;

return [

    Dispatcher::CONFIG_KEY_DISPATCHER => [Dispatcher::CONFIG_KEY_NAMESPACE => 'Quiz\Controller',
        Dispatcher::CONFIG_KEY_SUFFIX => 'Controller'],
    Router::CONFIG_KEY_ROUTER => [
        'user_controller_delete' =>
            [
                Router::CONFIG_KEY_PATH => '/dashboard/users/delete/(?<id>\d+)',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'User',
                Router::CONFIG_KEY_ACTION => 'delete',
                Router::CONFIG_KEY_METHOD => 'GET'
            ],
        'user_controller_userDetailsUpdate' =>
            [
                Router::CONFIG_KEY_PATH => '/dashboard/users/update/(?<id>\d+)',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'User',
                Router::CONFIG_KEY_ACTION => 'userDetails',
                Router::CONFIG_KEY_METHOD => 'GET'
            ],
        'user_controller_userDetailsAdd' =>
            [
                Router::CONFIG_KEY_PATH => '/dashboard/users/add',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'User',
                Router::CONFIG_KEY_ACTION => 'userView',
                Router::CONFIG_KEY_METHOD => 'GET'
            ],
        'user_controller_add' =>
            [
                Router::CONFIG_KEY_PATH => '/dashboard/users/add',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'User',
                Router::CONFIG_KEY_ACTION => 'add',
                Router::CONFIG_KEY_METHOD => 'POST'
            ],
        'user_controller_update' =>
            [
                Router::CONFIG_KEY_PATH => '/dashboard/users/update/(?<id>\d+)',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'User',
                Router::CONFIG_KEY_ACTION => 'update',
                Router::CONFIG_KEY_METHOD => 'POST'
            ],
        'user_controller_users_getAll' =>
            [
                Router::CONFIG_KEY_PATH => '/dashboard/users',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'User',
                Router::CONFIG_KEY_ACTION => 'getAll',
                Router::CONFIG_KEY_METHOD => 'GET'
            ],
        'question_templates_controller_delete' =>
            [
                Router::CONFIG_KEY_PATH => '/dashboard/questions/delete/(?<id>\d+)',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'QuestionTemplate',
                Router::CONFIG_KEY_ACTION => 'delete',
                Router::CONFIG_KEY_METHOD => 'GET'
            ],
        'question_templates_controller_DetailsAdd' =>
            [
                Router::CONFIG_KEY_PATH => '/dashboard/questions/add',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'QuestionTemplate',
                Router::CONFIG_KEY_ACTION => 'questionDetails',
                Router::CONFIG_KEY_METHOD => 'GET'
            ],
        'question_templates_controller_DetailsUpdate' =>
            [
                Router::CONFIG_KEY_PATH => '/dashboard/questions/update/(?<id>\d+)',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'QuestionTemplate',
                Router::CONFIG_KEY_ACTION => 'questionDetails',
                Router::CONFIG_KEY_METHOD => 'GET'
            ],
        'question_templates_controller_update' =>
            [
                Router::CONFIG_KEY_PATH => '/dashboard/questions/update/(?<id>\d+)',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'QuestionTemplate',
                Router::CONFIG_KEY_ACTION => 'add',
                Router::CONFIG_KEY_METHOD => 'POST'
            ],
        'question_templates_controller_add' =>
            [
                Router::CONFIG_KEY_PATH => '/dashboard/questions/add',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'QuestionTemplate',
                Router::CONFIG_KEY_ACTION => 'add',
                Router::CONFIG_KEY_METHOD => 'POST'
            ],
        'question_templates_controller_getAll' =>
            [
                Router::CONFIG_KEY_PATH => '/dashboard/questions',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'QuestionTemplate',
                Router::CONFIG_KEY_ACTION => 'getAll',
                Router::CONFIG_KEY_METHOD => 'GET'
            ],
        'question_instance_controller_instanceQuestions' =>
            [
                Router::CONFIG_KEY_PATH => '/homepage/quiz/instance',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'QuestionInstance',
                Router::CONFIG_KEY_ACTION => 'instanceQuestions',
                Router::CONFIG_KEY_METHOD => 'GET'
            ],
        'answer_instance_controller_displayQuestion' =>
            [
                Router::CONFIG_KEY_PATH => '/homepage/quiz/questions',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'QuestionInstance',
                Router::CONFIG_KEY_ACTION => 'displayQuestion',
                Router::CONFIG_KEY_METHOD => 'GET'
            ],
        'answer_instance_controller_add' =>
            [
                Router::CONFIG_KEY_PATH => '/homepage/quiz/questions',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'AnswerInstance',
                Router::CONFIG_KEY_ACTION => 'add',
                Router::CONFIG_KEY_METHOD => 'POST'
            ],
        'quiz_templates_controller_users_getAll' =>
            [
                Router::CONFIG_KEY_PATH => '/dashboard/quizzes',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'QuizTemplate',
                Router::CONFIG_KEY_ACTION => 'getAll',
                Router::CONFIG_KEY_METHOD => 'GET'
            ],
        'quiz_templates_controller_userDetailsAdd' =>
            [
                Router::CONFIG_KEY_PATH => '/dashboard/quizzes/add',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'QuizTemplate',
                Router::CONFIG_KEY_ACTION => 'quizDetails',
                Router::CONFIG_KEY_METHOD => 'GET'
            ],
        'quiz_templates_controller_userDetailsUpdate' =>
            [
                Router::CONFIG_KEY_PATH => '/dashboard/quizzes/update/(?<id>\d+)',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'QuizTemplate',
                Router::CONFIG_KEY_ACTION => 'quizDetails',
                Router::CONFIG_KEY_METHOD => 'GET'
            ],
        'quiz_templates_controller_add' =>
            [
                Router::CONFIG_KEY_PATH => '/dashboard/quizzes/add',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'QuizTemplate',
                Router::CONFIG_KEY_ACTION => 'add',
                Router::CONFIG_KEY_METHOD => 'POST'
            ],
        'quiz_templates_controller_update' =>
            [
                Router::CONFIG_KEY_PATH => '/dashboard/quizzes/update/(?<id>\d+)',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'QuizTemplate',
                Router::CONFIG_KEY_ACTION => 'add',
                Router::CONFIG_KEY_METHOD => 'POST'
            ],
        'quiz_templates_controller_delete' =>
            [
                Router::CONFIG_KEY_PATH => '/dashboard/quizzes/delete/(?<id>\d+)',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'QuizTemplate',
                Router::CONFIG_KEY_ACTION => 'delete',
                Router::CONFIG_KEY_METHOD => 'GET'
            ],
        'quiz_instance_controller_instance' =>
            [
                Router::CONFIG_KEY_PATH => '/homepage/quiz/questions',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'QuestionInstance',
                Router::CONFIG_KEY_ACTION => 'instance',
                Router::CONFIG_KEY_METHOD => 'GET'
            ],
        'quiz_instance_controller_quizStart' =>
            [
                Router::CONFIG_KEY_PATH => '/homepage/quiz/(?<quizTemplateId>\d+)',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'QuizInstance',
                Router::CONFIG_KEY_ACTION => 'getQuiz',
                Router::CONFIG_KEY_METHOD => 'GET'
            ],
        'quiz_instance_controller_save' =>
            [
                Router::CONFIG_KEY_PATH => '/homepage/save/results',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'QuizInstance',
                Router::CONFIG_KEY_ACTION => 'save',
                Router::CONFIG_KEY_METHOD => 'POST'
            ],
        'login_controller_displayLogin' =>
            [
                Router::CONFIG_KEY_PATH => '/',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'Login',
                Router::CONFIG_KEY_ACTION => 'displayLogin',
                Router::CONFIG_KEY_METHOD => 'GET'
            ],
        'login_controller_login' =>
            [
                Router::CONFIG_KEY_PATH => '/login',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'Login',
                Router::CONFIG_KEY_ACTION => 'login',
                Router::CONFIG_KEY_METHOD => 'POST'
            ],
        'login_controller_logout' =>
            [
                Router::CONFIG_KEY_PATH => '/logout',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'Login',
                Router::CONFIG_KEY_ACTION => 'logout',
                Router::CONFIG_KEY_METHOD => 'GET'
            ],
        'admin_controller_dashboard' =>
            [
                Router::CONFIG_KEY_PATH => '/dashboard',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'Admin',
                Router::CONFIG_KEY_ACTION => 'showDashboard',
                Router::CONFIG_KEY_METHOD => 'GET'
            ],
        'candidate_controller_homepage' =>
            [
                Router::CONFIG_KEY_PATH => '/homepage',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'Candidate',
                Router::CONFIG_KEY_ACTION => 'showHomepage',
                Router::CONFIG_KEY_METHOD => 'GET'
            ],
        'candidate_controller_success' =>
            [
                Router::CONFIG_KEY_PATH => '/homepage/success',
                Router::CONFIG_KEY_CONTROLLER_NAME => 'Candidate',
                Router::CONFIG_KEY_ACTION => 'success',
                Router::CONFIG_KEY_METHOD => 'GET'
            ],

    ]
];