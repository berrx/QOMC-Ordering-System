<?php

/**
 * A helper file for Dcat Admin, to provide autocomplete information to your IDE
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author jqh <841324345@qq.com>
 */
namespace Dcat\Admin {
    use Illuminate\Support\Collection;

    /**
     * @property Grid\Column|Collection name
     * @property Grid\Column|Collection version
     * @property Grid\Column|Collection alias
     * @property Grid\Column|Collection authors
     * @property Grid\Column|Collection enable
     * @property Grid\Column|Collection imported
     * @property Grid\Column|Collection config
     * @property Grid\Column|Collection require
     * @property Grid\Column|Collection require_dev
     * @property Grid\Column|Collection id
     * @property Grid\Column|Collection email
     * @property Grid\Column|Collection email_verified_at
     * @property Grid\Column|Collection created_at
     * @property Grid\Column|Collection on_sale
     * @property Grid\Column|Collection price
     * @property Grid\Column|Collection rating
     * @property Grid\Column|Collection sold_count
     * @property Grid\Column|Collection review_count
     * @property Grid\Column|Collection no
     * @property Grid\Column|Collection total_amount
     * @property Grid\Column|Collection paid_at
     * @property Grid\Column|Collection ship_status
     * @property Grid\Column|Collection refund_status
     * @property Grid\Column|Collection code
     * @property Grid\Column|Collection enabled
     * @property Grid\Column|Collection icon
     * @property Grid\Column|Collection order
     * @property Grid\Column|Collection parent_id
     * @property Grid\Column|Collection permission
     * @property Grid\Column|Collection updated_at
     * @property Grid\Column|Collection uri
     * @property Grid\Column|Collection input
     * @property Grid\Column|Collection ip
     * @property Grid\Column|Collection method
     * @property Grid\Column|Collection path
     * @property Grid\Column|Collection user_id
     * @property Grid\Column|Collection menu_id
     * @property Grid\Column|Collection permission_id
     * @property Grid\Column|Collection http_method
     * @property Grid\Column|Collection http_path
     * @property Grid\Column|Collection slug
     * @property Grid\Column|Collection role_id
     * @property Grid\Column|Collection avatar
     * @property Grid\Column|Collection password
     * @property Grid\Column|Collection remember_token
     * @property Grid\Column|Collection username
     * @property Grid\Column|Collection amount
     * @property Grid\Column|Collection product_sku_id
     * @property Grid\Column|Collection banner
     * @property Grid\Column|Collection status
     * @property Grid\Column|Collection min_amount
     * @property Grid\Column|Collection not_after
     * @property Grid\Column|Collection not_before
     * @property Grid\Column|Collection total
     * @property Grid\Column|Collection type
     * @property Grid\Column|Collection used
     * @property Grid\Column|Collection value
     * @property Grid\Column|Collection connection
     * @property Grid\Column|Collection exception
     * @property Grid\Column|Collection failed_at
     * @property Grid\Column|Collection payload
     * @property Grid\Column|Collection queue
     * @property Grid\Column|Collection uuid
     * @property Grid\Column|Collection order_id
     * @property Grid\Column|Collection product_id
     * @property Grid\Column|Collection review
     * @property Grid\Column|Collection reviewed_at
     * @property Grid\Column|Collection address
     * @property Grid\Column|Collection closed
     * @property Grid\Column|Collection coupon_code_id
     * @property Grid\Column|Collection extra
     * @property Grid\Column|Collection payment_method
     * @property Grid\Column|Collection payment_no
     * @property Grid\Column|Collection refund_no
     * @property Grid\Column|Collection remark
     * @property Grid\Column|Collection reviewed
     * @property Grid\Column|Collection ship_data
     * @property Grid\Column|Collection token
     * @property Grid\Column|Collection stock
     * @property Grid\Column|Collection image
     * @property Grid\Column|Collection city
     * @property Grid\Column|Collection contact_name
     * @property Grid\Column|Collection contact_phone
     * @property Grid\Column|Collection district
     * @property Grid\Column|Collection last_used_at
     * @property Grid\Column|Collection province
     * @property Grid\Column|Collection zip
     *
     * @method Grid\Column|Collection name(string $label = null)
     * @method Grid\Column|Collection version(string $label = null)
     * @method Grid\Column|Collection alias(string $label = null)
     * @method Grid\Column|Collection authors(string $label = null)
     * @method Grid\Column|Collection enable(string $label = null)
     * @method Grid\Column|Collection imported(string $label = null)
     * @method Grid\Column|Collection config(string $label = null)
     * @method Grid\Column|Collection require(string $label = null)
     * @method Grid\Column|Collection require_dev(string $label = null)
     * @method Grid\Column|Collection id(string $label = null)
     * @method Grid\Column|Collection email(string $label = null)
     * @method Grid\Column|Collection email_verified_at(string $label = null)
     * @method Grid\Column|Collection created_at(string $label = null)
     * @method Grid\Column|Collection on_sale(string $label = null)
     * @method Grid\Column|Collection price(string $label = null)
     * @method Grid\Column|Collection rating(string $label = null)
     * @method Grid\Column|Collection sold_count(string $label = null)
     * @method Grid\Column|Collection review_count(string $label = null)
     * @method Grid\Column|Collection no(string $label = null)
     * @method Grid\Column|Collection total_amount(string $label = null)
     * @method Grid\Column|Collection paid_at(string $label = null)
     * @method Grid\Column|Collection ship_status(string $label = null)
     * @method Grid\Column|Collection refund_status(string $label = null)
     * @method Grid\Column|Collection code(string $label = null)
     * @method Grid\Column|Collection enabled(string $label = null)
     * @method Grid\Column|Collection icon(string $label = null)
     * @method Grid\Column|Collection order(string $label = null)
     * @method Grid\Column|Collection parent_id(string $label = null)
     * @method Grid\Column|Collection permission(string $label = null)
     * @method Grid\Column|Collection updated_at(string $label = null)
     * @method Grid\Column|Collection uri(string $label = null)
     * @method Grid\Column|Collection input(string $label = null)
     * @method Grid\Column|Collection ip(string $label = null)
     * @method Grid\Column|Collection method(string $label = null)
     * @method Grid\Column|Collection path(string $label = null)
     * @method Grid\Column|Collection user_id(string $label = null)
     * @method Grid\Column|Collection menu_id(string $label = null)
     * @method Grid\Column|Collection permission_id(string $label = null)
     * @method Grid\Column|Collection http_method(string $label = null)
     * @method Grid\Column|Collection http_path(string $label = null)
     * @method Grid\Column|Collection slug(string $label = null)
     * @method Grid\Column|Collection role_id(string $label = null)
     * @method Grid\Column|Collection avatar(string $label = null)
     * @method Grid\Column|Collection password(string $label = null)
     * @method Grid\Column|Collection remember_token(string $label = null)
     * @method Grid\Column|Collection username(string $label = null)
     * @method Grid\Column|Collection amount(string $label = null)
     * @method Grid\Column|Collection product_sku_id(string $label = null)
     * @method Grid\Column|Collection banner(string $label = null)
     * @method Grid\Column|Collection status(string $label = null)
     * @method Grid\Column|Collection min_amount(string $label = null)
     * @method Grid\Column|Collection not_after(string $label = null)
     * @method Grid\Column|Collection not_before(string $label = null)
     * @method Grid\Column|Collection total(string $label = null)
     * @method Grid\Column|Collection type(string $label = null)
     * @method Grid\Column|Collection used(string $label = null)
     * @method Grid\Column|Collection value(string $label = null)
     * @method Grid\Column|Collection connection(string $label = null)
     * @method Grid\Column|Collection exception(string $label = null)
     * @method Grid\Column|Collection failed_at(string $label = null)
     * @method Grid\Column|Collection payload(string $label = null)
     * @method Grid\Column|Collection queue(string $label = null)
     * @method Grid\Column|Collection uuid(string $label = null)
     * @method Grid\Column|Collection order_id(string $label = null)
     * @method Grid\Column|Collection product_id(string $label = null)
     * @method Grid\Column|Collection review(string $label = null)
     * @method Grid\Column|Collection reviewed_at(string $label = null)
     * @method Grid\Column|Collection address(string $label = null)
     * @method Grid\Column|Collection closed(string $label = null)
     * @method Grid\Column|Collection coupon_code_id(string $label = null)
     * @method Grid\Column|Collection extra(string $label = null)
     * @method Grid\Column|Collection payment_method(string $label = null)
     * @method Grid\Column|Collection payment_no(string $label = null)
     * @method Grid\Column|Collection refund_no(string $label = null)
     * @method Grid\Column|Collection remark(string $label = null)
     * @method Grid\Column|Collection reviewed(string $label = null)
     * @method Grid\Column|Collection ship_data(string $label = null)
     * @method Grid\Column|Collection token(string $label = null)
     * @method Grid\Column|Collection stock(string $label = null)
     * @method Grid\Column|Collection image(string $label = null)
     * @method Grid\Column|Collection city(string $label = null)
     * @method Grid\Column|Collection contact_name(string $label = null)
     * @method Grid\Column|Collection contact_phone(string $label = null)
     * @method Grid\Column|Collection district(string $label = null)
     * @method Grid\Column|Collection last_used_at(string $label = null)
     * @method Grid\Column|Collection province(string $label = null)
     * @method Grid\Column|Collection zip(string $label = null)
     */
    class Grid {}

