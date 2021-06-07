<?php
namespace Neatline\Entity;

use DateTime;
use Omeka\Entity\AbstractEntity;
use Neatline\Entity\User;
use Neatline\Entity\NeatlineRecord;

/**
 * @package     omeka
 * @subpackage  neatline
 * @copyright   2014 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */

 /**
  * @Entity
  */
class NeatlineExhibit extends AbstractEntity
{

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;

    /**
     * @OneToMany(targetEntity="NeatlineRecord", mappedBy="exhibit")
     */
    protected $records;

    /**
     * @ManyToOne(targetEntity="Neatline\Entity\User", inversedBy="neatline_exhibits")
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
     * @Column(type="datetime", nullable=true)
     */
    protected $published;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $item_query;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $spatial_layers;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $spatial_layer;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $image_layer;

    /**
     * @Column(type="smallint", nullable=true)
     */
    protected $image_height;

    /**
     * @Column(type="smallint", nullable=true)
     */
    protected $image_width;

    /**
     * @Column(type="smallint", nullable=true)
     */
    protected $zoom_levels;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $wms_address;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $wms_layers;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $widgets;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $title;

    /**
     * @Column(type="string")
     */
    protected $slug;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $narrative;

    /**
     * @Column(type="boolean")
     */
    protected $spatial_querying = true;

    /**
     * @Column(type="boolean")
     */
    protected $public = false;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $styles;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $map_focus;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $map_zoom;

    /**
     * @Column(type="smallint", nullable=true)
     */
    protected $map_min_zoom;

    /**
     * @Column(type="smallint", nullable=true)
     */
    protected $map_max_zoom;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $map_restricted_extent;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $accessible_url;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $tile_address;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $image_attribution;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $wms_attribution;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $tile_attribution;

    /**
     * @Column(type="integer", nullable=false)
     */
    protected $exhibit_type;

    public function getId()
    {
        return $this->id;
    }

    public function getRecords()
    {
        return $this->records;
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

    public function setPublished(DateTime $dateTime)
    {
        $this->published = $dateTime;
    }

    public function getPublished()
    {
        return $this->published;
    }

    public function setItemQuery($item_query)
    {
        $this->item_query = $item_query;
    }

    public function getItemQuery()
    {
        return $this->item_query;
    }

    public function setSpatialLayers($spatial_layers)
    {
        $this->spatial_layers = implode(",", $spatial_layers);
    }

    public function getSpatialLayers()
    {
        return array_filter(explode(",", $this->spatial_layers), function ($val) {
          return $val !== NULL && $val !== '';
        });
    }

    public function setSpatialLayer($spatial_layer)
    {
        $this->spatial_layer = $spatial_layer;
    }

    public function getSpatialLayer()
    {
        return $this->spatial_layer;
    }

    public function setImageLayer($image_layer)
    {
        $this->image_layer = $image_layer;
    }

    public function getImageLayer()
    {
        return $this->image_layer;
    }

    public function setImageHeight($image_height)
    {
        $this->image_height = $image_height;
    }

    public function getImageHeight()
    {
        return $this->image_height;
    }

    public function setImageWidth($image_width)
    {
        $this->image_width = $image_width;
    }

    public function getImageWidth()
    {
        return $this->image_width;
    }

    public function setZoomLevels($zoom_levels)
    {
        $this->zoom_levels = $zoom_levels;
    }

    public function getZoomLevels()
    {
        return $this->zoom_levels;
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

    public function setWidgets($widgets)
    {
        $this->widgets = $widgets;
    }

    public function getWidgets()
    {
        return $this->widgets;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setNarrative($narrative)
    {
        $this->narrative = $narrative;
    }

    public function getNarrative()
    {
        return $this->narrative;
    }

    public function setSpatialQuerying($spatial_querying)
    {
        $this->spatial_querying = (bool) $spatial_querying;
    }

    public function getSpatialQuerying()
    {
        return (bool) $this->spatial_querying;
    }

    public function setPublic($isPublic)
    {
        $this->public = (bool) $isPublic;
    }

    public function getPublic()
    {
        return (bool) $this->public;
    }

    public function setStyles($styles)
    {
        $this->styles = $styles;
    }

    public function getStyles()
    {
        return $this->styles;
    }

    public function setMapFocus($map_focus)
    {
        $this->map_focus = $map_focus;
    }

    public function getMapFocus()
    {
        return $this->map_focus;
    }

    public function setMapZoom($map_zoom)
    {
        $this->map_zoom = $map_zoom;
    }

    public function getMapZoom()
    {
        return $this->map_zoom;
    }

    public function setMapMinZoom($map_min_zoom)
    {
        $this->map_min_zoom = $map_min_zoom;
    }

    public function getMapMinZoom()
    {
        return $this->map_min_zoom;
    }

    public function setMapMaxZoom($map_max_zoom)
    {
        $this->map_max_zoom = $map_max_zoom;
    }

    public function getMapMaxZoom()
    {
        return $this->map_max_zoom;
    }

    public function setMapRestrictedExtent($map_restricted_extent)
    {
        $this->map_restricted_extent = $map_restricted_extent;
    }

    public function getMapRestrictedExtent()
    {
        return $this->map_restricted_extent;
    }

    public function setAccessibleUrl($accessible_url)
    {
        $this->accessible_url = $accessible_url;
    }

    public function getAccessibleUrl()
    {
        return $this->accessible_url;
    }

    public function setTileAddress($tile_address)
    {
        $this->tile_address = $tile_address;
    }

    public function getTileAddress()
    {
        return $this->tile_address;
    }

    public function setImageAttribution($image_attribution)
    {
        $this->image_attribution = $image_attribution;
    }

    public function getImageAttribution()
    {
        return $this->image_attribution;
    }

    public function setWmsAttribution($wms_attribution)
    {
        $this->wms_attribution = $wms_attribution;
    }

    public function getWmsAttribution()
    {
        return $this->wms_attribution;
    }

    public function setTileAttribution($tile_attribution)
    {
        $this->tile_attribution = $tile_attribution;
    }

    public function getTileAttribution()
    {
        return $this->tile_attribution;
    }

	public function setExhibitType($exhibit_type)
    {
        $this->exhibit_type = $exhibit_type;
    }

    public function getExhibitType()
    {
        return $this->exhibit_type;
    }
}
