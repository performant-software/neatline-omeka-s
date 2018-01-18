<?php
namespace Neatline\Entity;

use DateTime;
use Omeka\Entity\AbstractEntity;
use Omeka\Entity\User;
use Neatline\Entity\NeatlineExhibit;
use Neatline\PHP\Types\Geometry\GeometryCollection;

/**
 * @package     omeka
 * @subpackage  neatline
 * @copyright   2014 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */

 /**
  * @Entity
  * @Table(
  *     indexes={
  *         @Index(
  *             name="exhibit_id",
  *             columns={"exhibit_id", "item_id"}
  *         )
  *     }
  * )
  */
class NeatlineRecord extends AbstractEntity
{

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;

    /**
     * @ManyToOne(targetEntity="NeatlineExhibit", inversedBy="records")
     */
    protected $exhibit;

    /**
     * @ManyToOne(targetEntity="Omeka\Entity\User", inversedBy="neatline_exhibits")
     */
    protected $owner;

    /**
     * @Column(type="datetime")
     */
    protected $added;

    /**
     * @Column(type="datetime", nullable=true)
     */
    protected $modified;

    /**
     * @Column(type="boolean")
     */
    protected $is_coverage = false;

    /**
     * @Column(type="boolean")
     */
    protected $is_wms = false;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $slug;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $title;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $item_title;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $body;

    /**
     * @Column(type="geometry_collection")
     */
    protected $coverage;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $tags;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $widgets;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $presenter;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $fill_color;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $fill_color_select;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $stroke_color;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $stroke_color_select;

    /**
     * @Column(type="decimal", nullable=true)
     */
    protected $fill_opacity;

    /**
     * @Column(type="decimal", nullable=true)
     */
    protected $fill_opacity_select;

    /**
     * @Column(type="decimal", nullable=true)
     */
    protected $stroke_opacity;

    /**
     * @Column(type="decimal", nullable=true)
     */
    protected $stroke_opacity_select;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $stroke_width;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $point_radius;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $zindex;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $weight;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $start_date;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $end_date;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $after_date;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $before_date;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $point_image;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $wms_address;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $wms_layers;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $min_zoom;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $max_zoom;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $map_zoom;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $map_focus;


    public function getId()
    {
        return $this->id;
    }

    public function setExhibit(NeatlineExhibit $exhibit = null)
    {
        $this->exhibit = $exhibit;
    }

    public function getExhibit()
    {
        return $this->exhibit;
    }

