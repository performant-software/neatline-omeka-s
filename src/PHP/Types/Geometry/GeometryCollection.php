<?php

namespace Neatline\PHP\Types\Geometry;

use CrEOF\Spatial\PHP\Types\AbstractGeometry;
use CrEOF\Spatial\PHP\Types\Geometry\LineString;
use CrEOF\Spatial\PHP\Types\Geometry\MultiLineString;
use CrEOF\Spatial\PHP\Types\Geometry\MultiPoint;
use CrEOF\Spatial\PHP\Types\Geometry\MultiPolygon;
use CrEOF\Spatial\PHP\Types\Geometry\Point;
use CrEOF\Spatial\PHP\Types\Geometry\Polygon;
use CrEOF\Spatial\Exception\InvalidValueException;

use Exception;

class GeometryCollection extends AbstractGeometry
{
    /**
     * @var AbstractGeometry[] $geometries
     */
    protected $geometries = array();

    /**
     * @param AbstractGeometry[]|array[]
     * @param null|int                     $srid
     */
    public function __construct(array $geometries, $srid = null)
    {
        $this->setGeometries($geometries)
            ->setSrid($srid);
    }

    /**
     * @param AbstractGeometry
     *
     * @return self
     */
    public function addGeometry($geometry)
    {
        $this->geometries[] = $this->validateGeometryValue($geometry);

        return $this;
    }

    /**
     * @return AbstractGeometry[]
     */
    public function getGeometries()
    {
        $geometries = array();

        for ($i = 0; $i < count($this->geometries); $i++) {
            $geometries[] = $this->getGeometry($i);
        }

        return $geometries;
    }

    /**
     * @param int $index
     *
     * @return AbstractGeometry
     */
    public function getGeometry($index)
    {
        if (-1 == $index) {
            $index = count($this->geometries) - 1;
        }

        $geometryClass = get_class($this->geometries[$index]);

        return new $geometryClass($this->geometries[$index], $this->srid);
    }

    /**
     * @param AbstractGeometry[]|array[] $geometries
     *
     * @return self
     */
    public function setGeometries(array $geometries)
    {
        $this->geometries = $this->validateGeometryCollectionValue($geometries);

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return self::GEOMETRYCOLLECTION;
    }

    /**
     * @return AbstractGeometry[]
     */
    public function toArray()
    {
        return $this->geometries;
    }

    /**
     * @param AbstractGeometry[]|array[] $geometries
     *
     * @return AbstractGeometry[]
     */
    protected function validateGeometryCollectionValue(array $geometries)
    {
        foreach ($geometries as &$geometry) {
            $geometry = $this->validateGeometryValue($geometry);
        }

        return $geometries;
    }

    /**
     * @param array[]|AbstractGeometry $feature
     *
     * @return AbstractGeometry[]
     */
    protected function validateGeometryValue($feature)
    {
        if ($feature instanceof AbstractGeometry) return $feature;

        $type = '(No type)';
        $coordinates = array();
        if (array_key_exists('geometry', $feature)) {
            $geometry = $feature['geometry'];
            $type = $geometry['type'];
            $coordinates = $geometry['coordinates'];
        }
        else {
            $type = $feature['type'];
            $coordinates = $feature['value'];
        }

        switch ($type) {
            case 'POINT':
            case self::POINT:
                return new Point($coordinates);
                break;
            case 'LINESTRING':
            case self::LINESTRING:
                return new LineString($coordinates);
                break;
            case 'POLYGON':
            case self::POLYGON:
                return new Polygon($coordinates);
                break;
            case 'MULTIPOINT':
            case self::MULTIPOINT:
                return new MultiPoint($coordinates);
                break;
            case 'MULTILINESTRING':
            case self::MULTILINESTRING:
                return new MultiLineString($coordinates);
                break;
            case 'MULTIPOLYGON':
            case self::MULTIPOLYGON:
                return new MultiPolygon($coordinates);
                break;
            default:
                throw new InvalidValueException(sprintf('Invalid geometry type "%s"', $type));
        }
    }

    /**
     * @param AbstractGeometry[] $geometries
     *
     * @return string
     */
    protected function toStringGeometryCollection(array $geometries)
    {
        $strings = array();

        foreach ($geometries as $geometry) {
            $strings[] = sprintf('%s(%s)', strtoupper($geometry->getType()), $geometry);
        }

        return implode(',', $strings);
    }

    /**
     * @return string
     */
    public function toJson()
    {
        $json['type'] = 'FeatureCollection';
        $features = array();
        foreach ($this->geometries as $geometry) {
            $feature['type'] = 'Feature';
            $geo['type'] = $geometry->getType();
            $geo['coordinates'] = $geometry->toArray();
            $feature['geometry'] = $geo;
            $features[] = $feature;
        }
        $json['features'] = $features;
        return json_encode($json);
    }

}
