<?php
// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author NaiXiaoXin  <i@nxx.email>
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Model{
/**
 * App\Model\Category
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Category newModelQuery()
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Category newQuery()
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Category query()
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Category whereCreatedAt($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Category whereId($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Category whereName($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Category whereParentId($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Category whereUpdatedAt($value)
 */
	class Category {}
}

namespace App\Model{
/**
 * App\Model\Product
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $preview 封面图片
 * @property float $price_market 市场价
 * @property float $price 现价
 * @property string $content 商品详情
 * @property integer $sold_count 销量
 * @property integer $review_count 评价数
 * @property integer $status 0下架1在售2定时上架
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Model\Category $category
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Product newModelQuery()
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Product newQuery()
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Product query()
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Product whereCategoryId($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Product whereContent($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Product whereCreatedAt($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Product whereId($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Product whereName($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Product wherePreview($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Product wherePrice($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Product wherePriceMarket($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Product whereReviewCount($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Product whereSoldCount($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Product whereStatus($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Product whereUpdatedAt($value)
 */
	class Product {}
}

namespace App\Model{
/**
 * App\Model\Order
 *
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Order newModelQuery()
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Order newQuery()
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Order query()
 */
	class Order {}
}

namespace App\Model{
/**
 * App\Model\Banner
 *
 * @property integer $id
 * @property string $name
 * @property string $preview 封面图片
 * @property integer $sort 排序
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Banner newModelQuery()
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Banner newQuery()
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Banner query()
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Banner whereCreatedAt($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Banner whereId($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Banner whereName($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Banner wherePreview($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Banner whereSort($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Banner whereUpdatedAt($value)
 */
	class Banner {}
}

namespace App\Model{
/**
 * App\Model\User
 *
 * @property integer $id
 * @property string $name
 * @property string|null $email
 * @property string|null $phone
 * @property string $password
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Hyperf\Database\Model\Builder|\App\Model\User newModelQuery()
 * @method static \Hyperf\Database\Model\Builder|\App\Model\User newQuery()
 * @method static \Hyperf\Database\Model\Builder|\App\Model\User query()
 * @method static \Hyperf\Database\Model\Builder|\App\Model\User whereCreatedAt($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\User whereEmail($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\User whereId($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\User whereName($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\User wherePassword($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\User wherePhone($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\User whereUpdatedAt($value)
 */
	class User {}
}

namespace App\Model{
/**
 * App\Model\Role
 *
 * @property integer $id
 * @property string $name
 * @property string|null $display_name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Role newModelQuery()
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Role newQuery()
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Role query()
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Role whereCreatedAt($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Role whereDisplayName($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Role whereId($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Role whereName($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Role whereUpdatedAt($value)
 */
	class Role {}
}

namespace App\Model{
/**
 * App\Model\Permission
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $path
 * @property string $method
 * @property string $display_name
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Permission newModelQuery()
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Permission newQuery()
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Permission query()
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Permission whereCreatedAt($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Permission whereDisplayName($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Permission whereId($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Permission whereMethod($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Permission whereParentId($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Permission wherePath($value)
 * @method static \Hyperf\Database\Model\Builder|\App\Model\Permission whereUpdatedAt($value)
 */
	class Permission {}
}