    public function setOwner(User $owner = null)
    {
        $this->owner = $owner;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function setAdded(DateTime $dateTime)
    {
        $this->added = $dateTime;
    }

    public function getAdded()
    {
        return $this->added;
    }

    public function setModified(DateTime $dateTime)
    {
        $this->modified = $dateTime;
    }

    public function getModified()
    {
        return $this->modified;
    }

    public function setIsCoverage($is_coverage)
    {
    	$this->is_coverage = $is_coverage;
    }

    public function getIsCoverage()
    {
    	return $this->is_coverage;
    }

    public function setIsWms($is_wms)
    {
    	$this->is_wms = $is_wms;
    }

    public function getIsWms()
    {
    	return $this->is_wms;
    }

    public function setSlug($slug)
    {
    	$this->slug = $slug;
    }

    public function getSlug()
    {
    	return $this->slug;
    }

    public function setTitle($title)
    {
    	$this->title = $title;
    }

    public function getTitle()
    {
    	return $this->title;
    }

    public function setItemTitle($item_title)
    {
    	$this->item_title = $item_title;
    }

    public function getItemTitle()
    {
    	return $this->item_title;
    }

    public function setBody($body)
    {
    	$this->body = $body;
    }

    public function getBody()
    {
    	return $this->body;
    }

    public function setCoverage(GeometryCollection $coverage)
    {
    	$this->coverage = $coverage;
    }

    public function getCoverage()
    {
    	return $this->coverage;
    }

    public function setTags($tags)
    {
    	$this->tags = $tags;
    }

    public function getTags()
    {
    	return $this->tags;
    }

    public function setWidgets($widgets)
    {
    	$this->widgets = $widgets;
    }

    public function getWidgets()
    {
    	return $this->widgets;
    }

    public function setPresenter($presenter)
    {
    	$this->presenter = $presenter;
    }

    public function getPresenter()
    {
    	return $this->presenter;
    }

    public function setFillColor($fill_color)
    {
    	$this->fill_color = $fill_color;
    }

    public function getFillColor()
    {
    	return $this->fill_color;
    }

    public function setFillColorSelect($fill_color_select)
    {
    	$this->fill_color_select = $fill_color_select;
    }

    public function getFillColorSelect()
    {
    	return $this->fill_color_select;
    }

    public function setStrokeColor($stroke_color)
    {
    	$this->stroke_color = $stroke_color;
    }

    public function getStrokeColor()
    {
    	return $this->stroke_color;
    }

    public function setStrokeColorSelect($stroke_color_select)
    {
    	$this->stroke_color_select = $stroke_color_select;
    }

    public function getStrokeColorSelect()
    {
    	return $this->stroke_color_select;
    }

    public function setFillOpacity($fill_opacity)
    {
    	$this->fill_opacity = $fill_opacity;
    }

    public function getFillOpacity()
    {
    	return $this->fill_opacity;
    }

    public function setFillOpacitySelect($fill_opacity_select)
    {
    	$this->fill_opacity_select = $fill_opacity_select;
    }

    public function getFillOpacitySelect()
    {
    	return $this->fill_opacity_select;
    }

    public function setStrokeOpacity($stroke_opacity)
    {
    	$this->stroke_opacity = $stroke_opacity;
    }

    public function getStrokeOpacity()
    {
    	return $this->stroke_opacity;
    }

    public function setStrokeOpacitySelect($stroke_opacity_select)
    {
    	$this->stroke_opacity_select = $stroke_opacity_select;
    }

    public function getStrokeOpacitySelect()
    {
    	return $this->stroke_opacity_select;
    }

    public function setStrokeWidth($stroke_width)
    {
    	$this->stroke_width = $stroke_width;
    }

    public function getStrokeWidth()
    {
    	return $this->stroke_width;
    }

    public function setPointRadius($point_radius)
    {
    	$this->point_radius = $point_radius;
    }

    public function getPointRadius()
    {
    	return $this->point_radius;
    }

    public function setZindex($zindex)
    {
    	$this->zindex = $zindex;
    }

    public function getZindex()
    {
    	return $this->zindex;
    }

    public function setWeight($weight)
    {
    	$this->weight = $weight;
    }

    public function getWeight()
    {
    	return $this->weight;
    }

    public function setStartDate($start_date)
    {
    	$this->start_date = $start_date;
    }

    public function getStartDate()
    {
    	return $this->start_date;
    }

    public function setEndDate($end_date)
    {
    	$this->end_date = $end_date;
    }

    public function getEndDate()
    {
    	return $this->end_date;
    }

    public function setAfterDate($after_date)
    {
    	$this->after_date = $after_date;
    }

    public function getAfterDate()
    {
    	return $this->after_date;
    }

    public function setBeforeDate($before_date)
    {
    	$this->before_date = $before_date;
    }

    public function getBeforeDate()
    {
    	return $this->before_date;
    }

    public function setPointImage($point_image)
    {
    	$this->point_image = $point_image;
    }

    public function getPointImage()
    {
    	return $this->point_image;
    }

    public function setWmsAddress($wms_address)
    {
    	$this->wms_address = $wms_address;
    }

    public function getWmsAddress()
    {
    	return $this->wms_address;
    }

    public function setWmsLayers($wms_layers)
    {
    	$this->wms_layers = $wms_layers;
    }

    public function getWmsLayers()
    {
    	return $this->wms_layers;
    }

    public function setMinZoom($min_zoom)
    {
    	$this->min_zoom = $min_zoom;
    }

    public function getMinZoom()
    {
    	return $this->min_zoom;
    }

    public function setMaxZoom($max_zoom)
    {
    	$this->max_zoom = $max_zoom;
    }

    public function getMaxZoom()
    {
    	return $this->max_zoom;
    }

    public function setMapZoom($map_zoom)
    {
    	$this->map_zoom = $map_zoom;
    }

    public function getMapZoom()
    {
    	return $this->map_zoom;
    }

    public function setMapFocus($map_focus)
    {
    	$this->map_focus = $map_focus;
    }

    public function getMapFocus()
    {
    	return $this->map_focus;
    }

}
