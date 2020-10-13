<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\App;
use Slim\Views\PhpRenderer;

use App\UserRepository;
use App\User;

return function (App $app) {
    /*
    $protectedMiddleware = function (Request $request, RequestHandler $handler) {
        if (isset($_SESSION['userId'])) {
            $repository = $this->get(UserRepository::class);

            $user = $repository->findById($_SESSION['userId']);

            $request->withAttribute('user', $user);
        }

        // Proceed
        return $handler->handle($request);
    };
    */

    $app->get('/', function (Request $request, Response $response) {
        $view = $this->get(PhpRenderer::class);
        return $view->render($response, "index.php");
    });

    $app->get('/about', function (Request $request, Response $response) {
        $view = $this->get(PhpRenderer::class);
        return $view->render($response, "about.php");
    });

    $app->get('/services', function (Request $request, Response $response) {
        $view = $this->get(PhpRenderer::class);
        return $view->render($response, "services.php");
    });

    $app->get('/login', function (Request $request, Response $response) {
        $isUserLoggedIn = isset($_SESSION['user_id']);

        if ($isUserLoggedIn) {
            // Redirect to the dashboard page
            $redirectUrl = $request->getQueryParams()["redirectUrl"] ?: "/utility";

            return $response
                ->withHeader('Location', $redirectUrl)
                ->withStatus(302);
        }

        $view = $this->get(PhpRenderer::class);
        return $view->render($response, "login.php");
    });

    $app->post('/login', function (Request $request, Response $response) {
        $params = (array) $request->getParsedBody();

        $username = $params['email'];
        $password = $params['password'];

        $repository = $this->get(UserRepository::class);

        $user = $repository->findByUsername($username);

        if (isset($user) && password_verify($password, $user->getPasswordHash())) {
            $redirectUrl = '/utility';

            // Storing user id to session object
            $_SESSION["user_id"] = $user->getId();

            // Login successful redirect to user's dashboard
            return $response
                ->withHeader('Location', $redirectUrl)
                ->withStatus(302);
        } else {
            $errors = [ "Wrong password!" ];

            // Show the login page and display errors
            $view = $this->get(PhpRenderer::class);
            return $view->render($response, "login.php", [ 
                'errors' => $errors
            ]);
        }

    });

    $app->post('/logout', function (Request $request, Response $response) {
        unset($_SESSION["user_id"]);

        $redirectUrl = "/";

        // Redirect to home page
        return $response
            ->withHeader('Location', $redirectUrl)
            ->withStatus(302);
    });

    $app->get('/register', function (Request $request, Response $response) {
        $view = $this->get(PhpRenderer::class);
        return $view->render($response, "register.php");
    });

    $app->post('/register', function (Request $request, Response $response) {
        $repository = $this->get(UserRepository::class);

        $params = (array) $request->getParsedBody();

        $firstName = $params['firstName'];
        $lastName = $params['lastName'];
        $email = $params['email'];
        $password = $params['password'];
        $passwordConfirmation = $params['confirm_pwd'];

        // TODO: Validate input

        $user = new User();
        $user->setUsername($email);
        $user->setPasswordHash(password_hash($password, PASSWORD_DEFAULT));
        $user->setFirstName($firstName);
        $user->setOtherNames($lastName);
        $user->setEmail($email);

        try {
            $repository->save($user);

            $_SESSION['user_id'] = $user->getId();

            // Redirect the user to the dashboard
            return $response
                ->withHeader('Location', '/utility')
                ->withStatus(302);
        } catch(Exception $ex) {
            $errors = [ $ex->getMessage() ]; //[ "Error occurred saving user" ];

            $view = $this->get(PhpRenderer::class);
            return $view->render($response, "register.php", [
                'errors' => $errors
            ]);
        }

        // Redirect to login page
        return $response
            ->withHeader('Location', '/login')
            ->withStatus(302);
    });

    $app->get('/utility', function (Request $request, Response $response) {
        //$user = $request->getAttribute('user');

        if (!isset($_SESSION['user_id'])) {
            // Redirect to the login page
            //$response = new Slim\Psr7\Response();
            return $response
                ->withHeader('Location', '/login?' . http_build_query([ "redirectUrl" => strval($request->getUri()) ]))
                ->withStatus(302);
        }

        $repository = $this->get(UserRepository::class);

        $user = $repository->findById($_SESSION['user_id']);

        $view = $this->get(PhpRenderer::class);
        return $view->render($response, "utility.php", [
            'user' => $user
        ]);
    }); //->add($protectedMiddleware);
};
