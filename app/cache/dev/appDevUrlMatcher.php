<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

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

            if (0 === strpos($pathinfo, '/admin/secured/slider')) {
                // acme_slider
                if ($pathinfo === '/admin/secured/slider') {
                    return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\SliderController::indexAction',  '_route' => 'acme_slider',);
                }

                if (0 === strpos($pathinfo, '/admin/secured/slider/slider_')) {
                    // acme_pre_store_slider
                    if ($pathinfo === '/admin/secured/slider/slider_save') {
                        return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\SliderController::precreateAction',  '_route' => 'acme_pre_store_slider',);
                    }

                    // store_new_slider
                    if ($pathinfo === '/admin/secured/slider/slider_new_save') {
                        return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\SliderController::saveSliderAction',  '_route' => 'store_new_slider',);
                    }

                    // llistat_store_slider
                    if (0 === strpos($pathinfo, '/admin/secured/slider/slider_llistat') && preg_match('#^/admin/secured/slider/slider_llistat/(?P<orderBy>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'llistat_store_slider')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\SliderController::listAction',));
                    }

                }

                // edit_slider
                if (0 === strpos($pathinfo, '/admin/secured/slider/edit') && preg_match('#^/admin/secured/slider/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit_slider')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\SliderController::editAction',));
                }

                // update_slider
                if (0 === strpos($pathinfo, '/admin/secured/slider/update') && preg_match('#^/admin/secured/slider/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_slider')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\SliderController::updateSliderAction',));
                }

                // delete_slider
                if (0 === strpos($pathinfo, '/admin/secured/slider/delete') && preg_match('#^/admin/secured/slider/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_slider')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\SliderController::deleteSliderAction',));
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

            if (0 === strpos($pathinfo, '/admin/secured/agenda')) {
                // acme_agenda
                if ($pathinfo === '/admin/secured/agenda') {
                    return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\AgendaController::indexAction',  '_route' => 'acme_agenda',);
                }

                if (0 === strpos($pathinfo, '/admin/secured/agenda/agenda_')) {
                    // acme_pre_store_agenda
                    if ($pathinfo === '/admin/secured/agenda/agenda_save') {
                        return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\AgendaController::precreateAction',  '_route' => 'acme_pre_store_agenda',);
                    }

                    // store_new_agenda
                    if ($pathinfo === '/admin/secured/agenda/agenda_new_save') {
                        return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\AgendaController::saveAgendaAction',  '_route' => 'store_new_agenda',);
                    }

                    // llistat_store_agenda
                    if (0 === strpos($pathinfo, '/admin/secured/agenda/agenda_llistat') && preg_match('#^/admin/secured/agenda/agenda_llistat/(?P<orderBy>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'llistat_store_agenda')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\AgendaController::listAction',));
                    }

                }

                // edit_agenda
                if (0 === strpos($pathinfo, '/admin/secured/agenda/edit') && preg_match('#^/admin/secured/agenda/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit_agenda')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\AgendaController::editAction',));
                }

                // update_agenda
                if (0 === strpos($pathinfo, '/admin/secured/agenda/update') && preg_match('#^/admin/secured/agenda/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_agenda')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\AgendaController::updateAgendaAction',));
                }

                // delete_agenda
                if (0 === strpos($pathinfo, '/admin/secured/agenda/delete') && preg_match('#^/admin/secured/agenda/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_agenda')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\AgendaController::deleteAgendaAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/secured/presentacio')) {
                // acme_presentacio
                if ($pathinfo === '/admin/secured/presentacio') {
                    return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\PresentacioController::indexAction',  '_route' => 'acme_presentacio',);
                }

                if (0 === strpos($pathinfo, '/admin/secured/presentacio/presentacio_')) {
                    // acme_pre_store_presentacio
                    if ($pathinfo === '/admin/secured/presentacio/presentacio_save') {
                        return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\PresentacioController::precreateAction',  '_route' => 'acme_pre_store_presentacio',);
                    }

                    // store_new_presentacio
                    if ($pathinfo === '/admin/secured/presentacio/presentacio_new_save') {
                        return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\PresentacioController::savePresentacioAction',  '_route' => 'store_new_presentacio',);
                    }

                    // llistat_store_presentacio
                    if (0 === strpos($pathinfo, '/admin/secured/presentacio/presentacio_llistat') && preg_match('#^/admin/secured/presentacio/presentacio_llistat/(?P<orderBy>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'llistat_store_presentacio')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\PresentacioController::listAction',));
                    }

                }

                // edit_presentacio
                if (0 === strpos($pathinfo, '/admin/secured/presentacio/edit') && preg_match('#^/admin/secured/presentacio/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit_presentacio')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\PresentacioController::editAction',));
                }

                // update_presentacio
                if (0 === strpos($pathinfo, '/admin/secured/presentacio/update') && preg_match('#^/admin/secured/presentacio/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_presentacio')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\PresentacioController::updatePresentacioAction',));
                }

                // delete_presentacio
                if (0 === strpos($pathinfo, '/admin/secured/presentacio/delete') && preg_match('#^/admin/secured/presentacio/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_presentacio')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\PresentacioController::deletePresentacioAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/secured/galeria')) {
                // acme_galeria
                if ($pathinfo === '/admin/secured/galeria') {
                    return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\GaleriaController::indexAction',  '_route' => 'acme_galeria',);
                }

                if (0 === strpos($pathinfo, '/admin/secured/galeria/galeria_')) {
                    // acme_pre_store_galeria
                    if ($pathinfo === '/admin/secured/galeria/galeria_save') {
                        return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\GaleriaController::precreateAction',  '_route' => 'acme_pre_store_galeria',);
                    }

                    // store_new_galeria
                    if ($pathinfo === '/admin/secured/galeria/galeria_new_save') {
                        return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\GaleriaController::saveGaleriaAction',  '_route' => 'store_new_galeria',);
                    }

                    // llistat_store_galeria
                    if (0 === strpos($pathinfo, '/admin/secured/galeria/galeria_llistat') && preg_match('#^/admin/secured/galeria/galeria_llistat/(?P<orderBy>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'llistat_store_galeria')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\GaleriaController::listAction',));
                    }

                }

                // edit_galeria
                if (0 === strpos($pathinfo, '/admin/secured/galeria/edit') && preg_match('#^/admin/secured/galeria/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit_galeria')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\GaleriaController::editAction',));
                }

                // update_galeria
                if (0 === strpos($pathinfo, '/admin/secured/galeria/update') && preg_match('#^/admin/secured/galeria/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_galeria')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\GaleriaController::updateGaleriaAction',));
                }

                // delete_galeria
                if (0 === strpos($pathinfo, '/admin/secured/galeria/delete') && preg_match('#^/admin/secured/galeria/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_galeria')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\GaleriaController::deleteGaleriaAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/secured/encarrec')) {
                // acme_encarrecs
                if ($pathinfo === '/admin/secured/encarrecs/list') {
                    return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\EncarrecsController::indexAction',  '_route' => 'acme_encarrecs',);
                }

                // acme_encarrecs_delete
                if (0 === strpos($pathinfo, '/admin/secured/encarrec/delete') && preg_match('#^/admin/secured/encarrec/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'acme_encarrecs_delete')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\EncarrecsController::deleteAction',));
                }

                // acme_encarrecs_envia
                if (0 === strpos($pathinfo, '/admin/secured/encarrec/envia') && preg_match('#^/admin/secured/encarrec/envia/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'acme_encarrecs_envia')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\EncarrecsController::enviaAction',));
                }

            }

            // acme_pre_puja_txt
            if ($pathinfo === '/admin/secured/preupload') {
                return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\UploadController::indexAction',  '_route' => 'acme_pre_puja_txt',);
            }

            // acme_puja_txt
            if ($pathinfo === '/admin/secured/upload') {
                return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\UploadController::uploadAction',  '_route' => 'acme_puja_txt',);
            }

        }

        if (0 === strpos($pathinfo, '/llibreria22')) {
            // acme_llibreria22
            if (preg_match('#^/llibreria22(?:/(?P<_locale>en|fr|es))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'acme_llibreria22')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\LlibreriaController::indexAction',  '_locale' => 'en',));
            }

            // acme_fotos_galeria
            if (0 === strpos($pathinfo, '/llibreria22/galeria') && preg_match('#^/llibreria22/galeria/(?P<year>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'acme_fotos_galeria')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\LlibreriaController::galeriaAction',));
            }

            // acme_bloq
            if ($pathinfo === '/llibreria22/bloq') {
                return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\LlibreriaController::bloqAction',  '_route' => 'acme_bloq',);
            }

            // acme_portada
            if ($pathinfo === '/llibreria22/portada') {
                return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\LlibreriaController::portadaAction',  '_route' => 'acme_portada',);
            }

            // acme_noticias
            if ($pathinfo === '/llibreria22/noticia') {
                return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\LlibreriaController::noticiaAction',  '_route' => 'acme_noticias',);
            }

            // acme_busca_llibre
            if (0 === strpos($pathinfo, '/llibreria22/buscaLlibre') && preg_match('#^/llibreria22/buscaLlibre/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'acme_busca_llibre')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\LlibreriaController::buscaLlibreAction',));
            }

            // acme_demana_llibre
            if (0 === strpos($pathinfo, '/llibreria22/demanaLlibre') && preg_match('#^/llibreria22/demanaLlibre/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'acme_demana_llibre')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\LlibreriaController::demanaLlibreAction',));
            }

            if (0 === strpos($pathinfo, '/llibreria22/s')) {
                // acme_save_demana
                if ($pathinfo === '/llibreria22/savedemana') {
                    return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\LlibreriaController::saveDemanaAction',  '_route' => 'acme_save_demana',);
                }

                // acme_suggeriments
                if ($pathinfo === '/llibreria22/suggeriments') {
                    return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\LlibreriaController::suggerimentsAction',  '_route' => 'acme_suggeriments',);
                }

                // acme_semua_search
                if (0 === strpos($pathinfo, '/llibreria22/semuaSearch') && preg_match('#^/llibreria22/semuaSearch/(?P<search>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'acme_semua_search')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\LlibreriaController::semuaSearchAction',));
                }

            }

            // acme_presentacions
            if ($pathinfo === '/llibreria22/presentacio') {
                return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\LlibreriaController::presentacioAction',  '_route' => 'acme_presentacions',);
            }

            // acme_establiments
            if ($pathinfo === '/llibreria22/establiments') {
                return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\LlibreriaController::establimentsAction',  '_route' => 'acme_establiments',);
            }

        }

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }

            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_welcome',);
        }

        if (0 === strpos($pathinfo, '/admin/secured')) {
            if (0 === strpos($pathinfo, '/admin/secured/log')) {
                if (0 === strpos($pathinfo, '/admin/secured/login')) {
                    // _demo_login
                    if ($pathinfo === '/admin/secured/login') {
                        return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                    }

                    // _security_check
                    if ($pathinfo === '/admin/secured/login_check') {
                        return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_security_check',);
                    }

                }

                // _demo_logout
                if ($pathinfo === '/admin/secured/logout') {
                    return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/secured/hello')) {
                // acme_demo_secured_hello
                if ($pathinfo === '/admin/secured/hello') {
                    return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
                }

                // _demo_secured_hello
                if (preg_match('#^/admin/secured/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',));
                }

                // _demo_secured_hello_admin
                if (0 === strpos($pathinfo, '/admin/secured/hello/admin') && preg_match('#^/admin/secured/hello/admin/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello_admin')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',));
                }

            }

        }

        if (0 === strpos($pathinfo, '/demo')) {
            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }

                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
