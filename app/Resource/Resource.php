<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Resource;

use Hyperf\DbConnection\Model\Model;
use Hyperf\Resource\Json\JsonResource;
use Hyperf\Utils\Str;

class Resource extends JsonResource
{
    protected static $availableIncludes = [];

    protected static $relationLoaded = false;

    public function __construct($resource)
    {
        parent::__construct($resource);

        if (! self::$relationLoaded && $resource instanceof Model) {
            $resource->loadMissing(self::getRequestIncludes());
            self::$relationLoaded = false;
        }
    }

    public static function collection($resource)
    {
        if (! self::$relationLoaded) {
            $resource->loadMissing(self::getRequestIncludes());
            self::$relationLoaded = false;
        }

        return parent::collection($resource);
    }

    public static function getRequestIncludes()
    {
        $includes = array_intersect(parse_includes(static::$availableIncludes), parse_includes());

        $relations = [];

        foreach ($includes as $relation) {
            $method = Str::camel(str_replace('.', '_', $relation)) . 'Query';
            if (method_exists(static::class, $method)) {
                $relations[$relation] = function ($query) use ($method) {
                    forward_static_call([static::class, $method], $query);
                };
                continue;
            }
            $relations[] = $relation;
        }

        return $relations;
    }
}
