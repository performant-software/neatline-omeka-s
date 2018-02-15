<?php

namespace DoctrineProxies\__CG__\Neatline\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class NeatlineRecord extends \Neatline\Entity\NeatlineRecord implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', 'id', 'exhibit', 'owner', 'added', 'modified', 'is_coverage', 'is_wms', 'slug', 'title', 'item_title', 'body', 'coverage', 'tags', 'widgets', 'presenter', 'fill_color', 'fill_color_select', 'stroke_color', 'stroke_color_select', 'fill_opacity', 'fill_opacity_select', 'stroke_opacity', 'stroke_opacity_select', 'stroke_width', 'point_radius', 'zindex', 'weight', 'start_date', 'end_date', 'after_date', 'before_date', 'point_image', 'wms_address', 'wms_layers', 'min_zoom', 'max_zoom', 'map_zoom', 'map_focus'];
        }

        return ['__isInitialized__', 'id', 'exhibit', 'owner', 'added', 'modified', 'is_coverage', 'is_wms', 'slug', 'title', 'item_title', 'body', 'coverage', 'tags', 'widgets', 'presenter', 'fill_color', 'fill_color_select', 'stroke_color', 'stroke_color_select', 'fill_opacity', 'fill_opacity_select', 'stroke_opacity', 'stroke_opacity_select', 'stroke_width', 'point_radius', 'zindex', 'weight', 'start_date', 'end_date', 'after_date', 'before_date', 'point_image', 'wms_address', 'wms_layers', 'min_zoom', 'max_zoom', 'map_zoom', 'map_focus'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (NeatlineRecord $proxy) {
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
    public function setExhibit(\Neatline\Entity\NeatlineExhibit $exhibit = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setExhibit', [$exhibit]);

        return parent::setExhibit($exhibit);
    }

    /**
     * {@inheritDoc}
     */
    public function getExhibit()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getExhibit', []);

        return parent::getExhibit();
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
    public function setIsCoverage($is_coverage)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsCoverage', [$is_coverage]);

        return parent::setIsCoverage($is_coverage);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsCoverage()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsCoverage', []);

        return parent::getIsCoverage();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsWms($is_wms)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsWms', [$is_wms]);

        return parent::setIsWms($is_wms);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsWms()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsWms', []);

        return parent::getIsWms();
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
    public function setItemTitle($item_title)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setItemTitle', [$item_title]);

        return parent::setItemTitle($item_title);
    }

    /**
     * {@inheritDoc}
     */
    public function getItemTitle()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getItemTitle', []);

        return parent::getItemTitle();
    }

    /**
     * {@inheritDoc}
     */
    public function setBody($body)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBody', [$body]);

        return parent::setBody($body);
    }

    /**
     * {@inheritDoc}
     */
    public function getBody()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBody', []);

        return parent::getBody();
    }

    /**
     * {@inheritDoc}
     */
    public function setCoverage(\CrEOF\Spatial\PHP\Types\Geometry\Point $coverage)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCoverage', [$coverage]);

        return parent::setCoverage($coverage);
    }

    /**
     * {@inheritDoc}
     */
    public function getCoverage()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCoverage', []);

        return parent::getCoverage();
    }

    /**
     * {@inheritDoc}
     */
    public function setTags($tags)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTags', [$tags]);

        return parent::setTags($tags);
    }

    /**
     * {@inheritDoc}
     */
    public function getTags()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTags', []);

        return parent::getTags();
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
    public function setPresenter($presenter)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPresenter', [$presenter]);

        return parent::setPresenter($presenter);
    }

    /**
     * {@inheritDoc}
     */
    public function getPresenter()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPresenter', []);

        return parent::getPresenter();
    }

    /**
     * {@inheritDoc}
     */
    public function setFillColor($fill_color)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFillColor', [$fill_color]);

        return parent::setFillColor($fill_color);
    }

    /**
     * {@inheritDoc}
     */
    public function getFillColor()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFillColor', []);

        return parent::getFillColor();
    }

    /**
     * {@inheritDoc}
     */
    public function setFillColorSelect($fill_color_select)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFillColorSelect', [$fill_color_select]);

        return parent::setFillColorSelect($fill_color_select);
    }

    /**
     * {@inheritDoc}
     */
    public function getFillColorSelect()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFillColorSelect', []);

        return parent::getFillColorSelect();
    }

    /**
     * {@inheritDoc}
     */
    public function setStrokeColor($stroke_color)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStrokeColor', [$stroke_color]);

        return parent::setStrokeColor($stroke_color);
    }

    /**
     * {@inheritDoc}
     */
    public function getStrokeColor()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStrokeColor', []);

        return parent::getStrokeColor();
    }

    /**
     * {@inheritDoc}
     */
    public function setStrokeColorSelect($stroke_color_select)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStrokeColorSelect', [$stroke_color_select]);

        return parent::setStrokeColorSelect($stroke_color_select);
    }

    /**
     * {@inheritDoc}
     */
    public function getStrokeColorSelect()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStrokeColorSelect', []);

        return parent::getStrokeColorSelect();
    }

    /**
     * {@inheritDoc}
     */
    public function setFillOpacity($fill_opacity)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFillOpacity', [$fill_opacity]);

        return parent::setFillOpacity($fill_opacity);
    }

    /**
     * {@inheritDoc}
     */
    public function getFillOpacity()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFillOpacity', []);

        return parent::getFillOpacity();
    }

    /**
     * {@inheritDoc}
     */
    public function setFillOpacitySelect($fill_opacity_select)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFillOpacitySelect', [$fill_opacity_select]);

        return parent::setFillOpacitySelect($fill_opacity_select);
    }

    /**
     * {@inheritDoc}
     */
    public function getFillOpacitySelect()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFillOpacitySelect', []);

        return parent::getFillOpacitySelect();
    }

    /**
     * {@inheritDoc}
     */
    public function setStrokeOpacity($stroke_opacity)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStrokeOpacity', [$stroke_opacity]);

        return parent::setStrokeOpacity($stroke_opacity);
    }

    /**
     * {@inheritDoc}
     */
    public function getStrokeOpacity()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStrokeOpacity', []);

        return parent::getStrokeOpacity();
    }

    /**
     * {@inheritDoc}
     */
    public function setStrokeOpacitySelect($stroke_opacity_select)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStrokeOpacitySelect', [$stroke_opacity_select]);

        return parent::setStrokeOpacitySelect($stroke_opacity_select);
    }

    /**
     * {@inheritDoc}
     */
    public function getStrokeOpacitySelect()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStrokeOpacitySelect', []);

        return parent::getStrokeOpacitySelect();
    }

    /**
     * {@inheritDoc}
     */
    public function setStrokeWidth($stroke_width)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStrokeWidth', [$stroke_width]);

        return parent::setStrokeWidth($stroke_width);
    }

    /**
     * {@inheritDoc}
     */
    public function getStrokeWidth()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStrokeWidth', []);

        return parent::getStrokeWidth();
    }

    /**
     * {@inheritDoc}
     */
    public function setPointRadius($point_radius)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPointRadius', [$point_radius]);

        return parent::setPointRadius($point_radius);
    }

    /**
     * {@inheritDoc}
     */
    public function getPointRadius()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPointRadius', []);

        return parent::getPointRadius();
    }

    /**
     * {@inheritDoc}
     */
    public function setZindex($zindex)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setZindex', [$zindex]);

        return parent::setZindex($zindex);
    }

    /**
     * {@inheritDoc}
     */
    public function getZindex()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getZindex', []);

        return parent::getZindex();
    }

    /**
     * {@inheritDoc}
     */
    public function setWeight($weight)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setWeight', [$weight]);

        return parent::setWeight($weight);
    }

    /**
     * {@inheritDoc}
     */
    public function getWeight()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWeight', []);

        return parent::getWeight();
    }

    /**
     * {@inheritDoc}
     */
    public function setStartDate($start_date)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStartDate', [$start_date]);

        return parent::setStartDate($start_date);
    }

    /**
     * {@inheritDoc}
     */
    public function getStartDate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStartDate', []);

        return parent::getStartDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setEndDate($end_date)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEndDate', [$end_date]);

        return parent::setEndDate($end_date);
    }

    /**
     * {@inheritDoc}
     */
    public function getEndDate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEndDate', []);

        return parent::getEndDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setAfterDate($after_date)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAfterDate', [$after_date]);

        return parent::setAfterDate($after_date);
    }

    /**
     * {@inheritDoc}
     */
    public function getAfterDate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAfterDate', []);

        return parent::getAfterDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setBeforeDate($before_date)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBeforeDate', [$before_date]);

        return parent::setBeforeDate($before_date);
    }

    /**
     * {@inheritDoc}
     */
    public function getBeforeDate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBeforeDate', []);

        return parent::getBeforeDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setPointImage($point_image)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPointImage', [$point_image]);

        return parent::setPointImage($point_image);
    }

    /**
     * {@inheritDoc}
     */
    public function getPointImage()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPointImage', []);

        return parent::getPointImage();
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
    public function setMinZoom($min_zoom)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMinZoom', [$min_zoom]);

        return parent::setMinZoom($min_zoom);
    }

    /**
     * {@inheritDoc}
     */
    public function getMinZoom()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMinZoom', []);

        return parent::getMinZoom();
    }

    /**
     * {@inheritDoc}
     */
    public function setMaxZoom($max_zoom)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMaxZoom', [$max_zoom]);

        return parent::setMaxZoom($max_zoom);
    }

    /**
     * {@inheritDoc}
     */
    public function getMaxZoom()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMaxZoom', []);

        return parent::getMaxZoom();
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
    public function getResourceId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getResourceId', []);

        return parent::getResourceId();
    }

}