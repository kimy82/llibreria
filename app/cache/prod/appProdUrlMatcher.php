<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/admin/secured')) {
            // acme_store_homepage
            if ($pathinfo === '/admin/secured/menu') {
                return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\DefaultController::indexAction',  '_route' => 'acme_store_homepage',);
            }

            if (0 === strpos($pathinfo, '/admin/secured/noticia')) {
                // acme_noticia
                if ($pathinfo === '/admin/secured/noticia') {
                    return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\NoticiaController::indexAction',  '_route' => 'acme_noticia',);
                }

                if (0 === strpos($pathinfo, '/admin/secured/noticia/noticia_')) {
                    // acme_pre_store_noticia
                    if ($pathinfo === '/admin/secured/noticia/noticia_save') {
                        return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\NoticiaController::precreateAction',  '_route' => 'acme_pre_store_noticia',);
                    }

                    // store_new_noticia
                    if ($pathinfo === '/admin/secured/noticia/noticia_new_save') {
                        return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\NoticiaController::saveNoticiaAction',  '_route' => 'store_new_noticia',);
                    }

                    // llistat_store_noticia
                    if (0 === strpos($pathinfo, '/admin/secured/noticia/noticia_llistat') && preg_match('#^/admin/secured/noticia/noticia_llistat/(?P<orderBy>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'llistat_store_noticia')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\NoticiaController::listAction',));
                    }

                }

                // edit_noticia
                if (0 === strpos($pathinfo, '/admin/secured/noticia/edit') && preg_match('#^/admin/secured/noticia/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit_noticia')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\NoticiaController::editAction',));
                }

                // update_noticia
                if (0 === strpos($pathinfo, '/admin/secured/noticia/update') && preg_match('#^/admin/secured/noticia/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_noticia')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\NoticiaController::updateNoticiaAction',));
                }

                // delete_noticia
                if (0 === strpos($pathinfo, '/admin/secured/noticia/delete') && preg_match('#^/admin/secured/noticia/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_noticia')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\NoticiaController::deleteNoticiaAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/secured/llibre')) {
                // acme_llibre
                if ($pathinfo === '/admin/secured/llibre') {
                    return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\LlibreController::indexAction',  '_route' => 'acme_llibre',);
                }

                if (0 === strpos($pathinfo, '/admin/secured/llibre/llibre_')) {
                    // acme_pre_store_llibre
                    if ($pathinfo === '/admin/secured/llibre/llibre_save') {
                        return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\LlibreController::precreateAction',  '_route' => 'acme_pre_store_llibre',);
                    }

                    // llistat_store_llibre
                    if (0 === strpos($pathinfo, '/admin/secured/llibre/llibre_llistat') && preg_match('#^/admin/secured/llibre/llibre_llistat/(?P<orderBy>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'llistat_store_llibre')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\LlibreController::listAction',));
                    }

                    // store_new_llibre
                    if ($pathinfo === '/admin/secured/llibre/llibre_new_save') {
                        return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\LlibreController::saveLlibreAction',  '_route' => 'store_new_llibre',);
                    }

                }

                // edit_llibre
                if (0 === strpos($pathinfo, '/admin/secured/llibre/edit') && preg_match('#^/admin/secured/llibre/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit_llibre')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\LlibreController::editAction',));
                }

                // update_llibre
                if (0 === strpos($pathinfo, '/admin/secured/llibre/update') && preg_match('#^/admin/secured/llibre/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_llibre')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\LlibreController::updateLlibreAction',));
                }

                // delete_llibre
                if (0 === strpos($pathinfo, '/admin/secured/llibre/delete') && preg_match('#^/admin/secured/llibre/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_llibre')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\LlibreController::deleteLlibreAction',));
                }

            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
