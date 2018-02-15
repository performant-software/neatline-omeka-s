<?php

namespace DoctrineProxies\__CG__\Neatline\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class NeatlineExhibit extends \Neatline\Entity\NeatlineExhibit implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', 'id', 'records', 'owner', 'added', 'modified', 'published', 'item_query', 'spatial_layers', 'spatial_layer', 'image_layer', 'image_height', 'image_width', 'zoom_levels', 'wms_address', 'wms_layers', 'widgets', 'title', 'slug', 'narrative', 'spatial_querying', 'public', 'styles', 'map_focus', 'map_zoom', 'map_min_zoom', 'map_max_zoom', 'map_restricted_extent', 'accessible_url'];
        }

        return ['__isInitialized__', 'id', 'records', 'owner', 'added', 'modified', 'published', 'item_query', 'spatial_layers', 'spatial_layer', 'image_layer', 'image_height', 'image_width', 'zoom_levels', 'wms_address', 'wms_layers', 'widgets', 'title', 'slug', 'narrative', 'spatial_querying', 'public', 'styles', 'map_focus', 'map_zoom', 'map_min_zoom', 'map_max_zoom', 'map_restricted_extent', 'accessible_url'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (NeatlineExhibit $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getRecords()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRecords', []);

        return parent::getRecords();
    }

    /**
     * {@inheritDoc}
     */
    public function setOwner(\Omeka\Entity\User $owner = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOwner', [$owner]);

        return parent::setOwner($owner);
    }

    /**
     * {@inheritDoc}
     */
    public function getOwner()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOwner', []);

        return parent::getOwner();
    }

    /**
     * {@inheritDoc}
     */
    public function setAdded(\DateTime $dateTime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAdded', [$dateTime]);

        return parent::setAdded($dateTime);
    }

    /**
     * {@inheritDoc}
     */
    public function getAdded()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAdded', []);

        return parent::getAdded();
    }

    /**
     * {@inheritDoc}
     */
    public function setModified(\DateTime $dateTime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setModified', [$dateTime]);

        return parent::setModified($dateTime);
    }

    /**
     * {@inheritDoc}
     */
    public function getModified()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getModified', []);

        return parent::getModified();
    }

    /**
     * {@inheritDoc}
     */
    public function setPublished(\DateTime $dateTime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPublished', [$dateTime]);

        return parent::setPublished($dateTime);
    }

    /**
     * {@inheritDoc}
     */
    public function getPublished()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPublished', []);

        return parent::getPublished();
    }

    /**
     * {@inheritDoc}
     */
    public function setItemQuery($item_query)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setItemQuery', [$item_query]);

        return parent::setItemQuery($item_query);
    }

    /**
     * {@inheritDoc}
     */
    public function getItemQuery()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getItemQuery', []);

        return parent::getItemQuery();
    }

    /**
     * {@inheritDoc}
     */
    public function setSpatialLayers($spatial_layers)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSpatialLayers', [$spatial_layers]);

        return parent::setSpatialLayers($spatial_layers);
    }

    /**
     * {@inheritDoc}
     */
    public function getSpatialLayers()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSpatialLayers', []);

        return parent::getSpatialLayers();
    }

    /**
     * {@inheritDoc}
     */
    public function setSpatialLayer($spatial_layer)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSpatialLayer', [$spatial_layer]);

        return parent::setSpatialLayer($spatial_layer);
    }

    /**
     * {@inheritDoc}
     */
    public function getSpatialLayer()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSpatialLayer', []);

        return parent::getSpatialLayer();
    }

    /**
     * {@inheritDoc}
     */
    public function setImageLayer($image_layer)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setImageLayer', [$image_layer]);

        return parent::setImageLayer($image_layer);
    }

    /**
     * {@inheritDoc}
     */
    public function getImageLayer()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImageLayer', []);

        return parent::getImageLayer();
    }

    /**
     * {@inheritDoc}
     */
    public function setImageHeight($image_height)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setImageHeight', [$image_height]);

        return parent::setImageHeight($image_height);
    }

    /**
     * {@inheritDoc}
     */
    public function getImageHeight()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImageHeight', []);

        return parent::getImageHeight();
    }

    /**
     * {@inheritDoc}
     */
    public function setImageWidth($image_width)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setImageWidth', [$image_width]);

        return parent::setImageWidth($image_width);
    }

    /**
     * {@inheritDoc}
     */
    public function getImageWidth()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImageWidth', []);

        return parent::getImageWidth();
    }

    /**
     * {@inheritDoc}
     */
    public function setZoomLevels($zoom_levels)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setZoomLevels', [$zoom_levels]);

        return parent::setZoomLevels($zoom_levels);
    }

    /**
     * {@inheritDoc}
     */
    public function getZoomLevels()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getZoomLevels', []);

        return parent::getZoomLevels();
    }

    /**
     * {@inheritDoc}
     */
    public function setWmsAddress($wms_address)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setWmsAddress', [$wms_address]);

        return parent::setWmsAddress($wms_address);
    }

    /**
     * {@inheritDoc}
     */
    public function getWmsAddress()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWmsAddress', []);

        return parent::getWmsAddress();
    }

    /**
     * {@inheritDoc}
     */
    public function setWmsLayers($wms_layers)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setWmsLayers', [$wms_layers]);

        return parent::setWmsLayers($wms_layers);
    }

    /**
     * {@inheritDoc}
     */
    public function getWmsLayers()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWmsLayers', []);

        return parent::getWmsLayers();
    }

    /**
     * {@inheritDoc}
     */
    public function setWidgets($widgets)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setWidgets', [$widgets]);

        return parent::setWidgets($widgets);
    }

    /**
     * {@inheritDoc}
     */
    public function getWidgets()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWidgets', []);

        return parent::getWidgets();
    }

    /**
     * {@inheritDoc}
     */
    public function setTitle($title)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTitle', [$title]);

        return parent::setTitle($title);
    }

    /**
     * {@inheritDoc}
     */
    public function getTitle()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTitle', []);

        return parent::getTitle();
    }

    /**
     * {@inheritDoc}
     */
    public function setSlug($slug)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSlug', [$slug]);

        return parent::setSlug($slug);
    }

    /**
     * {@inheritDoc}
     */
    public function getSlug()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSlug', []);

        return parent::getSlug();
    }

    /**
     * {@inheritDoc}
     */
    public function setNarrative($narrative)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNarrative', [$narrative]);

        return parent::setNarrative($narrative);
    }

    /**
     * {@inheritDoc}
     */
    public function getNarrative()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNarrative', []);

        return parent::getNarrative();
    }

    /**
     * {@inheritDoc}
     */
    public function setSpatialQuerying($spatial_querying)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSpatialQuerying', [$spatial_querying]);

        return parent::setSpatialQuerying($spatial_querying);
    }

    /**
     * {@inheritDoc}
     */
    public function getSpatialQuerying()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSpatialQuerying', []);

        return parent::getSpatialQuerying();
    }

    /**
     * {@inheritDoc}
     */
    public function setPublic($public)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPublic', [$public]);

        return parent::setPublic($public);
    }

    /**
     * {@inheritDoc}
     */
    public function getPublic()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPublic', []);

        return parent::getPublic();
    }

    /**
     * {@inheritDoc}
     */
    public function setStyles($styles)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStyles', [$styles]);

        return parent::setStyles($styles);
    }

    /**
     * {@inheritDoc}
     */
    public function getStyles()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStyles', []);

        return parent::getStyles();
    }

    /**
     * {@inheritDoc}
     */
    public function setMapFocus($map_focus)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMapFocus', [$map_focus]);

        return parent::setMapFocus($map_focus);
    }

    /**
     * {@inheritDoc}
     */
    public function getMapFocus()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMapFocus', []);

        return parent::getMapFocus();
    }

    /**
     * {@inheritDoc}
     */
    public function setMapZoom($map_zoom)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMapZoom', [$map_zoom]);

        return parent::setMapZoom($map_zoom);
    }

    /**
     * {@inheritDoc}
     */
    public function getMapZoom()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMapZoom', []);

        return parent::getMapZoom();
    }

    /**
     * {@inheritDoc}
     */
    public function setMapMinZoom($map_min_zoom)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMapMinZoom', [$map_min_zoom]);

        return parent::setMapMinZoom($map_min_zoom);
    }

    /**
     * {@inheritDoc}
     */
    public function getMapMinZoom()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMapMinZoom', []);

        return parent::getMapMinZoom();
    }

    /**
     * {@inheritDoc}
     */
    public function setMapMaxZoom($map_max_zoom)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMapMaxZoom', [$map_max_zoom]);

        return parent::setMapMaxZoom($map_max_zoom);
    }

    /**
     * {@inheritDoc}
     */
    public function getMapMaxZoom()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMapMaxZoom', []);

        return parent::getMapMaxZoom();
    }

    /**
     * {@inheritDoc}
     */
    public function setMapRestrictedExtent($map_restricted_extent)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMapRestrictedExtent', [$map_restricted_extent]);

        return parent::setMapRestrictedExtent($map_restricted_extent);
    }

    /**
     * {@inheritDoc}
     */
    public function getMapRestrictedExtent()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMapRestrictedExtent', []);

        return parent::getMapRestrictedExtent();
    }

    /**
     * {@inheritDoc}
     */
    public function setAccessibleUrl($accessible_url)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAccessibleUrl', [$accessible_url]);

        return parent::setAccessibleUrl($accessible_url);
    }

    /**
     * {@inheritDoc}
     */
    public function getAccessibleUrl()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAccessibleUrl', []);

        return parent::getAccessibleUrl();
    }

    /**
     * {@inheritDoc}
     */
    public function getResourceId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getResourceId', []);

        return parent::getResourceId();
    }

}