    class MiniGrid extends Grid {}

    /**
     * @property Show\Field|Collection name
     * @property Show\Field|Collection version
     * @property Show\Field|Collection alias
     * @property Show\Field|Collection authors
     * @property Show\Field|Collection enable
     * @property Show\Field|Collection imported
     * @property Show\Field|Collection config
     * @property Show\Field|Collection require
     * @property Show\Field|Collection require_dev
     * @property Show\Field|Collection id
     * @property Show\Field|Collection email
     * @property Show\Field|Collection email_verified_at
     * @property Show\Field|Collection created_at
     * @property Show\Field|Collection on_sale
     * @property Show\Field|Collection price
     * @property Show\Field|Collection rating
     * @property Show\Field|Collection sold_count
     * @property Show\Field|Collection review_count
     * @property Show\Field|Collection no
     * @property Show\Field|Collection total_amount
     * @property Show\Field|Collection paid_at
     * @property Show\Field|Collection ship_status
     * @property Show\Field|Collection refund_status
     * @property Show\Field|Collection code
     * @property Show\Field|Collection enabled
     * @property Show\Field|Collection icon
     * @property Show\Field|Collection order
     * @property Show\Field|Collection parent_id
     * @property Show\Field|Collection permission
     * @property Show\Field|Collection updated_at
     * @property Show\Field|Collection uri
     * @property Show\Field|Collection input
     * @property Show\Field|Collection ip
     * @property Show\Field|Collection method
     * @property Show\Field|Collection path
     * @property Show\Field|Collection user_id
     * @property Show\Field|Collection menu_id
     * @property Show\Field|Collection permission_id
     * @property Show\Field|Collection http_method
     * @property Show\Field|Collection http_path
     * @property Show\Field|Collection slug
     * @property Show\Field|Collection role_id
     * @property Show\Field|Collection avatar
     * @property Show\Field|Collection password
     * @property Show\Field|Collection remember_token
     * @property Show\Field|Collection username
     * @property Show\Field|Collection amount
     * @property Show\Field|Collection product_sku_id
     * @property Show\Field|Collection banner
     * @property Show\Field|Collection status
     * @property Show\Field|Collection min_amount
     * @property Show\Field|Collection not_after
     * @property Show\Field|Collection not_before
     * @property Show\Field|Collection total
     * @property Show\Field|Collection type
     * @property Show\Field|Collection used
     * @property Show\Field|Collection value
     * @property Show\Field|Collection connection
     * @property Show\Field|Collection exception
     * @property Show\Field|Collection failed_at
     * @property Show\Field|Collection payload
     * @property Show\Field|Collection queue
     * @property Show\Field|Collection uuid
     * @property Show\Field|Collection order_id
     * @property Show\Field|Collection product_id
     * @property Show\Field|Collection review
     * @property Show\Field|Collection reviewed_at
     * @property Show\Field|Collection address
     * @property Show\Field|Collection closed
     * @property Show\Field|Collection coupon_code_id
     * @property Show\Field|Collection extra
     * @property Show\Field|Collection payment_method
     * @property Show\Field|Collection payment_no
     * @property Show\Field|Collection refund_no
     * @property Show\Field|Collection remark
     * @property Show\Field|Collection reviewed
     * @property Show\Field|Collection ship_data
     * @property Show\Field|Collection token
     * @property Show\Field|Collection stock
     * @property Show\Field|Collection image
     * @property Show\Field|Collection city
     * @property Show\Field|Collection contact_name
     * @property Show\Field|Collection contact_phone
     * @property Show\Field|Collection district
     * @property Show\Field|Collection last_used_at
     * @property Show\Field|Collection province
     * @property Show\Field|Collection zip
     *
     * @method Show\Field|Collection name(string $label = null)
     * @method Show\Field|Collection version(string $label = null)
     * @method Show\Field|Collection alias(string $label = null)
     * @method Show\Field|Collection authors(string $label = null)
     * @method Show\Field|Collection enable(string $label = null)
     * @method Show\Field|Collection imported(string $label = null)
     * @method Show\Field|Collection config(string $label = null)
     * @method Show\Field|Collection require(string $label = null)
     * @method Show\Field|Collection require_dev(string $label = null)
     * @method Show\Field|Collection id(string $label = null)
     * @method Show\Field|Collection email(string $label = null)
     * @method Show\Field|Collection email_verified_at(string $label = null)
     * @method Show\Field|Collection created_at(string $label = null)
     * @method Show\Field|Collection on_sale(string $label = null)
     * @method Show\Field|Collection price(string $label = null)
     * @method Show\Field|Collection rating(string $label = null)
     * @method Show\Field|Collection sold_count(string $label = null)
     * @method Show\Field|Collection review_count(string $label = null)
     * @method Show\Field|Collection no(string $label = null)
     * @method Show\Field|Collection total_amount(string $label = null)
     * @method Show\Field|Collection paid_at(string $label = null)
     * @method Show\Field|Collection ship_status(string $label = null)
     * @method Show\Field|Collection refund_status(string $label = null)
     * @method Show\Field|Collection code(string $label = null)
     * @method Show\Field|Collection enabled(string $label = null)
     * @method Show\Field|Collection icon(string $label = null)
     * @method Show\Field|Collection order(string $label = null)
     * @method Show\Field|Collection parent_id(string $label = null)
     * @method Show\Field|Collection permission(string $label = null)
     * @method Show\Field|Collection updated_at(string $label = null)
     * @method Show\Field|Collection uri(string $label = null)
     * @method Show\Field|Collection input(string $label = null)
     * @method Show\Field|Collection ip(string $label = null)
     * @method Show\Field|Collection method(string $label = null)
     * @method Show\Field|Collection path(string $label = null)
     * @method Show\Field|Collection user_id(string $label = null)
     * @method Show\Field|Collection menu_id(string $label = null)
     * @method Show\Field|Collection permission_id(string $label = null)
     * @method Show\Field|Collection http_method(string $label = null)
     * @method Show\Field|Collection http_path(string $label = null)
     * @method Show\Field|Collection slug(string $label = null)
     * @method Show\Field|Collection role_id(string $label = null)
     * @method Show\Field|Collection avatar(string $label = null)
     * @method Show\Field|Collection password(string $label = null)
     * @method Show\Field|Collection remember_token(string $label = null)
     * @method Show\Field|Collection username(string $label = null)
     * @method Show\Field|Collection amount(string $label = null)
     * @method Show\Field|Collection product_sku_id(string $label = null)
     * @method Show\Field|Collection banner(string $label = null)
     * @method Show\Field|Collection status(string $label = null)
     * @method Show\Field|Collection min_amount(string $label = null)
     * @method Show\Field|Collection not_after(string $label = null)
     * @method Show\Field|Collection not_before(string $label = null)
     * @method Show\Field|Collection total(string $label = null)
     * @method Show\Field|Collection type(string $label = null)
     * @method Show\Field|Collection used(string $label = null)
     * @method Show\Field|Collection value(string $label = null)
     * @method Show\Field|Collection connection(string $label = null)
     * @method Show\Field|Collection exception(string $label = null)
     * @method Show\Field|Collection failed_at(string $label = null)
     * @method Show\Field|Collection payload(string $label = null)
     * @method Show\Field|Collection queue(string $label = null)
     * @method Show\Field|Collection uuid(string $label = null)
     * @method Show\Field|Collection order_id(string $label = null)
     * @method Show\Field|Collection product_id(string $label = null)
     * @method Show\Field|Collection review(string $label = null)
     * @method Show\Field|Collection reviewed_at(string $label = null)
     * @method Show\Field|Collection address(string $label = null)
     * @method Show\Field|Collection closed(string $label = null)
     * @method Show\Field|Collection coupon_code_id(string $label = null)
     * @method Show\Field|Collection extra(string $label = null)
     * @method Show\Field|Collection payment_method(string $label = null)
     * @method Show\Field|Collection payment_no(string $label = null)
     * @method Show\Field|Collection refund_no(string $label = null)
     * @method Show\Field|Collection remark(string $label = null)
     * @method Show\Field|Collection reviewed(string $label = null)
     * @method Show\Field|Collection ship_data(string $label = null)
     * @method Show\Field|Collection token(string $label = null)
     * @method Show\Field|Collection stock(string $label = null)
     * @method Show\Field|Collection image(string $label = null)
     * @method Show\Field|Collection city(string $label = null)
     * @method Show\Field|Collection contact_name(string $label = null)
     * @method Show\Field|Collection contact_phone(string $label = null)
     * @method Show\Field|Collection district(string $label = null)
     * @method Show\Field|Collection last_used_at(string $label = null)
     * @method Show\Field|Collection province(string $label = null)
     * @method Show\Field|Collection zip(string $label = null)
     */
    class Show {}

    /**
     
     */
    class Form {}

}

namespace Dcat\Admin\Grid {
    /**
     
     */
    class Column {}

    /**
     
     */
    class Filter {}
}

namespace Dcat\Admin\Show {
    /**
     
     */
    class Field {}
}
