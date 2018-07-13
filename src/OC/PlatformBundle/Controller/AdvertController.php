<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class AdvertController extends Controller
{
  public function index_hello_world_Action()
  {
    $content = $this->get('templating')->render('OCPlatformBundle:Advert:index.html.twig', array('nom' => 'winzou'));
    
    return new Response($content);
  }

  public function index_bye_world_Action()
  {
    $content = $this->get('templating')->render('OCPlatformBundle:Advert:index.html.1.twig', array('nom' => 'winzou'));
    
    return new Response($content);
  }

  public function viewAction($id, Request $request)
  {
    // On récupère notre paramètre tag
    $tag = $request->query->get('tag');

    return $this->render('OCPlatformBundle:Advert:view.html.twig', array(
      'id'  => $id,
      'tag' => $tag,
    ));
  }

  public function viewSlugAction($slug, $year, $format)
    {
        return new Response(
            "On pourrait afficher l'annonce correspondant au
            slug '".$slug."', créée en ".$year." et au format ".$format."."
        );
    }

    public function indexAction()
    {
        $url = $this->get('router')->generate(
            'oc_platform_view', // 1er argument : le nom de la route
            array('id' => 5),    // 2e argument : les valeurs des paramètres
            UrlGeneratorInterface::ABSOLUTE_URL
        );
        $content = $this->get('templating')->render('OCPlatformBundle:Advert:index.html.2.twig', array('url' => $url, 'id' => 5));
    
        return new Response($content);
    }
}