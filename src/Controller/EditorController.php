<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @Route("/")
 * @package App\Controller
 */
class EditorController extends Controller
{
    /**
     * @Route("/", name="editor_page")
     * @return Response
     */
    public function indexAction()
    {
        $projectDir = $this->getParameter('kernel.project_dir');
        $goDockerDir = "cd {$projectDir}/docker";

        exec("{$goDockerDir} && docker build -t my-python-app .");
        exec("{$goDockerDir} && 
        docker run -it --rm -v \"\$PWD\":/usr/src/myapp -w /usr/src/myapp my-python-app python ./hello.py",
            $response);

        return $this->render('/editor/editor.html.twig', [
            'python_response' => $response,
        ]);
    }
}