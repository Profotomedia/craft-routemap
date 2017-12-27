<?php
/**
 * Route Map plugin for Craft CMS 3.x
 *
 * Returns a list of public routes for elements with URLs
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\routemap\controllers;

use nystudio107\routemap\RouteMap;

use craft\base\ElementInterface;
use craft\web\Controller;

/**
 * @author    nystudio107
 * @package   RouteMap
 * @since     1.0.0
 */
class RoutesController extends Controller
{
    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = [
        'get-all-urls',
        'get-section-urls',
        'get-all-route-rules',
        'get-section-route-rules',
        'get-url-asset-urls',
        'get-element-urls',
    ];

    // Public Methods
    // =========================================================================

    /**
     * Return the public URLs for all elements that have URLs
     *
     * @param array    $criteria
     * @param int|null $siteId
     *
     * @return string
     */
    public function actionGetAllUrls(array $criteria = [], $siteId = null)
    {
        return $this->asJson(RouteMap::$plugin->routes->getAllUrls($criteria, $siteId));
    }

    /**
     * Return the public URLs for a section
     *
     * @param string   $section
     * @param array    $criteria
     * @param int|null $siteId
     *
     * @return string
     */
    public function actionGetSectionUrls(string $section, array $criteria = [], $siteId = null)
    {
        return $this->asJson(RouteMap::$plugin->routes->getSectionUrls($section, $criteria, $siteId));
    }

    /**
     * Return all of the section route rules
     *
     * @param string $format 'Craft'|'React'|'Vue'
     *
     * @return string
     */
    public function actionGetAllRouteRules(string $format = 'Craft')
    {
        return $this->asJson(RouteMap::$plugin->routes->getAllRouteRules($format));
    }

    /**
     * Return the route rules for a specific section
     *
     * @param string $section
     * @param string $format 'Craft'|'React'|'Vue'
     *
     * @return string
     */
    public function actionGetSectionRouteRules(string $section, string $format = 'Craft')
    {
        return $this->asJson(RouteMap::$plugin->routes->getSectionRouteRules($section, $format));
    }

    /**
     * Get all of the assets of the type $assetTypes that are used in the Entry
     * that matches the $url
     *
     * @param string   $url
     * @param array    $assetTypes
     * @param int|null $siteId
     *
     * @return string
     */
    public function actionGetUrlAssetUrls($url, array $assetTypes = ['image'], $siteId = null)
    {
        return $this->asJson(RouteMap::$plugin->routes->getUrlAssetUrls($url, $assetTypes, $siteId));
    }

    /**
     * Returns all of the URLs for the given $elementType based on the passed in
     * $criteria and $siteId
     *
     * @var string|ElementInterface $elementType
     * @var array                   $criteria
     * @var int|null                $siteId
     *
     * @return string
     */
    public function actionGetElementUrls($elementType, array $criteria = [], $siteId = null)
    {
        return $this->asJson(RouteMap::$plugin->routes->getElementUrls($elementType, $criteria, $siteId));
    }
}
